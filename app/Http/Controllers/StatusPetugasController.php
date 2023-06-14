<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusPetugasController extends Controller {

    public function index(Request $request) {

        if ($request->get('query') !== null) {
            
            $query = $request->get('query');
            $status_petugas = Status::where('kode_status', 'LIKE', '%' . $query . '%')
                ->orWhere('nama_pelanggan', 'LIKE', '%' . $query . '%')
                ->orWhere('no_hp', 'LIKE', '%' . $query . '%')
                ->paginate(5);
            $statusAntri = Status::where('status', 'Antri')->get();
            $statusCuci = Status::where('status', 'cuci')->get();
            $statusSetrika = Status::where('status', 'setrika')->get();
            $statusPacking = Status::where('status', 'packing')->get();
        } else {
            $status_petugas = Status::paginate(5);
            $statusAntri = Status::where('status', 'Antri')->get();
            $statusCuci = Status::where('status', 'cuci')->get();
            $statusSetrika = Status::where('status', 'setrika')->get();
            $statusPacking = Status::where('status', 'packing')->get();
        }
        return view('status.status_petugas', [
            'status_petugas' => $status_petugas,
            'statusAntri' => $statusAntri,
            'statusCuci' => $statusCuci,
            'statusSetrika' => $statusSetrika,
            'statusPacking' => $statusPacking
        ]);
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {

        $status = Status::find($id);
        $order = Order::find($id);
        return view('status.status_petugas', [
            'order' => $order,
            'status' => $status
        ]);
    }

    public function edit($id) {}

    public function update(Request $request, $id) {

        $status = Status::find($id);
        $status->status = $request->status;
        $status->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function destroy($id) {}

    public function update_status($id) {

        $status = Status::find($id);
        if ($status->status == 'Antri') {
            $status->status = 'Cuci';
        } elseif ($status->status == 'Cuci') {
            $status->status = 'Setrika';
        } elseif ($status->status == 'Setrika') {
            $status->status = 'Packing';
        }elseif ($status->status == 'Packing'){
            $status->status = 'Selesai';
        }

        $status->save();

        return redirect()->back()->with('Success', 'Status diperbarui.');
    }
}
