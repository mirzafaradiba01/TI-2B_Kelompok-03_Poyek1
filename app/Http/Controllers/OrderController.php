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
        $jenis = JenisLaundry::all();
        $pelanggan = Pelanggan::all();
        return view('order.create_order', ['jenis' => $jenis], ['pelanggan' => $pelanggan]);
    }

    // cek status
    public function searching(Request $request){
        if($request->get('query') !== null){
            $query = $request->get('query');
            $order = Order ::where('kode_order', 'LIKE', '%'.$query.'%')

                ->with('order')
                ->paginate(5);
        } else {
            $order = Order ::with('order')->paginate(5);
        }
        return view('searching.searching', ['order' => $order]);
    }

    // statuslaundry
    public function statuslaudry() {
        $statuslaundry = Order::all();
        return view('statuslaundry.statuslaundry', ['statuslaundry' => $statuslaundry]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $jenis = JenisLaundry::all();
        $pelanggan = Pelanggan::all();
        return view('order.create_order',
        [
            'url_form' => url( auth()->user()->role . '/order') ,
            'jenis' => $jenis,
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $countOrder = Order::count();

        $kode_order = '100' . ($countOrder + 1);

        Order::create([
            'id_pelanggan' => $request-> id_pelanggan,
            'id_jenis_laundry' => $request->id_jenis_laundry,
            'kode_order' => $kode_order,
            'tanggal_laundry' => $request-> tanggal_laundry,
            'berat'=> $request-> berat,
            'total'=> $request-> total,
            'catatan'=> $request-> catatan,
            'status_bayar'=> $request-> status_bayar,
        ]);

        return redirect( auth()->user()->role . '/transaksi')->with('success', 'Order Berhasil Ditambahkan');
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
