<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PetugasController extends Controller {

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
        return view('petugas.petugas');
    }

    public function data() {

        $data = Petugas::selectRaw('id,kode_petugas,nama,alamat,no_hp');
        return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
    }

    public function create() {
        $order = Petugas::all();
        return view('petugas.create_petugas', ['url_form' => url( auth()->user()->role . '/petugas' ), 'order' => $order]);
    }

    public function store(Request $request) {

        $countPetugas = Petugas::count();
        $kode = '10';
        $kode_petugas = $kode . ($countPetugas + 1);

        $rule = [
            'nama' => 'required|string|max:50',
            'alamat' => 'string|max:255',
            'no_hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'modal_close' => true,
                'message' => 'Data gagal ditambahkan. ' . $validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $data = $request->all();
        $data['kode_petugas'] = $kode_petugas;
        $petugas = Petugas::create($data);
        
        if ($petugas) {
            return response()->json([
                'kode_petugas' => $kode_petugas,
                'status' => true,
                'modal_close' => true,
                'message' => 'Data berhasil ditambahkan',
                'data' => null
            ]);
        } else {
            return response()->json([
                'status' => false,
                'modal_close' => true,
                'message' => 'Data gagal ditambahkan',
                'data' => null
            ]);
        }
    }

    public function show($id) {

        $petugas = Petugas::where('id', $id)->first();

        if ($petugas) {
            return response()->json($petugas);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        };
    }

    public function edit($id) {

        $petugas = Petugas::find($id);
        return view('petugas.update_petugas')
            ->with('petugas', $petugas)
            ->with('url_form', url( auth()->user()->role . '/petugas/'. $id));
    }

    public function update(Request $request, $id) {

        $rule = [
            'nama' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_hp' => 'required|digits_between:6,15',
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

        $petugas = Petugas::where('id', $id)->update($request->except('_token', '_method'));

        return response()->json([
            'status' => ($petugas),
            'modal_close' => $petugas,
            'message' => ($petugas) ? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }

    public function destroy($id) {

        $petugas = Petugas::where('id', $id)->first();

        if (!$petugas) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
                'data' => null
            ]);
        }

        $deleted = $petugas->delete();

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
