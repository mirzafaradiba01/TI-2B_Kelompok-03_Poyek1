<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use function Ramsey\Uuid\v1;

class OrderController extends Controller {

public function index(Request $request) {

    $query = $request->get('query');
    $order_selesai = Status::with('order')->get();

    $order = Order::whereHas('status', function ($queryBuilder) use ($query) {
            $queryBuilder->where('kode_status', 'LIKE', '%'.$query.'%');
        })
        ->orWhereHas('pelanggan', function ($queryBuilder) use ($query) {
            $queryBuilder->where('nama', 'LIKE', '%'.$query.'%')
                ->orWhere('no_hp', 'LIKE', '%'.$query.'%');
        })
        ->orWhereHas('jenis_laundry', function ($queryBuilder) use ($query) {
            $queryBuilder->where('nama', 'LIKE', '%'.$query.'%');
        })
        ->orWhere('kode_order', 'LIKE', '%'.$query.'%')
        ->paginate(5);

        $status = Status::paginate(5);

        return view('order.order_selesai', [
            'order' => $order,
            'status' => $status,
            'order_selesai' => $order_selesai
        ]);
    }

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

    public function store(Request $request) {

        $countOrder = Order::count();
        $kode_order = '100' . ($countOrder + 1);
        $countStatus = Status::count();
        $kode_status = 'S-00' . ($countStatus + 1);

        $order = Order::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_jenis_laundry' => $request->id_jenis_laundry,
            'kode_order' => $kode_order,
            'tanggal_laundry' => $request->tanggal_laundry,
            'berat' => $request->berat,
            'total' => $request->total,
            'catatan' => $request->catatan,
            'status_bayar' => $request->status_bayar,
        ]);

        Status::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_jenis_laundry' => $request->id_jenis_laundry,
            'kode_order' => $order->kode_order,
            'id_order' => $order->id, // Menggunakan ID dari order yang baru ditambahkan
            'kode_status' => $kode_status,
            'status' => 'Cuci',
        ]);

        return redirect( auth()->user()->role . '/transaksi')->with('success', 'Order Berhasil Ditambahkan');
    }

    public function show($id) {}

    public function edit(Order $order) {}

    public function update(Request $request, Order $order) {}

    public function destroy(Order $order) { }

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

    public function statuslaudry() {
        $statusAdmin = Order::all();
        return view('status.status_admin', ['statusAdmin' => $statusAdmin]);
    }

    public function order_selesai() {
       $order_selesai = Status::with('order')->get();
       return view('order.order_selesai', ['order_selesai' => $order_selesai]);
    }

}
