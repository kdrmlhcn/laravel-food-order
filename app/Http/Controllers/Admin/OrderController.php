<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.order.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'order_items'=>'required',
            'payment_type'=>'required',
            'order_total'=>'required',
            'status_id'=>'required'
        ]);

        $order                  = new Order();
        $order->first_name      = $request->first_name;
        $order->last_name       = $request->last_name;
        $order->email           = $request->email;
        $order->phone           = $request->phone;
        $order->address         = $request->address;
        $order->order_items     = $request->order_items;
        $order->comment         = $request->comment ?? NULL;
        $order->payment_type    = $request->payment_type;
        $order->order_total     = $request->order_total;
        $order->status_id       = $request->status_id;
        $order->save();

        return redirect()->route('admin.order.index')->with('status','Siparişiniz bize ulaştı.');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $paymentTypes = collect(Order::paymentTypes())
            ->mapWithKeys(function ($value, $key) {
                return [
                    $key => $value['name'],
                ];
            })->toArray();
        $statuses = collect(Order::statusTypes())
            ->mapWithKeys(function ($value, $key) {
                return [
                    $key => $value['name'],
                ];
            })->toArray();

        return view('admin.order.edit', compact('order', 'paymentTypes', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status_id'=>'required'
        ]);

        $order                  = Order::find($id);
        $order->status_id       = $request->status_id;
        $order->save();

        return redirect()->route('admin.order.index')->with('status','Sipariş başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect()->back()->with('status','Sipariş başarıyla silindi.');
    }

    public function data(Request $request)
    {
        $query = Order::query()->orderBy('status_id', 'ASC')->orderBy('created_at', 'DESC');
        $paymentTypes = collect(Order::paymentTypes())
            ->mapWithKeys(function ($value, $key) {
                return [
                    $key => $value['name'],
                ];
            })->toArray();
        $data = DataTables::of($query)
            ->addColumn('id', function ($query){
                return Order::find($query->id)->id;
            })
            ->addColumn('full_name', function ($query){
                return Order::find($query->id)->first_name." ".Order::find($query->id)->last_name;
            })
            ->addColumn('email', function ($query){
                return Order::find($query->id)->email;
            })
            ->addColumn('phone', function ($query){
                return Order::find($query->id)->phone;
            })
            ->addColumn('address', function ($query){
                return Order::find($query->id)->address;
            })
            ->addColumn('order_total', function ($query){
                return Order::find($query->id)->order_total;
            })
            ->addColumn('status', function ($query){
                return Order::statusTypes(Order::find($query->id)->status_id)['name'];
            })
            ->addColumn('button',function ($query){
                return '<a href="'.route('admin.order.edit',['id'=>$query->id]).'" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>Göster</a>
                <a href="javascript:;" data-toggle="modal" data-target="#DeleteModal"
                    class="btn btn-danger btn-sm btn-icon icon-left" onclick="deleteData('.$query->id.')"><i class="entypo-cancel"></i>Sil</a>';
            })
            ->rawColumns(['id','full_name','email','phone','address','order_total','status','button'])
            ->make(true);
        return $data;
    }
}
