<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $query = $request->get('query');
        $petugas = Petugas::query();
        if ($query) {
            $petugas = $petugas->where('kode_petugas', 'LIKE', '%' . $query . '%')
                ->orWhere('nama', 'LIKE', '%' . $query . '%')
                ->orWhere('no_hp', 'LIKE', '%' . $query . '%');
        }

        $petugas = $petugas->paginate(5);
        $petugas->appends(['query' => $query]);
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

        // if (isset($request->id)) {
        //     $petugas = petugas::find($request->id);
        //     $petugas->nama = $request->nama;
        //     $petugas->alamat = $request->alamat;
        //     $petugas->no_hp = $request->no_hp;
        //     $petugas->save();
        //     return redirect( auth()->user()->role . '/petugas')->with('success', 'Data Petugas Berhasil Diperbarui');
        // }

        $countPetugas = Petugas::count();
        $kode = '11';
        $kode_petugas = $kode . ($countPetugas + 1);

        $request->validate([
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',
        ]);

        Petugas::create([
            'kode_petugas' => $kode_petugas,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
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
        $petugas = petugas::where('id',$id)->get();
        return view('petugas.detail_petugas', ['petugas' => $petugas[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $petugas = Petugas::find($id);
        return view('petugas.update_petugas')
            ->with('petugas', $petugas)
            ->with('url_form', url( auth()->user()->role . '/petugas/'. $id));
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
            'kode_petugas' => 'required|string|max:10|unique:petugas,kode_petugas,' . $id,
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',
        ]);

        $data = Petugas::where('id', $id)->update($request->except(['_token','_method']));
        return redirect( auth()->user()->role . '/petugas' )->with('success','Petugas Berhasil Ditambahkan');

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
