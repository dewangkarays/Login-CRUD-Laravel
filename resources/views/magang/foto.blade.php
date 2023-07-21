<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   
    <title>Foto</title>
</head>
<body>
    <style>
        .card-footer {
            display: flex;
          align-items: center;
        }

        #button {
            align-content: flex-end;
            justify-content: flex-end;
            align-self: flex-end;
            align-items: center;
            
        }
        .judul {
            display: flex;
            justify-content: center;
            color: #04AA6D;
        }
        #kelas {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          
        }
        
        #kelas td, #kelas th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #kelas tr:nth-child(even){background-color: #f2f2f2;}
        
        #kelas tr:hover {background-color: #ddd;}
        
        #kelas th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
        <h1 class="judul">
            Foto
        </h1>
    <table class="table table-bordered" id="kelas" >
        <thead>
          <tr>
            {{-- <th scope="col">id</th> --}}
            {{-- <th>Nomor</th> --}}
            {{-- <th>Nama</th> --}}
            {{-- <th>Posisi</th> --}}
            <th>Nomor</th>
            <th>Nama</th>
            <th>Foto</th>

            
            {{-- <th>Email</th> --}}
            {{-- <th>Semester</th>
            <th>Universitas</th>
            <th>Tanggal ditambahkan</th>
            <th>Edit</th>
            <th>Data</th>
        --}}
            {{-- <th>Delete</th> --}}
          </tr>
        </thead>
        <tbody>
          @php
            $no=1;
          @endphp
          
        @foreach ($data as $index => $row)
        <tr>
            {{-- <th scope="row">{{ $row->id }}</th> --}}
             {{-- <th scope="row">{{ $row->id }}</th> --}}
            <td>{{ $index + $data->firstItem() }}</td> 
            
             <td>{{ $row->nama }}</td> 
            <td>
                <img src="{{ asset('fotomagang/'.$row->foto) }}" alt="" style="width: 100px">
            </td>
            {{-- <td>{{ $row->email }}</td>
            <td>{{ $row->semester }}</td>
            <td>{{ $row->universitas }}</td>
            <td>{{ $row->created_at->format('D/M/Y') }}</td>
            <td> --}}
                
                {{-- <a href="/tampilkandata/{{ $row-> id}}"  class="btn btn-warning">Edit</button>
                  <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</button>
            </td> --}}
          </tr> 
        @endforeach  
        
         
        
        </tbody>
      </table>
      {{ $data->links() }}
      <div class="card-footer">
        <a href="/halamanutama" class="btn btn-warning" id="button">
           kembali
          </a>
      </div>
     

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</body>
</html>