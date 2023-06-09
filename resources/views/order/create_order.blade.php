@extends('layouts.template')

@section('content')
    <section class="container ">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title ">FORM ORDER</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            {{-- action="{{ url( auth()->user()->role . '/order') }}" --}}
            <form class="p-5" action="{{ url(auth()->user()->role . '/order') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- {!! (isset($pelanggan))? method_field('PUT') : '' !!} --}}
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <select name="id_pelanggan" class="form-control @error('id_pelanggan') is-invalid @enderror">
                        @foreach ($pelanggan as $p)
                            <option value="{{ $p->id }}">{{ $p->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_pelanggan')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tanggal_laundry">Tanggal Laundry: </label>
                    <input type="date" class="form-control @error('tanggal_laundry') is-invalid @enderror"
                        required="required" name="tanggal_laundry"></br>
                    @error('tanggal_laundry')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis-laundry">Jenis Laundry</label>
                    <select name="id_jenis_laundry" class="form-control @error('id_jenis_laundry') is-invalid @enderror"
                        onchange="updateInputValue(this)">
                        @foreach ($jenis as $js)
                            <option value="{{ $js->id }}" data-biaya="{{ $js->biaya }}">{{ $js->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_jenis_laundry')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="biaya">Biaya:</label>
                    <input type="text" class="form-control @error('biaya') is-invalid @enderror" required="required"
                        name="biaya" id="inputBiaya" readonly></br>
                    @error('biaya')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="berat">Berat: </label>
                    <input type="text" class="form-control @error('berat') is-invalid @enderror" required="required"
                        name="berat" oninput="hitungTotal()"></br>
                    @error('berat')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="total">Total Bayar: </label>
                    <input type="text" class="form-control @error('total') is-invalid @enderror" required="required"
                        name="total" id="inputTotal" readonly></br>
                    @error('total')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="catatan">Catatan: </label>
                    <textarea type="text" class="form-control @error('catatan') is-invalid @enderror" required="required" name="catatan"></textarea></br>
                    @error('catatan')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_bayar">Metode Pembayaran:</label>
                    <select id="status_bayar" name="status_bayar"
                        class="form-control @error('status_bayar') is-invalid @enderror">
                        <option value="DP">DP</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Bayar di Akhir">Bayar di Akhir</option>
                    </select></br>
                    @error('status_bayar')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
