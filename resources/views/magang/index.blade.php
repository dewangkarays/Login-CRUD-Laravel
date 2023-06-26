<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   
    <title>Daftar Anak Magang</title>
    <!-- Font Awesome -->

</head>
<body>
 
    <style>
      #myTable {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      
      #table td, #table th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      
      #myTable tr:nth-child(even){background-color: #f2f2f2;}
      
      #myTable tr:hover {background-color: #ddd;}
      
      #myTable th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #04AA6D;
        color: white;
      }

        .judul {
            display: flex;
            justify-content: center;
            color: #04AA6D;
        }

        .alert {
          animation: fadeOut 2s forwards;
        }

        @keyframes fadeOut {
            0% {
              opacity: 1;
            }
            90% {
              opacity: 1;
            }
            100% {
              opacity: 0;
              display: none;
            }
          }

        
    </style>
 <h1 class="judul">Daftar Mahasiswa Magang Nore</h1>
 
    
    
    
         <div class="container">
          <a href="/tambahmagang" class="btn btn-success" style="margin-bottom: 10px" >Tambah +</a>
          <div class="input-group">
            
            
          </div>
          <br>
        
            <div class="row">
              @if($message = Session::get('success'))
           <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
               @endif
               @if($message = Session::get('danger'))
               <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
                   @endif
               
              <table class="table table-bordered" id="myTable">
                    <thead>
                      <tr>
                        {{-- <th scope="col">id</th> --}}
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Email</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Universitas</th>
                        <th scope="col">Tanggal ditambahkan</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                        $no=1;
                      @endphp
                    @foreach ($data as $row)
                    <tr>
                        {{-- <th scope="row">{{ $row->id }}</th> --}}
                        <td>{{ $no++ }}</td>
                        
                        <td>{{ $row->nama }}</td>
                        <td>
                            <img src="{{ asset('fotomagang/'.$row->foto) }}" alt="" style="width: 100px">
                        </td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->semester }}</td>
                        <td>{{ $row->universitas }}</td>
                        <td>{{ $row->created_at->format('D/M/Y') }}</td>
                        <td>
                            
                            <a href="/tampilkandata/{{ $row-> id}}"  class="btn btn-warning">Edit</button>
                              <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</button>
                        </td>
                      </tr>
                    @endforeach 
                     
                    
                    </tbody>
                  </table>
                  
                  <div class="card-footer">
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    <a href="/exportpdf" class="btn btn-info" " >Export PDF</a>
                    <a href="/exportexcel" class="btn btn-success" " >Export Excel</a>
                  
                  </div>
                  
                  {{-- TAMBAH MAHASISWA --}}
            
            <!-- Modal
            {{-- data-toggle="modal" data-target="#exampleModal" --}}
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ...
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div>
            </div>
    
     --}} -->





<!-- MDB -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    table = new DataTable('#myTable');

</script>
{{-- <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
</body>
<script>
    $(".delete").click(function(){
      var magangid = $(this).attr('data-id');
      var namaid =$(this).attr('data-nama')
      swal({
        title: "Apakah Kamu Yakin?",
        text: "Kamu akan menghapus data dari "+namaid+" ",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/deletedata/"+magangid+""
          swal("Berhasil! Data "+namaid+" berhasil dihapus!", {
            icon: "success",
          });
        } else {
          swal("Data tidak jadi dihapus");
        }
      });

    });
        
</script>
</html>