<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if($request->get('query') !== null){
            $query = $request->get('query');
            $komplain = Komplain::where('kode_komplain', 'LIKE', '%'.$query.'%')
                ->orWhere('nama', 'LIKE', '%'.$query.'%')
                ->orWhere('no_hp', 'LIKE', '%'.$query.'%')
                ->with('pelanggan')
                ->paginate(5);
        } else {
            $komplain = Komplain::with('pelanggan')->paginate(5);
        }
        return view('komplain.komplain', ['komplain' => $komplain]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $komplain = Komplain::with('pelanggan')->get();
        dd($komplain);
        return view('komplain.create_komplain', ['url_form' => url( auth()->user()->role . '/komplain' ), 'komplain' => $komplain]);
    }

    /**
     * Store a newly created resource in storage.;
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $countkomplain = Komplain::count();

        $kode = '001';
        $kode_komplain = $kode . ($countkomplain + 1);

        $image_name = null;
        if ($request->hasFile('image')){
            $image_name = $request->file('image')->store('images', 'public');

        }

        Komplain::create([
            'id_pelanggan' => $request->id_pelanggan,
            'kode_komplain' => $kode_komplain,
            'balasan' => $request->balasan,
            'gambar' => $image_name,     
        ]);

         return redirect( auth()->user()->role . '/komplain' )->with('success', 'komplain Berhasil Ditambahkan');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $komplain = Komplain::find($id);
        // $pelanggan = Pelanggan::find($id);
        return view('komplain.komplain', [
            'komplain' => $komplain,
            // 'pelanggan' => $pelanggan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function edit(Komplain $komplain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komplain $komplain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komplain $komplain)
    {
        //
    }

    public function komplainpelanggan(Request $request)
    {
        $image_name = null;
        if ($request->hasFile('image')){
            $image_name = $request->file('image')->store('images', 'public');

        }
    }
}
