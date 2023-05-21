<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('query') !== null){
            $query = $request->get('query');
            $petugas = Petugas::where('kode_petugas', 'LIKE', '%'.$query.'%')
                ->orWhere('nama', 'LIKE', '%'.$query.'%')
                ->paginate(5);
        } else {
            $petugas = Petugas::paginate(5);
        }
        return view('petugas.petugas', ['petugas' => $petugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $order = Order::all();
        return view('petugas.create_petugas', ['url_form' => url( auth()->user()->role . '/petugas' ), 'order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $countPetugas = Petugas::count();
        $kode = '11';
        $kode_petugas = $kode . ($countPetugas + 1);

        $request->validate([
            'id_order' => 'required',
            'kode_petugas' => 'required|string|max:10|unique:petugas,kode_petugas',
            'nama' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',
        ]);

        Petugas::create([
            'kode_petugas' => $kode_petugas,
            'nama' => $request->nama,
            'no_hp'=> $request->no_hp,
        ]);

        return redirect( auth()->user()->role . '/petugas' )->with('success', 'Petugas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $petugas = Petugas::find($id);
        $order = Order::all();
        return view('petugas.create_petugas')
                    ->with('petugas', $petugas)
                    ->with('order', $order)
                    ->with('url_form',url( auth()->user()->role . '/petugas/' . $id ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $request->validate([
            'id_order' => '',
            'kode_petugas' => 'required|string|max:10|unique:petugas,kode_petugas,' . $id,
            'nama' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',

        ]);

        $data = Petugas::where('id', '=', $id)->update($request->except(['_token','_method']));
        return redirect( auth()->user()->role . 'petugas' )->with('success','Petugas Berhasil Ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Petugas::where('id', '=', $id)->delete();
        return redirect( auth()->user()->role . '/petugas' )
        ->with ('success', 'Petugas Berhasil Dihapus');
    }


}
