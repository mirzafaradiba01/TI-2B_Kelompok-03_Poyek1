<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class JenisLaundryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if($request->get('query') !== null){
        //     $query = $request->get('query');
        //     $jenisLaundry = JenisLaundry::where('kode_jenis_laundry', 'LIKE', '%'.$query.'%')
        //         ->orWhere('nama', 'LIKE', '%'.$query.'%')
        //         ->paginate(5);

        // } else {
        //     $jenisLaundry = JenisLaundry::paginate(5);
        // }
        return view('jenisLayanan.jenisLayanan');
    }

    public function data()
    {
        $data = JenisLaundry::selectRaw('id,kode_jenis_laundry,nama,biaya');

        return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
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
    public function update(Request $request, $id) {
        $rule = [
            'nama' => 'required|string|max:50',
            'biaya' => 'required|string|max:50',
            
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $jenisLaundry = JenisLaundry::where('id', $id)->update($request->except('_token', '_method'));

        return response()->json([
            'status' => ($jenisLaundry),
            'modal_close' => $jenisLaundry,
            'message' => ($jenisLaundry)? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisLaundry  $jenisLaundry
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     JenisLaundry::where('id', '=', $id)->delete();
    //     return redirect( auth()->user()->role . '/jenis_laundry' )
    //     ->with ('success', 'Jenis Layanan Berhasil Dihapus');
    // }
    public function destroy($id)
    {
        $jenisLaundry = JenisLaundry::where('id', $id)->first();
        
        if (!$jenisLaundry) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
                'data' => null
            ]);
        }
        
        $deleted = $jenisLaundry->delete();
        
        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus',
                'data' => null
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal dihapus',
                'data' => null
            ]);
        }
    }
}
