<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OtherImage;
use App\Models\SubCategory;
use App\Models\Unit;

class ProductController extends Controller
{
    private $product;

    public function index()
    {
        return view('admin.product.index', [
            'categories'         => Category::all(),
            'sub_categories'     => SubCategory::all(),
            'brands'             => Brand::all(),
            'units'              => Unit::all(),

        ]);
    }

    public function getSubCategoryByCategory()
    {

        return response()->json(SubCategory::where('category_id', $_GET['id'])->get());
    }

    public function create(Request $request)
    {

        $this->product = Product::newProduct($request);
        OtherImage::newOtherImage($request->other_image, $this->product->id);
        return  back()->with("message", " Product info create Successfully.");
    }

    public function manage()
    {
        // $products = new Product();
        return view('admin.product.manage', ['products' => Product::all()]);
    }

    public function detail($id)
    {
        // $products = new Product();
        return view('admin.product.detail', ['product' => Product::find($id)]);
    }




    public function edit($id)
    {
        // $product = Product::find($id);
        return view("admin.product.edit", [
            'categories'         => Category::all(),
            'sub_categories'     => SubCategory::all(),
            'brands'             => Brand::all(),
            'units'              => Unit::all(),
            'product' => Product::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        Product::updatedProduct($request, $id);
        if ($request->other_image) {
            OtherImage::updateOtherImage($request->other_image, $id);
        }
        return redirect('/product/manage')->with("message", "Product info update successfully");
    }

    public function delete($id)
    {
        Product::deleteProduct($id);
        OtherImage::deleteOtherImage($id);
        return redirect('product/manage')->with("message", "Product info delete successfully");
    }
}
