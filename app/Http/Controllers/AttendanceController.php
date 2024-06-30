<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Toastr;
use Carbon\Carbon;


class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $id = Auth::id();
        $attendances = Attendance::when($from, function ($q) use ($from) {
            return $q->where('attendances.created_at', '>=', $from);
        })->when($to, function ($q) use ($to) {
            return $q->where('attendances.created_at', '<=', $to);
        })->where('user_id', $id)
            ->get();

        return view('user.attendance.list', compact('attendances'));
    }

    public function create()
    {
        $id = Auth::id();

        $attendance = Attendance::where('user_id', $id)
            ->whereRaw('cast(created_at as date) = ?', date('Y-m-d'))->first();

        return view('user.attendance.add', compact('attendance'));
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        if (isset($request->check_in)) {
            $data['user_id'] = $id;
            $data['check_in'] = date('Y-m-d H:i:s');
            Attendance::create($data);
            Toastr::success('Checkin thành công', 'Thông báo');
        } else {
            $attendance = Attendance::where('user_id', $id)
                ->whereRaw('cast(created_at as date) = ?', date('Y-m-d'))->update(
                    ['check_out' => date('Y-m-d H:i:s')]
                );
            Toastr::success('Checkout thành công', 'Thông báo');
        }

        return redirect()->back();
    }

    public function attendance() 
    {
        $today = Carbon::now()->toDateString();
        $attendances = Attendance::with('user')
        ->whereDate('check_in', $today)->orderByDesc('check_out')
        ->get();
        return view('admin.attendance.list', compact('attendances'));
    }
}
