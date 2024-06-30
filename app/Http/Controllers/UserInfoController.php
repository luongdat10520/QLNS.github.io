<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Position;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;

class UserInfoController extends Controller
{
    public function show()
    {
        $id = Auth::id();
        $info = UserInfo::with(['user', 'department', 'position'])->firstWhere('user_id', $id);
        if (!$info) {
            Toastr::error('Bạn vui lòng cập nhật thông tin', 'Thông báo');
            return redirect()->route('info.edit');
        }

        return view('user.info.list', compact('info'));
    }

    public function edit()
    {
        $departments = Department::all();
        $positions = Position::all();
        $id = Auth::id();
        $info = UserInfo::with(['user', 'department', 'position'])->firstWhere('user_id', $id);
        return view('user.info.edit', compact('info', 'departments', 'positions'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string|regex:/^0\d{9,10}$/',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'address' => 'required|string',
        ]);
        $id = Auth::id();
        UserInfo::updateOrCreate(['user_id' => $id],  $data);
        Toastr::success('Cập nhật thông tin thành công', 'Thông báo');

        return redirect()->back();
    }
}
