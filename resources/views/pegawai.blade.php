<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Data Pegawai</title>
  </head>
  <body>
    <h3 class="text-center mt-3 mb-3">Data Pegawai</h3>

    <div class="container justify-content-center">
        <div class="card mt-5 ">
            <div class="card-body">
                <div class="container row">
                    <div class="col">
                        <a href="/createpegawai" class="btn btn-primary mb-2"><i class="fa fa-plus-square" aria-hidden="true"></i> Create</a>
                    </div>
                    <div class="col-auto ">       
                                <form action="/pegawai" method="GET" class="row g-3 align-items-end">
                                    <div class="col-auto align-content-center">
                                    <a href="{{route('exportpdf')}}" class="btn btn-secondary mb-2"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  PDF</a>
                                    <a href="#" class="btn btn-secondary mb-2"><i class="fa fa-file-excel-o" aria-hidden="true"></i>  Excel</a>
                                    </div>
                                    <div class="col-auto align-content-center">
                                        <input placeholder="Search" type="search" id="inputPassword6" name="search"class="form-control" aria-describedby="passwordHelpInline">
                                    </div>
                                </form>
                        </div>
                    <div class="row">
                        <!-- @if ($message = Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                {{$message}}
                            </div>    
                        @endif -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Photo Pegawai</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Nomor Telp</th>
                                    <th scope="col">Tanggal Dibuat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $no =1;
                            @endphp
                            @foreach($data as $index => $row)
                                <tr>
                                    <th scope="row">{{$index + $data->firstItem()}}</th>
                                    <td>{{$row->nama}}</td>
                                    <td>
                                        <img src="{{asset('photopegawai/'.$row->photo)}}" alt="" class="center" style="width: 50px;" >
                                    </td>
                                    <td>{{$row->jenis_kelamin}}</td>
                                    <td>0{{$row->no_telp}}</td>
                                    <td>{{$row->created_at->format('D M Y') }}</td>
                                    <td>
                                        <a href="/tampilpegawai/{{$row->id}}" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                        <a href="#" class="btn btn-danger delete" data-id="{{$row->id}}" data-nama="{{$row->nama}}"><i class="fa fa-trash "></i> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                        </table>
                        {{ $data->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
  <script>
    $('.delete').click(function(){
        var pegawaiid=$(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        swal({
            title: "Apakah kamu yakin?",
            text: "Untuk Menghapus Data Pegawai "+nama+"..! ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location ="/deletepegawai/"+pegawaiid+""
            swal("Terhapus! Kamu Berhasil Menghapus Data Pegawai "+nama+"!", {
            icon: "success",
            });
        } else {
            swal("Data Tidak Jadi Dihapus!");
        }
        }); 
    });
  </script>
  <script>
    @if (Session::has('success'))
        toastr.success("{{Session::get('success')}}")
    @endif
    
  </script>
</html>
