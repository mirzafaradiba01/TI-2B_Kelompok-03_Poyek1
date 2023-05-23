<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if($request->get('query') !== null){
            $query = $request->get('query');
            $pelanggan = Pelanggan::where('kode_pelanggan', 'LIKE', '%'.$query.'%')
                ->orWhere('nama', 'LIKE', '%'.$query.'%')
                ->orWhere('no_hp', 'LIKE', '%'.$query.'%')
                ->with('users')
                ->paginate(5);
        } else {
            $pelanggan = Pelanggan::with('users')->paginate(5);
        }
        return view('pelanggan.pelanggan', ['pelanggan' => $pelanggan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $users = User::all();
        return view('pelanggan.create_pelanggan', ['url_form' => url( auth()->user()->role . '/pelanggan' ), 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $countPelanggan = Pelanggan::count();
        $kode = '11';
        $kode_pelanggan = $kode . ($countPelanggan + 1);

        $request->validate([
            'id_user' => 'required',
            'nama' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',
        ]);

        Pelanggan::create([
            'id_user' => $request->id_user ,
            'kode_pelanggan' => $kode_pelanggan,
            'nama' => $request->nama,
            'no_hp'=> $request->no_hp,
        ]);
        return redirect( auth()->user()->role . '/pelanggan' )->with('success', 'Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $pelanggan = Pelanggan::where('id',$id)->get();
        return view('pelanggan.detail_pelanggan', ['pelanggan' => $pelanggan[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pelanggan = Pelanggan::find($id);
        $users = User::all();
        return view('pelanggan.update_pelanggan')
                    ->with('pelanggan', $pelanggan)
                    ->with('users', $users)
                    ->with('url_form', url( auth()->user()->role . '/pelanggan/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request ->validate([
            'id_user' => '',
            'kode_pelanggan' => 'required|string|max:10|unique:pelanggan,kode_pelanggan,'.$id,
            'nama' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',
        ]);

        $data = Pelanggan::where('id',$id)->update($request->except(['_token','_method']));
        return redirect( auth()->user()->role . '/pelanggan' )->with('success','Data Pelanggan Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        Pelanggan::where('id', '=', $id)->delete();
        return redirect( auth()->user()->role . '/pelanggan' )->with ('success', 'Pelanggan Berhasil Dihapus');
    }
}
