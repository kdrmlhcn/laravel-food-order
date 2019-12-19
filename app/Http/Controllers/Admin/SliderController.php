<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    public function index()
    {
        $slides = Slider::all();

        return view('admin.slider.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp,png'
        ]);

        $image = $request->file('image');
        if (isset($image))
        {

            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/slides'))
            {
                mkdir('uploads/slides',0777,true);
            }
            $image->move('uploads/slides',$imageName);
        }else{
            $imageName = "default.png";
        }

        $slide            = new Slider();
        $slide->title     = $request->title;
        $slide->description     = $request->description;
        $slide->image     = $imageName;
        $slide->save();

        return redirect()->route('admin.slider.index')->with('status','Slayt başarıyla eklendi.');
    }

    public function edit($id)
    {
        $slide = Slider::find($id);

        return view('admin.slider.edit', compact('slide'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,bmp,png'
        ]);

        $image = $request->file('image');
        $slide = Slider::find($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if (!file_exists('uploads/slides'))
            {
                mkdir('uploads/slides',0777,true);
            }
            $image->move('uploads/slides',$imageName);
        }else{
            $imageName = $slide->image;
        }

        $slide->title = $request->title;
        $slide->description = $request->description;
        $slide->image = $imageName;
        $slide->save();

        return redirect()->route('admin.slider.index')->with('status','Slayt başarıyla düzenlendi.');
    }

    public function destroy($id)
    {
        $slide = Slider::find($id);

        if(file_exists('uploads/slides/'.$slide->image)){
            unlink('uploads/slides/'.$slide->image);
        }

        $slide->delete();

        return redirect()->back()->with('status','Slayt başarıyla silindi.');
    }

    public function data(Request $request)
    {
        $query = Slider::query()->orderBy('created_at', 'ASC');
        $data = DataTables::of($query)
            ->addColumn('id', function ($query){
                return Slider::find($query->id)->id;
            })
            ->addColumn('title', function ($query){
                return Slider::find($query->id)->title;
            })
            ->addColumn('image', function ($query){
                return Slider::find($query->id)->image;
            })
            ->addColumn('button',function ($query){
                return '<a href="'.route('admin.slider.edit',['id'=>$query->id]).'" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>Düzenle</a>
                <a href="javascript:;" data-toggle="modal" data-target="#DeleteModal"
                    class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteData('.$query->id.')"><i class="entypo-cancel"></i>Sil</a>';
            })
            ->rawColumns(['id','title','image','button'])
            ->make(true);
        return $data;
    }
}
