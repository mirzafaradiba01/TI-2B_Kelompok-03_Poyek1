<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                ->orWhere('id_pelanggan', 'LIKE', '%'.$query.'%')
                ->with('pelanggan')
                ->paginate(5);
        } else {
            $komplain = Komplain::with('pelanggan')->paginate(5);
        }
        //dd($komplain);

        return view('komplain.komplain', ['komplain' => $komplain]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) {
        $pelanggan = Pelanggan::where('id', $id)->get();
        return view('komplain.create_komplain', ['url_form' => url(auth()->user()->role . '/komplain'), 'pelanggan' => $pelanggan]);
    }    

    /**
     * Store a newly created resource in storage.;
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $countkomplain = Komplain::count();
        $kode = '1100';
        $kode_komplain = $kode . ($countkomplain + 1);

        $image_name = null;
        if ($request->hasFile('gambar')){
            $image_name = $request->file('gambar')->store('bukti_komplain', 'public');

        }

        Komplain::create([
            'id_pelanggan' => $request->id_pelanggan,
            'kode_komplain' => $kode_komplain,
            'pesan' => $request->pesan,
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
    public function edit($id)
    {
        $komplain = Komplain::find($id);
        $pelanggan = Pelanggan::all();
        return view('komplain.update_komplain')
                    ->with('komplain', $komplain)
                    ->with('pelanggan', $pelanggan)
                    ->with('url_form', url( auth()->user()->role . '/komplain/'. $id));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $komplain = Komplain::find($id);
    
    if (!$komplain) {
        return redirect()->back()->with('error', 'Komplain tidak ditemukan.');
    }

    $komplain->id_pelanggan  = $request->id_pelanggan;
    $komplain->kode_komplain = $request->kode_komplain;
    $komplain->pesan = $request->pesan;
    $komplain->balasan = $request->balasan;

    if ($request->hasFile('gambar')) {
        // Menghapus gambar sebelumnya jika ada
        if ($komplain->gambar && Storage::exists('public/' . $komplain->gambar)) {
            Storage::delete('public/' . $komplain->gambar);
        }

        $gambar = $request->file('gambar')->store('bukti_komplain', 'public');
        $komplain->gambar = $gambar;
    }

    $komplain->save();

    return redirect(auth()->user()->role.'/komplain')->with('success', 'Data Komplain Berhasil Dirubah!');
}

    // $request ->validate([
        //     'id_pelanggan' => '',
        //     'kode_komplain' => 'required|string|max:10|unique:komplain,kode_komplain,'.$id,
        //     'pesan' => 'required|string|',
        //     'gambar' => 'mimes:jpeg,png,jpg',
        //     'balasan' => 'required|string|',
        // ]);

        // $komplain = Komplain::where('id',$id)->update($request->except(['_token','_method']));
        // $gambar = $request->file('gambar')->store('bukti_komplain', 'public');

        // Komplain::where('id', $id)->update([
        //     'id_pelanggan' => $request->id_pelanggan,
        //     'kode_komplain' =>$request->kode_komplain,
        //     'pesan' => $request->pesan,
        //     'gambar' => $gambar,
        //     'balasan' => $request->balasan,
            
        // ]);
    //     return redirect( auth()->user()->role . '/komplain' )->with('success','Data Komplain Berhasil Dirubah!');
    


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
