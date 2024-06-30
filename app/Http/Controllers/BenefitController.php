<?php

namespace App\Http\Controllers;
use App\Models\Benefit;
use Illuminate\Http\Request;
use Throwable;
use Toastr;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::all();
        return view('admin.benefit.list',compact('benefits'));
    }

    public function list()
    {
        $benefits = Benefit::all();
        return view('user.benefit.list',compact('benefits'));
    }

    public function show($id)
    {
        $benefit = Benefit::find($id);
        return view('admin.benefit.info', compact('benefit'));
    }

    public function create()
    {
        return view('admin.benefit.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'benefit_name' => 'required|string|max:255',
            'description' => 'required|string',
            'benefit_type' => 'required|string',
            'applicable_to' => 'required|string',
        ]);
        Benefit::create($data);
        Toastr::success('Thêm thành công', 'Thông báo');

        return redirect()->back();
    }

    public function edit($id)
    {
        $benefit = Benefit::find($id);
        return view('admin.benefit.edit', compact('benefit'));
    }

    public function destroy($id)
    {
        try {
            $benefit = Benefit::find($id);
            $benefit->delete();

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
            'benefit_name' => 'required|string|max:255',
            'description' => 'required|string',
            'benefit_type' => 'required|string',
            'applicable_to' => 'required|string',
        ]);
        $benefit = Benefit::find($id);
        $data = $request->all();
        $benefit->update($data);
        Toastr::success('Sửa thành công', 'Thông báo');

        return redirect()->back();
    }
}
