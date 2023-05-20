@extends('layouts.template')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Status Laundry</b></h1>
                    <br> <br> <br> <br>
                </div>
            </div>
        </div>

        <form action="" method="GET" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form>

    </section>
    <br> <br> <br>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="">

                <section>
                    <div class="text d-flex justify-content-around flex-row p-2">
                        <h1>Cuci</h1>
                        <h1>Setrika</h1>
                        <h1>Packing</h1>
                    </div>
                    <div class="container-fluid">
                        <div class="row-mb-2 d-flex flex-row justify-content-around">
                            <div class="">
                                <div class="card border-left-info shadow h-70 py-2 bg-info">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold">Nota Order</div>
                                                <button class="btn btn-primary" onclick="showPopup('cuci')">Update Status</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="card border-left-info shadow h-70 py-2 bg-info">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold">Nota Order</div>
                                                <button class="btn btn-primary" onclick="showPopup('setrika')">Update Status</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="card border-left-info shadow h-70 py-2 bg-info">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="h5 mb-0 font-weight-bold">Nota Order</div>
                                                <button class="btn btn-primary" onclick="showPopup('packing')">Update Status</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

    <!-- Pop-up -->
    <div id="popup" class="popup">
        <h2>Update Status</h2>
        <form>
            <input type="hidden" id="statusInput" />
            <input type="submit" value="Cuci ke Setrika" onclick="updateStatus('setrika')" />
            <input type="submit" value="Setrika ke Packing" onclick="updateStatus('packing')" />
            <input type="submit" value="Packing ke Selesai" onclick="updateStatus('selesai')" />
            <input type="button" value="Cancel" onclick="hidePopup()" />
        </form>
    </div>
@endsection
