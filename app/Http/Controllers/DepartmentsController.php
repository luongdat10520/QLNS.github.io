<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Throwable;
use Toastr;

class DepartmentsController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::orderBy('id');
        if (!empty($request->key_search)) {
            $departments->where('department_name', 'like', '%' . $request->key_search . '%');
        }

        $departments = $departments->simplePaginate(25);

        return view('admin.department.list', compact('departments'));
    }

    public function show($id)
    {
        $department = Department::find($id);
        $users = UserInfo::with(['user', 'department', 'position'])->where('department_id', $id)->get();
        return view('admin.department.info', compact('department', 'users'));
    }

    public function create()
    {
        return view('admin.department.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'department_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
        ]);
        Department::create($data);
        Toastr::success('Thêm thành công', 'Thông báo');

        return redirect()->back();
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit', compact('department'));
    }

    public function destroy($id)
    {
        try {
            $department = Department::find($id);
            $department->delete();

            return response()->json([
                'status' => 0,
            ]);
        } catch (Throwable) {
            return response()->json([
                'status' => 1,
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'department_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|numeric',
        ]);
        $department = Department::find($id);
        $data = $request->all();
        $department->update($data);
        Toastr::success('Sửa thành công', 'Thông báo');

        return redirect()->back();
    }
}
