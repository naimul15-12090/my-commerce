<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        Category::newCategory($request);
        return  back()->with("message", " Category info create Successfully.");
    }

    public function manage()
    {
        // $categories = new Category();
        return view('admin.category.manage', ['categories' => Category::all()]);
    }




    public function edit($id)
    {
        // $category = Category::find($id);
        return view("admin.category.edit", ['category' => Category::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category/manage')->with("message", "Category info update successfully");
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return redirect('category/manage')->with("message", "Category info delete successfully");
    }
}
