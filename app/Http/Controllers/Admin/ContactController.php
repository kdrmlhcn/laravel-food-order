<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.contact.index', compact('contacts'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);

        $contact                = new Contact();
        $contact->name          = $request->name;
        $contact->email         = $request->phone;
        $contact->subject       = $request->email;
        $contact->message       = $request->message;
        $contact->save();

        return redirect()->route('admin.contact.index')->with('status','Mesajınız bize ulaştı.');
    }

    public function show($id)
    {
        $contact = Contact::find($id);

        return view('admin.contact.show', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        $contact->delete();

        return redirect()->back()->with('status','Mesaj başarıyla silindi.');
    }

    public function data(Request $request)
    {
        $query = Contact::query()->orderBy('created_at', 'ASC');
        $data = DataTables::of($query)
            ->addColumn('id', function ($query){
                return Contact::find($query->id)->id;
            })
            ->addColumn('name', function ($query){
                return Contact::find($query->id)->name;
            })
            ->addColumn('email', function ($query){
                return Contact::find($query->id)->email;
            })
            ->addColumn('subject', function ($query){
                return Contact::find($query->id)->subject;
            })
            ->addColumn('message', function ($query){
                return Contact::find($query->id)->message;
            })
            ->addColumn('button',function ($query){
                return '<a href="'.route('admin.contact.show',['id'=>$query->id]).'" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>Göster</a>
                <a href="javascript:;" data-toggle="modal" data-target="#DeleteModal"
                    class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteData('.$query->id.')"><i class="entypo-cancel"></i>Sil</a>';
            })
            ->rawColumns(['id','name','email','subject','message','button'])
            ->make(true);
        return $data;
    }
}
