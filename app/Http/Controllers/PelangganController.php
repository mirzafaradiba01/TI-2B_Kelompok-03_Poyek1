<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PelangganController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $user = User::all();
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
        return view('pelanggan.pelanggan', ['pelanggan' => $pelanggan, 'user' => $user]);
    }

    public function data() {
        $mahasiswa = Pelanggan::with('users')->get();
        return DataTables::of($mahasiswa)
        ->addIndexColumn()
        ->addColumn('username', function($row) {
            return $row->users->username;
        })
        ->make(true);
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
    public function store(Request $request)
    {
        $countPelanggan = Pelanggan::count();
        $kode = '11';
        $kode_pelanggan = $kode . ($countPelanggan + 1);

        $rule = [
            'nama' => 'required|string|max:50',
            'username' => 'string|max:50',
            'no_hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' . $validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $data = $request->all();
        $data['kode_pelanggan'] = $kode_pelanggan;

        $petugas = Pelanggan::create($data);
        if ($petugas) {
            return response()->json([
                'kode_pelanggan' => $kode_pelanggan,
                'status' => true,
                'modal_close' => false,
                'message' => 'Data berhasil ditambahkan',
                'data' => null
            ]);
        } else {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan',
                'data' => null
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $pelanggan = Pelanggan::where('id', $id)->first();

        if ($pelanggan) {
            $user = User::where('id', $pelanggan->id_user)->first();
            $pelanggan->username = $user->username;
            return response()->json($pelanggan);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $pelanggan = Pelanggan::find($id);
        return view('pelanggan.update_pelanggan')
            ->with('pelanggan', $pelanggan)
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
        $rule = [
            'nama' => 'required|string|max:50',
            'username' => 'string|max:50',
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

        $pelanggan = Pelanggan::where('id', $id)->first();
        if ($pelanggan) {
            $pelanggan->update($request->except('_token', '_method'));

            // Update username in User table
            $user = $pelanggan->user;
            if ($user) {
                $user->update(['username' => $request->username]);
            }

            return response()->json([
                'status' => true,
                'modal_close' => true,
                'message' => 'Data berhasil diedit',
                'data' => null
            ]);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
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
