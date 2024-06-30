<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use App\Models\UserInfo;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Toastr;

class EmployeesController extends Controller

{
    public function export()
    {
        return Excel::download(new EmployeeExport(), 'danhsachnhanvien.xlsx');
    }

    public function staff2()
    {
        $result = DB::table('user_infos')
            ->selectRaw('month(user_infos.created_at) as month,
        year(user_infos.created_at) as year,
        COUNT(user_infos.created_at) as total_staff')
            ->groupByRaw('month, year')
            ->orderBy('year')
            ->get();

        return [
            'status' => 0,
            'data' => $result,
        ];
    }

    public function staff()
    {
        $result = DB::table('user_infos')
            ->selectRaw('departments.department_name, COUNT(user_infos.department_id) as total_staff')
            ->join('departments', 'departments.id', '=', 'user_infos.department_id')
            ->groupByRaw('departments.department_name')
            ->get();

        return [
            'status' => 0,
            'data' => $result,
        ];
    }

    public function salary(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
        $result = DB::table('user_infos')
            ->selectRaw('month(attendances.created_at) as month,
        year(attendances.created_at) as year,
        positions.base_salary / DAY(LAST_DAY(attendances.created_at)) * COUNT(attendances.created_at) as total_salary
        ')
            ->join('users', 'users.id', '=', 'user_infos.user_id')
            ->join('positions', 'positions.id', '=', 'user_infos.position_id')
            ->join('attendances', 'attendances.user_id', '=', 'user_infos.user_id')
            ->when($from, function ($q) use ($from) {
                return $q->where('attendances.created_at', '>=', $from);
            })
            ->when($to, function ($q) use ($to) {
                return $q->where('attendances.created_at', '<=', $to);
            })
            ->groupByRaw('month, year')
            ->orderBy('year')
            ->get();

        return [
            'status' => 0,
            'data' => $result,
        ];
    }

    public function index(Request $request)
    {
        $users = UserInfo::with(['user', 'department', 'position']);
        if (!empty($request->key_search)) {
            $users->where('user_infos.name', 'like', '%' . $request->key_search . '%');
        }
        $users = $users->orderBy('id', 'desc')->simplePaginate(15);
        $departments = Department::all();
        $positions = Position::all();
        return view('admin.employee.list', compact('users', 'departments', 'positions'));
    }

    public function show($id)
    {
        $info = UserInfo::firstWhere('user_id', $id);
        return view('admin.employee.info', compact('info'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();

        return view('admin.employee.add', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'date_of_birth' => 'required|date',
                'address' => 'required|string',
                'phone_number' => 'required|numeric',
                'department_id' => 'required|exists:departments,id',
                'position_id' => 'required|exists:positions,id',
            ]);
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                ['password' =>  Hash::make(1)]
            );
            $data['user_id'] = $user->id;
            UserInfo::create($data);
            Toastr::success('Thêm thành công', 'Thông báo');
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $info = UserInfo::where('user_id', $id)->first();
        $departments = Department::all();
        $positions = Position::all();
        return view('admin.employee.edit', compact('info', 'departments', 'positions'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
        ]);
        $info = UserInfo::find($id);
        $info->update($data);
        Toastr::success('Sửa thành công', 'Thông báo');

        return redirect()->back();
    }

    public function destroy($id)
    {
        try {
            $user = UserInfo::find($id);
            $user->delete();

            return response()->json([
                'status' => 0,
            ]);
        } catch (Throwable) {
            return response()->json([
                'status' => 1,
            ]);
        }
    }
}


