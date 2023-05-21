<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if($request->get('query') !== null){
            $query = $request->get('query');
            $status_petugas = Status::where('kode_status', 'LIKE', '%'.$query.'%')
                ->orWhere('nama_pelanggan', 'LIKE', '%'.$query.'%')
                ->orWhere('no_hp', 'LIKE', '%'.$query.'%')
                ->paginate(5);
            $statusCuci = Status::where('status', 'cuci')->get();
            $statusSetrika = Status::where('status', 'setrika')->get();
            $statusPacking = Status::where('status', 'packing')->get();
        } else {
            $status_petugas = Status::paginate(5);
            $statusCuci = Status::where('status', 'cuci')->get();
            $statusSetrika = Status::where('status', 'setrika')->get();
            $statusPacking = Status::where('status', 'packing')->get();
        }
        return view('status.status_petugas', ['status_petugas' => $status_petugas, 'statusCuci' => $statusCuci, 'statusSetrika' => $statusSetrika, 'statusPacking' => $statusPacking]);
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
    public function show($id)
    {
        $status = Status::find($id);
        $order = Order::finc($id);
        $pelanggan = Pelanggan::find($id);
        $jenis_laundry = JenisLaundry::find($id);
        return view('status.status_petugas', [
            'order' => $order,
            'status' => $status,
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
