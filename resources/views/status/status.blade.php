@extends('layouts.template')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> <b> Status Laundry </b> </h1>
                    <br> <br> <br> <br>
                </div>
            </div>
        </div> 
        
        {{-- <div class="card-body"> --}}
            <form action="" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search </button>
            </form>

    </section>
    <br> <br> <br> 

    <!-- Main content -->
    <section class="content" style="width: 100%; border: 2px solid red;">

        <!-- Default box -->
        <div class="container-fluid d-flex fle-column justify-content-between" style="border: 10px solid red; margin-right: 100px">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              
                    <section>
                        <div class="container-fluid">
                            <div class="row-mb-2">
                                <div class="col-sm-3">
                                    <h1>Cuci </h1>
                                </div>    
                                <br>                            
                                    <div class=d"">
                                    
                                        <div class="card border-left-info shadow h-100 py-2 bg-info">
                                        
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                    
                                                        <div class="h5 mb-0 font-weight-bold"> Nota Order</div>
                                                        {{-- <a href="{{ url('/order') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                                                    </div>
                                            
                                                </div>
                                            </div>

                                        </div>

                                        <div class="card border-left-info shadow h-100 py-2 bg-info">
                                
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                    
                                                        <div class="h5 mb-0 font-weight-bold"> Nota Order</div>
                                                        {{-- <a href="{{ url('/order') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                                                    </div>
                                            
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card border-left-info shadow h-100 py-2 bg-info">
                                
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                    
                                                        <div class="h5 mb-0 font-weight-bold"> Nota Order</div>
                                                        {{-- <a href="{{ url('/order') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                                                    </div>
                                            
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </section>
                    

            
            <section>
                <div class="container-fluid">
                    <div class="row-mb-2">
                        <div class="col-sm-3">
                            <h1>Setrika </h1>
                        </div>    
                        <br>                            
                            <div class="">
                            
                               
                            
                        </div>
                        
                    </div>
                </div>
              
            </section>

            <section>
                <div class="container-fluid">
                    <div class="row-mb-2">
                        <div class="col-sm-3">
                            <h1>Packing  </h1>
                        </div>    
                        <br>                            
                            <div class="">
                            
                                <div class="card border-left-info shadow h-100 py-2 bg-info">
                                
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                            
                                                <div class="h5 mb-0 font-weight-bold"> Nota Order</div>
                                                {{-- <a href="{{ url('/order') }}" class="small-box-footer h5 mb-0 font-weight-bold">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                                            </div>
                                    
                                        </div>
                                    </div>
                                                       </div>
                            
                        </div>
                        
                    </div>
                </div>
              
              </div>
            </section>
            </div> 
            
    </section>
@endsection
