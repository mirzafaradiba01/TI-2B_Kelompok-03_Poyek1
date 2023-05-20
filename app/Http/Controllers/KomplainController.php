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
            $komplain = Komplain::where('id', 'LIKE', '%'.$query.'%')
                ->orWhere('nama', 'LIKE', '%'.$query.'%')
                ->orWhere('no_hp', 'LIKE', '%'.$query.'%')
                ->paginate(5);
        } else {
            $komplain = Komplain::paginate(5);
        }
        return view('komplain.komplain', ['komplain' => $komplain]);
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
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $komplain = Komplain::find($id);
        $pelanggan = Pelanggan::find($id);
        return view('komplain.komplain', [
            'komplian' => $komplain,
            'pelanggan' => $pelanggan,
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
}
