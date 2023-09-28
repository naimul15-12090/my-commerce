<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub-category.index', ['categories' => Category::all()]);
    }

    public function create(Request $request)
    {
        SubCategory::newSubCategory($request);
        return  back()->with("message", "Sub Category info create Successfully.");
    }

    public function manage()
    {
        // $categories = new Category();
        return view('admin.sub-category.manage', ['sub_categories' => SubCategory::all()]);
    }




    public function edit($id)
    {
        // $category = Category::find($id);
        return view("admin.sub-category.edit", [
            'categories' => Category::all(),
            'sub_category' => SubCategory::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect('/sub-category/manage')->with("message", "Sub category info update successfully");
    }

    public function delete($id)
    {
        SubCategory::deleteSubCategory($id);
        return redirect('sub-category/manage')->with("message", "Sub category info delete successfully");
    }
}
