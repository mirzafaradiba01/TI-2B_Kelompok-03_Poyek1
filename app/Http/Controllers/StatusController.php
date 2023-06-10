<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StatusController extends Controller {

    public function index(Request $request) {

        if($request->get('query') !== null){
            $query = $request->get('query');
            $status_admin = Order::where('kode_status', 'LIKE', '%'.$query.'%')
                ->orWhere('nama', 'LIKE', '%'.$query.'%')
                ->orWhere('no_hp', 'LIKE', '%'.$query.'%')
                ->paginate(5);
            $status = Status::all();
        } else {
            $status = Status::all();
            $status_admin = Order::paginate(5);
        }
        return view('status.status_admin', ['status_admin' => $status_admin, 'status' => $status]);
    }

    public function create() {}

    public function store(Request $request) {}

    public function show() {

        $status = Status::all();
        $order = Order::all();
        $pelanggan = Pelanggan::all();
        $jenis_laundry = JenisLaundry::all();
        return view('status.status_admin', [
            'order' => $order,
            'status' => $status,
            'pelanggan' => $pelanggan,
            'jenis_laundry' => $jenis_laundry
        ]);
    }

    public function edit(Status $status) {}

    public function update(Request $request, Status $status) {}

    public function destroy(Status $status) {}

    public function data_status_admin() {

        $order = Status::with('pelanggan')->get();
        return DataTables::of($order)
        ->addColumn('nama', function($row) {
            return $row->pelanggan->nama;
        })
        ->addColumn('jenis_laundry', function ($row) {
            return $row->jenis_laundry->nama;
        })
        ->addColumn('berat', function ($row) {
            return $row->order->berat;
        })
        ->addColumn('total', function ($row) {
            return $row->order->total;
        })
        ->addColumn('status', function ($row) {
            return $row->status;
        })
        ->addIndexColumn()
        ->make(true);
    }

    public function data_status_pelanggan() {

        $id_user = auth()->user()->id;
        $order = Status::with(['pelanggan', 'jenis_laundry'])
            ->whereHas('pelanggan', function ($query) use ($id_user) {
                $query->where('id_user', $id_user);
            })

            ->get();

        return DataTables::of($order)
            ->addColumn('kode_status', function ($row) {
                return $row->kode_status;
            })
            ->addColumn('nama', function ($row) {
                return $row->pelanggan->nama;
            })
            ->addColumn('jenis_laundry', function ($row) {
                return $row->jenis_laundry->nama;
            })
            ->addColumn('berat', function ($row) {
                return $row->order->berat;
            })
            ->addColumn('total', function ($row) {
                return $row->order->total;
            })
            ->addColumn('status', function ($row) {
                return $row->status;
            })
            ->addIndexColumn()
            ->make(true);
    }

    public function status_pelanggan($id) {

        $order_pelanggan = Order::where('id_pelanggan', $id)->get();
        $status_pelanggan = Status::where('id_pelanggan', $id)->get();
        return view('status.status_pelanggan', ['order_pelanggan' => $order_pelanggan, 'status_pelanggan' => $status_pelanggan]);
    }

    public function order_selesai() {
        $order_selesai = Status::with('order')->get();
        return DataTables::of($order_selesai)
        ->addColumn('nama', function($row) {
            return $row->pelanggan->nama;
        })
        ->addColumn('no_hp', function($row) {
            return $row->pelanggan->no_hp;
        })
        ->addColumn('jenis_laundry', function ($row) {
            return $row->jenis_laundry->nama;
        })
        ->addIndexColumn()
        ->make(true);
    }
}
