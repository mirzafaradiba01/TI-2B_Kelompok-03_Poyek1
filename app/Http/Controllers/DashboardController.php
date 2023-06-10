<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index() {}

    public function create() {}

    public function store(Request $request) {}

    public function show($id) {}

    public function edit($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}

    public function admin() {
        return view('dashboard.admin');
    }

    public function petugas() {
        return  view('dashboard.petugas');
    }

    public function pelanggan() {
        return view('dashboard.pelanggan');
    }
}
