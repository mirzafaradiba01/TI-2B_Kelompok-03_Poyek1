<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use App\Models\Order;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if($request->get('query') !== null){
            $query = $request->get('query');
            $order = Order::where('kode_order', 'LIKE', '%'.$query.'%')
                ->orWhere('nama_pelanggan', 'LIKE', '%'.$query.'%')
                ->orWhere('kode_pelanggan', 'LIKE', '%'.$query.'%')
                ->paginate(5);
        } else {
            $order = Order::paginate(5);
        }
        return view('order.transaksi', ['order' => $order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $order = Order::find($id);
        $pelanggan = Pelanggan::find($id);
        $jenis_laundry =JenisLaundry ::find($id);
        return view('order.transaksi', [
            'order' => $order,
            'pelanggan' => $pelanggan,
            'jenis_laundry' => $jenis_laundry
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
