<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller {

    public function index() {
        return view('index');
    }

    public function create() {}

    public function store(Request $request) {}

    public function show(HomePage $homePage) {}

    public function edit(HomePage $homePage) {}

    public function update(Request $request, HomePage $homePage) {}

    public function destroy(HomePage $homePage) {}

    // menampilkan dashboard khusus admin
    public function admin() {
        return view('dashboard.admin');
    }

    // menampilkan dashboard khusus petugas
    public function petugas() {
        return  view('dashboard.petugas');
    }

    // menampilkan dashboard khusus pelanggan
    public function pelanggan() {
        return view('dashboard.pelanggan');
    }
}
