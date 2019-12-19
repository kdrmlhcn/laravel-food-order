<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'slug'=>'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('admin.category.index')->with('status','Kategori başarıyla eklendi.');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required',
            'slug'=>'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();

        return redirect()->route('admin.category.index')->with('status','Kategori başarıyla düzenlendi.');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->back()->with('status','Kategori başarıyla silindi.');
    }

    public function data(Request $request)
    {
        $query = Category::query()->orderBy('created_at', 'ASC');
        $data = DataTables::of($query)
            ->addColumn('id', function ($query){
                return Category::find($query->id)->id;
            })
            ->addColumn('name', function ($query){
                return Category::find($query->id)->name;
            })
            ->addColumn('button',function ($query){
                return '<a href="'.route('admin.category.edit',['id'=>$query->id]).'" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>Düzenle</a>
                <a href="javascript:;" data-toggle="modal" data-target="#DeleteModal"
                    class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteData('.$query->id.')"><i class="entypo-cancel"></i>Sil</a>';
            })
            ->rawColumns(['id','name','button'])
            ->make(true);
        return $data;
    }
}
