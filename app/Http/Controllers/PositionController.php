<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Throwable;
use Toastr;

class PositionController extends Controller
{
    public function index(Request $request)
    {
        $positions = Position::orderBy('id', 'desc');
        if (!empty($request->key_search)) {
            $positions->where('position_name', 'like', '%' . $request->key_search . '%');
        }

        $positions = $positions->simplePaginate(25);
        
        return view('admin.position.list', compact('positions'));
    }

    public function show($id)
    {
        $position = Position::find($id);
        $users = UserInfo::with(['user', 'position', 'position'])->where('position_id', $id)->get();
        return view('admin.position.info', compact('position', 'users'));
    }

    public function create()
    {
        return view('admin.position.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'position_name' => 'required|string|max:255',
            'base_salary' => 'required|numeric|min:0',
        ]);
        Position::create($data);
        Toastr::success('Thêm thành công', 'Thông báo');

        return redirect()->back();
    }

    public function edit($id)
    {
        $position = Position::find($id);
        return view('admin.position.edit', compact('position'));
    }

    public function destroy($id)
    {
        try {
            $position = Position::find($id);
            $position->delete();

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
            'position_name' => 'required|string|max:255',
            'base_salary' => 'required|numeric|min:0',
        ]);
        $position = Position::find($id);
        $data = $request->all();
        $position->update($data);
        Toastr::success('Sửa thành công', 'Thông báo');

        return redirect()->back();
    }
}
