<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        // return view('pelanggan');
        if($request->get('query') !== null){
            $query = $request->get('query');
            $pelanggan = Pelanggan::where('kode_pelanggan', 'LIKE', '%'.$query.'%')
                ->orWhere('nama_pelanggan', 'LIKE', '%'.$query.'%')
                ->orWhere('no_hp', 'LIKE', '%'.$query.'%')
                ->paginate(5);
        } else {
            $pelanggan = Pelanggan::paginate(5);
        }
        return view('pelanggan.pelanggan', ['pelanggan' => $pelanggan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('pelanggan.create_pelanggan')
        ->with('url_form',url('/pelanggan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pelanggan' => 'required|string|max:10|unique:pelanggan,kode_pelanggan',
            'nama_pelanggan' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',
        ]);

        $data = Pelanggan::create($request->except(['_token']));

        //jika berhasil
        return redirect('pelanggan')
                ->with('success', 'Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data berd nim
        //code sebelum dibuat relasi :

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
        return view('pelanggan.create_pelanggan')
                    ->with('pelanggan',$pelanggan)
                    ->with('url_form',url('/pelanggan/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request ->validate([
                'kode_pelanggan' => 'required|string|max:10|unique:pelanggan,kode_pelanggan,'.$id,
                'nama_pelanggan' => 'required|string|max:50',
                'no_hp' => 'required|digits_between:6,15',

        ]);

        $data = Pelanggan::where('id', '=', $id)->update($request->except(['_token','_method']));
        return redirect('pelanggan')
            ->with('success','Pelanggan Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::where('id', '=', $id)->delete();
        return redirect('pelanggan')
        ->with ('success', 'Pelanggan Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $pelanggan = Pelanggan::count();

        $keyword = $request->input('keyword');
        $column = $request->input('column');

        $query = Pelanggan::query();

        if ($column == 'Kode') {
            $query->where('kode_pelanggan', 'LIKE', "%$keyword%");
        } elseif ($column == 'Nama') {
            $query->where('nama_pelanggan', 'LIKE', "%$keyword%");

        $results = $query->get();

        return view('pelanggan.search_pelanggan', ['results' => $results])
            ->with('pelanggan', $pelanggan);
        }
    }
}
