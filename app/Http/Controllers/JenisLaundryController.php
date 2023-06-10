<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class JenisLaundryController extends Controller {

    public function index(Request $request) {
        if($request->get('query') !== null){
            $query = $request->get('query');
            $jenisLaundry = JenisLaundry::where('kode_jenis_laundry', 'LIKE', '%'.$query.'%')
                ->orWhere('nama', 'LIKE', '%'.$query.'%')
                ->paginate(5);

        } else {
            $jenisLaundry = JenisLaundry::paginate(5);
        }
        return view('jenisLayanan.jenisLayanan');
    }

    public function data() {

        $data = JenisLaundry::selectRaw('id,kode_jenis_laundry,nama,biaya');
        return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(JenisLaundry $jenisLaundry) {}

    public function edit(JenisLaundry $jenisLaundry) {}

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
   
    public function destroy($id) {

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
