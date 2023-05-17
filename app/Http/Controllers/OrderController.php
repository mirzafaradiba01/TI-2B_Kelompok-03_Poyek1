<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use App\Models\Order;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $order = Order::with('jenis_laundry')->get();
        return view('order.create_order')
            ->with('order', $order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = JenisLaundry::all(); //mendapatkan data dari tabel jenis laundry
        return view('order.create_order',['jenis_laundry' => $jenis])
           ->with('url_form',url('/order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Order::create([
            'tanggal_laundry' => $request-> tanggal_laundry,
            'berat'=> $request-> berat,
            'total'=> $request-> total,
            'catatan'=> $request-> catatan,
            'status_bayar '=> $request-> status_bayar,
        ]);
        return 'Order berhasil ditambahkan';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


}
