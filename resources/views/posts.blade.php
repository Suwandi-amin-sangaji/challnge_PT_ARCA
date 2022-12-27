<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Perhitungan Bonus</title>
    <style>
        body {
            background-color: lightgray !important;
        }

    </style>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center">Menghitung Nilai Rata-rata Bonus Pembayaran</h4>
                <div class="card border-0 shadow-sm rounded-md mt-4">
                    <div class="card-body">

                        <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create">Hitung</a>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Bonus Pembayaran</th>
                                    <th>Buruh A</th>
                                    <th>Buruh B</th>
                                    <th>Buruh C</th>
                                    <th>payment</th>
                                    <th>payment2</th>
                                    <th>payment3</th>
                                    
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-posts">
                                @foreach($posts as $post)
                                <tr id="index_{{ $post->id }}">
                                    <td>Rp.{{ number_format($post->totalBonus)}}</td>
                                    <td>{{ $post->percentage }}%</td>
                                    <td>{{ $post->percentage2 }}%</td>
                                    <td>{{ $post->percentage3 }}%</td>
                                    <td>Rp.{{ number_format($post->payment) }}</td>
                                    <td>Rp.{{ number_format($post->payment2) }}</td>
                                    <td>Rp.{{ number_format($post->payment3) }}</td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit" data-id="{{ $post->id }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <a href="javascript:void(0)" id="btn-delete" data-id="{{ $post->id }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @include('components.create')
    @include('components.edit')
    @include('components.delete')
    
</body>
</html>