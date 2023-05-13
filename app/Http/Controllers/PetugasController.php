<?php

namespace App\Http\Controllers;

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
                ->orWhere('nama_petugas', 'LIKE', '%'.$query.'%')
                ->orWhere('no_hp', 'LIKE', '%'.$query.'%')
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
    public function create()
    {
        return  view('petugas.create_petugas')
        ->with('url_form',url('/petugas'));
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
            'kode_petugas' => 'required|string|max:10|unique:petugas,kode_petugas',
            'id_order' => 'required',
            'nama_petugas' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',
        ]);

        $data = Petugas::create($request->except(['_token']));

        //jika berhasil
        return redirect('petugas')->with('success', 'petugas Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = Petugas::where('id',$id)->get();
        return view('petugas.detail_petugas', ['petugas' => $petugas[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::find($id);
        return view('petugas.create_petugas')
                    ->with('petugas',$petugas)
                    ->with('url_form',url('/petugas/'.$id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request ->validate([
                'kode_petugas' => 'required|string|max:10|unique:petugas,kode_petugas,'.$id,
                'id_order' => 'required',
                'nama_petugas' => 'required|string|max:50',
                'no_hp' => 'required|digits_between:6,15',

        ]);

        $data = petugas::where('id', '=', $id)->update($request->except(['_token','_method']));
        return redirect('petugas')
            ->with('success','petugas Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        petugas::where('id', '=', $id)->delete();
        return redirect('petugas')
        ->with ('success', 'petugas Berhasil Dihapus');
    }

    public function search(Request $request)
    {
        $petugas = Petugas::count();

        $keyword = $request->input('keyword');
        $column = $request->input('column');

        $query = Petugas::query();

        if ($column == 'Kode') {
            $query->where('kode_petugas', 'LIKE', "%$keyword%");
        } elseif ($column == 'Nama') {
            $query->where('nama_petugas', 'LIKE', "%$keyword%");

        $results = $query->get();

        return view('petugas.search_petugas', ['results' => $results])
            ->with('petugas', $petugas);
        }
    }
}
