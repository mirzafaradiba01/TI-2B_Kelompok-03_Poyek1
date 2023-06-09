<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class KomplainController extends Controller {

    public function index(Request $request) {
        $user = Auth::user();

        if ($user->role === 'admin') {
            // Jika user adalah admin, tampilkan semua komplain
            if ($request->has('query')) {
                $query = $request->get('query');
                $komplain = Komplain::where('kode_komplain', 'LIKE', '%'.$query.'%')
                    ->orWhere('id_pelanggan', 'LIKE', '%'.$query.'%')
                    ->with('pelanggan')
                    ->paginate(5);
            } else {
                $komplain = Komplain::with('pelanggan')->paginate(5);
            }
        } else if ($user->role === 'pelanggan') {
            // Jika user adalah pelanggan, tampilkan komplain yang terkait dengan username yang login
            if ($request->has('query')) {
                $query = $request->get('query');
                $komplain = Komplain::where('kode_komplain', 'LIKE', '%'.$query.'%')
                    ->orWhere('id_pelanggan', 'LIKE', '%'.$query.'%')
                    ->whereHas('pelanggan', function ($query) use ($user) {
                        $query->where('nama', $user->username);
                    })
                    ->with('pelanggan')
                    ->paginate(5);
            } else {
                $komplain = Komplain::whereHas('pelanggan', function ($query) use ($user) {
                    $query->whereHas('users', function ($query) use ($user) {
                        $query->where('email', $user->email);
                    });
                })
                ->with('pelanggan')
                ->paginate(5);
            }
        } else {
            $komplain = collect();
        }

        return view('komplain.komplain', ['komplain' => $komplain]);
    }


    public function create($id) {
        $pelanggan = Pelanggan::where('id', $id)->get();
        return view('komplain.create_komplain', ['url_form' => url(auth()->user()->role . '/komplain'), 'pelanggan' => $pelanggan]);
    }

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

    public function show($id) {
        $komplain = Komplain::find($id);
        // $pelanggan = Pelanggan::find($id);
        return view('komplain.komplain', [
            'komplain' => $komplain,
            // 'pelanggan' => $pelanggan,
        ]);
    }

    public function edit($id)
    {
        $komplain = Komplain::find($id);
        $pelanggan = Pelanggan::all();
        return view('komplain.update_komplain')
                    ->with('komplain', $komplain)
                    ->with('pelanggan', $pelanggan)
                    ->with('url_form', url( auth()->user()->role . '/komplain/'. $id));
    }

    public function update(Request $request, $id) {
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

    public function destroy($id) {

        Komplain::where('id', '=', $id)->delete();
        return redirect( auth()->user()->role . '/komplain' )->with ('success', 'Pelanggan Berhasil Dihapus');
    }

    public function data() {

        $komplain = Komplain::with('pelanggan')->get();
        return DataTables::of($komplain)
        ->addColumn('nama', function($row) {
            return $row->pelanggan->nama;
        })
        ->addIndexColumn()
        ->make(true);
    }

    public function komplainpelanggan(Request $request) {
        $image_name = null;
        if ($request->hasFile('image')){
            $image_name = $request->file('image')->store('images', 'public');
        }
    }
}
