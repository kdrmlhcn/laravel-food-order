<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        return view('admin.reservation.index', compact('reservations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'type'=>'required',
            'date'=>'required',
            'message'=>'required'
        ]);

        $reservation      = new Reservation();
        $reservation->name      = $request->name;
        $reservation->phone     = $request->phone;
        $reservation->email     = $request->email;
        $reservation->type      = $request->type;
        $reservation->date      = $request->date;
        $reservation->message   = $request->message;
        $reservation->save();

        return redirect()->route('admin.reservation.index')->with('status','Rezervasyon başarıyla eklendi.');
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);

        return view('admin.reservation.show', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect()->back()->with('status','Rezervasyon başarıyla silindi.');
    }

    public function data(Request $request)
    {
        $query = Reservation::query()->orderBy('created_at', 'ASC');
        $data = DataTables::of($query)
            ->addColumn('id', function ($query){
                return Reservation::find($query->id)->id;
            })
            ->addColumn('name', function ($query){
                return Reservation::find($query->id)->name;
            })
            ->addColumn('phone', function ($query){
                return Reservation::find($query->id)->phone;
            })
            ->addColumn('type', function ($query){
                return Reservation::find($query->id)->type;
            })
            ->addColumn('date', function ($query){
                return Reservation::find($query->id)->date;
            })
            ->addColumn('button',function ($query){
                return '<a href="'.route('admin.reservation.show',['id'=>$query->id]).'" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>Göster</a>
                <a href="javascript:;" data-toggle="modal" data-target="#DeleteModal"
                    class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteData('.$query->id.')"><i class="entypo-cancel"></i>Sil</a>';
            })
            ->rawColumns(['id','name','phone','type','date','button'])
            ->make(true);
        return $data;
    }
}
