<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use Illuminate\Http\Request;

class JenisLaundryController extends Controller
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
            $jenisLaundry = JenisLaundry::where('kode_jenis_laundry', 'LIKE', '%'.$query.'%')
                ->orWhere('nama', 'LIKE', '%'.$query.'%')
                ->paginate(5);
                
        } else {
            $jenisLaundry = JenisLaundry::paginate(5);
        }
        return view('jenisLayanan.jenisLayanan', ['jenisLaundry' => $jenisLaundry]);
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
     * @param  \App\Models\JenisLaundry  $jenisLaundry
     * @return \Illuminate\Http\Response
     */
    public function show(JenisLaundry $jenisLaundry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisLaundry  $jenisLaundry
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisLaundry $jenisLaundry)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisLaundry  $jenisLaundry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisLaundry $jenisLaundry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisLaundry  $jenisLaundry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisLaundry::where('id', '=', $id)->delete();
        return redirect('jenis_laundry')
        ->with ('success', 'Jenis Layanan Berhasil Dihapus');
    }
}
