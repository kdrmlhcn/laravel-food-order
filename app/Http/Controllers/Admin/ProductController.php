<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp,png'
        ]);

        $image = $request->file('image');
        if (isset($image))
        {

            $currentDate = Carbon::now()->toDateString();
            $imageName = $request->slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/products'))
            {
                mkdir('uploads/products',0777,true);
            }
            $image->move('uploads/products',$imageName);
        }else{
            $imageName = "default.png";
        }

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name        = $request->name;
        $product->slug        = $request->slug;
        $product->description = $request->description;
        $product->price       = $request->price;
        $product->image       = $imageName;
        $product->save();

        return redirect()->route('admin.product.index')->with('status','Ürün başarıyla eklendi.');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product','categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id'=>'required',
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $product = Product::find($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $request->slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/products'))
            {
                mkdir('uploads/products',0777,true);
            }
            $image->move('uploads/products',$imageName);
        }else{
            $imageName = $product->image;
        }

        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $imageName;
        $product->save();

        return redirect()->route('admin.product.index')->with('status','Ürün başarıyla düzenlendi.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if(file_exists('uploads/products/'.$product->image)){
            unlink('uploads/products/'.$product->image);
        }

        $product->delete();

        return redirect()->back()->with('status','Ürün başarıyla silindi.');
    }

    public function data(Request $request)
    {
        $query = Product::query()->orderBy('created_at', 'ASC');
        $data = DataTables::of($query)
            ->addColumn('id', function ($query){
                return Product::find($query->id)->id;
            })
            ->addColumn('name', function ($query){
                return Product::find($query->id)->name;
            })
            ->addColumn('category', function ($query){
                return Product::find($query->id)->category->name;
            })
            ->addColumn('price', function ($query){
                return Product::find($query->id)->price;
            })
            ->addColumn('image', function ($query){
                return Product::find($query->id)->image;
            })
            ->addColumn('button',function ($query){
                return '<a href="'.route('admin.product.edit',['id'=>$query->id]).'" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>Düzenle</a>
                <a href="javascript:;" data-toggle="modal" data-target="#DeleteModal"
                    class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteData('.$query->id.')"><i class="entypo-cancel"></i>Sil</a>';
            })
            ->rawColumns(['id','name','category','price','image','button'])
            ->make(true);
        return $data;
    }
}
