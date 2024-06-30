<?php

namespace App\Http\Controllers;

use App\Exports\SalaryExport;
use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Carbon\Carbon;
use Excel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class ReportController extends Controller
{
    public function export(Request $request)
    {
        $data = $request->validate([
            'fromEx' => 'required|date',
            'toEx' => 'required|date',
        ]);

        if (Carbon::parse($request->fromEx)->format('Ym') !== Carbon::parse($request->toEx)->format('Ym')) {
            throw new Exception('Vui lòng chọn khoảng thời gian trong cùng 1 tháng');
        }

        return Excel::download(new SalaryExport($data['fromEx'], $data['toEx']), 'danhsachluong.xlsx');
    }

    public function salary(Request $request)
    {
        $key_search = $request->key_search;
        $from = $request->from;
        $to = $request->to;
        DB::enableQueryLog();
        $users = User::with(['info', 'info.department', 'info.position', 'attendances'])
            ->whereHas('attendances', function ($q) use ($from, $to) {
                $q->when($from, function ($q) use ($from) {
                    return $q->where('attendances.created_at', '>=', $from . ' 00:00:00');
                })
                    ->when($to, function ($q) use ($to) {
                        return $q->where('attendances.created_at', '<=', $to . ' 23:59:59');
                    });
            })
            ->whereHas('info', function ($q) use ($key_search) {
                $q->when($key_search, function ($q) use ($key_search) {
                    $q->where('name', 'like', '%' . $key_search . '%');
                });
            })
            ->where('role', 0)
            ->orderByDesc('id')
            ->get();
        $departments = Department::all();
        $positions = Position::all();

        return view('admin.report.salary', compact('users', 'departments', 'positions'));
    }

    public function latestaff(Request $request)
    {
        $key_search = $request->key_search;
        $from = $request->from;
        $to = $request->to;
        DB::enableQueryLog();
        $users = User::with(['info', 'info.department', 'info.position', 'attendances'])
            ->whereHas('attendances', function ($q) use ($from, $to) {
                $q->whereRaw('cast(attendances.check_in as time) >= ?', '08:00:00')
                    ->when($from, function ($q) use ($from) {
                        return $q->where('attendances.created_at', '>=', $from . ' 00:00:00');
                    })->when($to, function ($q) use ($to) {
                        return $q->where('attendances.created_at', '<=', $to . ' 23:59:59');
                    });
            })
            ->whereHas('info', function ($q) use ($key_search) {
                $q->when($key_search, function ($q) use ($key_search) {
                    $q->where('name', 'like', '%' . $key_search . '%');
                });
            })
            ->where('role', 0)
            ->orderByDesc('id')
            ->get();
        $departments = Department::all();
        $positions = Position::all();

        return view('admin.report.latestaff', compact('users', 'departments', 'positions'));
    }
}
