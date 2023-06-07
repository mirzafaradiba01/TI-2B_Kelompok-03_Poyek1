<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use App\Models\Order;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if ($request->has('query')) {
            $searchQuery = $request->input('query');
            $order = Order::where(function ($query) use ($searchQuery) {
                $query->where('kode_order', 'LIKE', '%'.$searchQuery.'%')
                    ->orWhereHas('pelanggan', function ($query) use ($searchQuery) {
                        $query->where('kode_pelanggan', 'LIKE', '%'.$searchQuery.'%')
                            ->orWhere('nama', 'LIKE', '%'.$searchQuery.'%');
                    });
            })->paginate(5);
        }else {
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

    // public function cetak_laporan(Request $request)
    // {
    //     $tanggal = $request->input('tanggal');
    //     $order = Order::whereDate('created_at', $tanggal)->get();

    //     $pdf = PDF::loadview('cetakLaporan.cetakLaporan', ['order' =>$order]);

    //     // Set nama file PDF
    //     $filename = 'laporan_transaksi' . $tanggal . '.pdf';

    //     // Download atau tampilkan PDF dalam browser
    //     return $pdf->download($filename);
    // }
    public function show_form()
    {
        return view('cetakLaporan.form_cetak');
    }

    public function cetak_laporan(Request $request) {
        $tanggal = $request->tanggal;
        $transaksi = Order::whereDate('created_at', Carbon ::parse($tanggal)->format('Y-m-d'))->get();
        // $transaksi = Order::all();
        $data = [
            'transaksi' => $transaksi,
            'tanggal_laundry' => $tanggal,
        ];
        $pdf = PDF::loadview('cetakLaporan.cetakLaporan', ['transaksi' => $transaksi, 'data' => $data, 'tanggal' => $tanggal])->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function cetakNotaLaundry($id)
    {
        $notaLaundry = Order::find($id);
        $transaksi =  Order::all();
        $pdf = PDF::loadView('notaLaundry.cetak',['notaLaundry' => $notaLaundry ,'transaksi' => $transaksi])->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
