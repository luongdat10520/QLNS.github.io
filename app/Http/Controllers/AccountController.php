<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;
use Toastr;

class AccountController extends Controller
{
    public function index(Request $request) 
    {
        $accounts = User::orderBy('id', 'desc');
        if(!empty($request->key_search)) {
            $accounts -> where('email', 'like', '%'. $request->key_search .'%');
        }
        $accounts = $accounts->get();

        return view('admin.account.list',compact('accounts'));
    }

    public function create()
    {
        return view('admin.account.add');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string',
            ]);
            User::create($data);
            Toastr::success('Thêm thành công', 'Thông báo');
        } catch (Throwable $e) {
            throw $e;
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.account.edit', compact('user'));
    }

    public function destroy($id)
    {
        try {
            $account = User::find($id);
            $account->delete();

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
            'email' => 'required|email',
            'password' => 'required|string',
            'role' => 'required|in:0,1',
        ]);
        $user = User::find($id);
        $user->update([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
        Toastr::success('Sửa thành công', 'Thông báo');

        return redirect()->back();
    }
}
