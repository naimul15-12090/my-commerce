<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        return view('admin.unit.index');
    }

    public function create(Request $request)
    {
        Unit::newUnit($request);
        return  back()->with("message", " Unit info create Successfully.");
    }

    public function manage()
    {
        // $categories = new Unit();
        return view('admin.unit.manage', ['units' => Unit::all()]);
    }




    public function edit($id)
    {
        // $Unit = Unit::find($id);
        return view("admin.unit.edit", ['unit' => Unit::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Unit::updateUnit($request, $id);
        return redirect('/unit/manage')->with("message", "Unit info update successfully");
    }

    public function delete($id)
    {
        Unit::deleteUnit($id);
        return redirect('unit/manage')->with("message", "Unit info delete successfully");
    }
}
