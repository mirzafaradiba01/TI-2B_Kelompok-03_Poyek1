<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <div class="card-body">
        {{-- <a href="{{ url ('pelanggan/create')}}"class="btn btn-sm btn-info my-2">Tambah Data</a> --}}
        <form action="{{url('url')}}" method="GET" class="form-inline my-2 my-lg-0">
         <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search" aria-label="Search">
         <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Searching Kode Order</button>
     </form>
    
</body>
</html>

