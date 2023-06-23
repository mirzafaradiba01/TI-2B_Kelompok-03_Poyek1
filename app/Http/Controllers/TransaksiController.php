<?php

namespace App\Http\Controllers;

use App\Models\JenisLaundry;
use App\Models\Order;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;


class TransaksiController extends Controller {

    public function index(Request $request) {

        if ($request->has('query')) {
            $searchQuery = $request->input('query');
            $order = Order::where(function ($query) use ($searchQuery) {
                $query->where('kode_order', 'LIKE', '%'.$searchQuery.'%')
                    ->orWhereHas('pelanggan', function ($query) use ($searchQuery) {
                        $query->where('kode_pelanggan', 'LIKE', '%'.$searchQuery.'%')
                            ->orWhere('nama', 'LIKE', '%'.$searchQuery.'%');
                    });
            })->paginate(5);
        }else {
            $order = Order::paginate(5);
        }
        return view('order.transaksi', ['order' => $order]);
    }

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {

        $order = Order::find($id);
        $pelanggan = Pelanggan::find($id);
        $jenis_laundry =JenisLaundry ::find($id);
        return view('order.transaksi', [
            'order' => $order,
            'pelanggan' => $pelanggan,
            'jenis_laundry' => $jenis_laundry
        ]);
    }

    public function edit($id) {

        $transaksi = Order::find($id);
        return view('order.update_transaksi')
            ->with('transaksi', $transaksi)
            ->with('url_form', url( auth()->user()->role . '/transaksi/'. $id));
    }

    public function update(Request $request, $id) {

        $rules = [
            'status_bayar' => 'string|max:50',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' . $validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }
    
        $transaksi = Order::find($id);
    
        if ($transaksi) {
            $transaksi->status_bayar = $request->status_bayar;
            $transaksi->save();
    
            return response()->json([
                'status' => true,
                'modal_close' => true,
                'message' => 'Data berhasil diedit',
                'data' => null
            ]);
        } else {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }
    }
    
    public function destroy($id) {}

    public function data() {

        $order = Order::with('pelanggan')->get();
        return DataTables::of($order)
        ->addColumn('nama', function($row) {
            return $row->pelanggan->nama;
        })
        ->addColumn('no_hp', function($row) {
            return $row->pelanggan->no_hp;
        })
        ->addColumn('jenis_laundry', function ($row) {
            return $row->jenis_laundry->nama;
        })
        ->addIndexColumn()
        ->make(true);
    }

    public function show_form() {
        return view('cetakLaporan.form_cetak');
    }

    public function cetak_laporan(Request $request) {

        $tanggal = $request->tanggal;
        $transaksi = Order::whereDate('tanggal_laundry', Carbon ::parse($tanggal)->format('Y-m-d'))->get();
        $data = [
            'transaksi' => $transaksi,
            'tanggal_laundry' => $tanggal,
        ];
        $pdf = PDF::loadview('cetakLaporan.cetakLaporan', ['transaksi' => $transaksi, 'data' => $data, 'tanggal' => $tanggal])->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function cetakNotaLaundry($id) {
        
        $notaLaundry = Order::find($id);
        $transaksi =  Order::where('id', $id)->get();
        $tanggal_sekarang = Carbon::now()->format('d F Y');
        $jam_sekarang = Carbon::now()->format('H:i:s');
        $pdf = PDF::loadView('notaLaundry.cetak', ['notaLaundry' => $notaLaundry, 'transaksi' => $transaksi, 'tanggal_sekarang' => $tanggal_sekarang, 'jam_sekarang' => $jam_sekarang])->setPaper('A3', 'landscape');
        return $pdf->stream();
    }



    public function show_keuangan()
    {
        return view('cetakLaporan.formLaporan');
    }

    public function cetak_keuangan(Request $request) {
        // Validasi input tanggal
        $request->validate([
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
        ],  [
            'tanggal_akhir.after_or_equal' => 'Tanggal awal harus lebih kecil atau sama dengan tanggal akhir.',
        ]);
        

        $tanggalAwal = $request->tanggal_awal;
        $tanggalAkhir = $request->tanggal_akhir;

        // Mengambil transaksi berdasarkan rentang tanggal
        $transaksi = DB::table('order')
        ->select('kode_order','tanggal_laundry','berat','total')
        ->whereBetween('tanggal_laundry', [$tanggalAwal, $tanggalAkhir])
        ->get();
    

        // Menghitung pendapatan per bulan
        $pendapatanPerBulan = [];
        foreach ($transaksi as $notaLaundry) {
            $tanggalLaundry = $notaLaundry->tanggal_laundry;
            $totalHarga = $notaLaundry->total;

            // Mendapatkan bulan dari tanggal laundry
            $bulan = date('F', strtotime($tanggalLaundry));

            // Menjumlahkan total pendapatan per bulan
            if (isset($pendapatanPerBulan[$bulan])) {
                $pendapatanPerBulan[$bulan] += $totalHarga;
            } else {
                $pendapatanPerBulan[$bulan] = $totalHarga;
            }
        }

        // Menghitung laporan semua keuangan bulanan
        $laporanKeuanganBulanan = DB::table('order')
            ->select(DB::raw('DATE(tanggal_laundry) AS tanggal'), DB::raw('COUNT(*) AS jumlah'), DB::raw('SUM(total) AS total'))
            ->whereBetween('tanggal_laundry', [$tanggalAwal, $tanggalAkhir])
            ->groupBy('tanggal')
            ->get();

        // Membuat laporan dalam bentuk PDF
        $pdf = PDF::loadView('cetakLaporan.laporanKeuangan', [
            'pendapatanPerBulan' => $pendapatanPerBulan,
            'tanggalAwal' => $tanggalAwal,
            'tanggalAkhir' => $tanggalAkhir,
            'transaksi' => $transaksi,
            'laporanKeuanganBulanan' => $laporanKeuanganBulanan,
            ]);

        // Mengirim file PDF untuk diunduh
        return $pdf->stream();
    }


}
