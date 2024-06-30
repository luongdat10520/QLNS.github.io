<?php

namespace App\Http\Controllers;

use App\Mail\RecoverPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Toastr;

class AuthController extends Controller
{
    public function change()
    {
        return view('changepassword');
    }

    public function update(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
            'newpassword' => 'required|string',
            'repassword' => 'required|string|same:newpassword',
        ]);

        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ])) {
            Auth::user()->update([
                'password' => Hash::make($credentials['newpassword'])
            ]);
            Toastr::success('Đổi mật khẩu thành công', 'Thông báo');
            return redirect()->route('login');
        }
        Toastr::error('Mật khẩu cũ không chính xác', 'Thông báo');

        return redirect()->back();
    }

    public function reset_password()
    {
        return view('reset');
    }

    public function recover(Request $request)
    {
        $email = $request->email;
        if (!$user = User::firstWhere('email', $email)) {
            return response()->json([
                'status' => 1,
                'message' => 'Email không tồn tại',
            ]);
        }
        $source = ['a', 'b', 'c', 'd', 'e', 'g', 1, 2, 3, 4, 5, 6];
        $new_password = '';
        foreach ($source as $s) {
            $new_password .= $source[rand(0, count($source) - 1)];
        }
        $reset_password = $user->update([
            'password' => Hash::make($new_password)
        ]);
        if ($reset_password) {
            Mail::to($email)->send(new RecoverPasswordMail('Xác nhận mật khẩu', $new_password));
        }

        return response()->json([
            'status' => 0,
            'email' => $email,
        ]);
    }

    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            Toastr::success('Đăng nhập thành công', 'Thông báo');
            $user = Auth::user();
            if ($user->role === 1) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('user.index');
            }
        }

        Toastr::error('Đăng nhập thất bại', 'Thông báo');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
