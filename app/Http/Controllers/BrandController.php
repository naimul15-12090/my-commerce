<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function create(Request $request)
    {
        Brand::newBrand($request);
        return  back()->with("message", " Brand info create Successfully.");
    }

    public function manage()
    {
        // $categories = new Brand();
        return view('admin.brand.manage', ['brands' => Brand::all()]);
    }




    public function edit($id)
    {
        // $Brand = Brand::find($id);
        return view("admin.brand.edit", ['brand' => Brand::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Brand::updateBrand($request, $id);
        return redirect('/brand/manage')->with("message", "Brand info update successfully");
    }

    public function delete($id)
    {
        Brand::deleteBrand($id);
        return redirect('brand/manage')->with("message", "Brand info delete successfully");
    }
}
