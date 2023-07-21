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
          #imagePreview {
        display: block;
        margin-left: auto;
        margin-right: auto;
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
    <br>
    <br>
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
               
              <table class="table table-bordered" id="kelas">
                    <thead>
                      <tr>
                        {{-- <th scope="col">id</th> --}}
                        <th>Nomor</th>
                        <th>Nama</th>
                        <th>Posisi</th>
                        <th>Foto</th>
                        <th>Email</th>
                        <th>Semester</th>
                        <th>Universitas</th>
                        <th>Tanggal ditambahkan</th>
                        <th>Edit</th>
                        <th>Data</th>
                   
                        {{-- <th>Delete</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      {{-- @php
                        $no=1;
                      @endphp
                    @foreach ($data as $row)
                    <tr>
                        <th scope="row">{{ $row->id }}</th>
                        {{-- {{-- <td>{{ $no++ }}</td> --}}
                        
                        {{-- <td>{{ $row->nama }}</td>
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
                    @endforeach   --}}
                    {{-- @foreach ($data as $row)
                      <img src="{{ asset('fotomagang/'.$row->foto) }}" alt="" style="width: 100px">
                  
                      @endforeach --}}
                    </tbody>
                  </table>
                  
                  <div class="card-footer">
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    <a href="/exportpdf" class="btn btn-info" " >Export PDF</a>
                    <a href="/exportexcel" class="btn btn-success" " >Export Excel</a>
                    <a href="/home" class="btn btn-warning" " >Kembali</a>
              

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title fs-5" id="exampleModalLabel">Foto</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  {{-- <div class="modal-body">
                      
                        <img src="{{ asset('fotomagang/'.$data->first()->foto) }}" alt="" style="width: 400px">
                </div> --}}
                <div class="modal-body">
                  <img id="imagePreview" src="" alt="" style="width: 450px">
              </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="submit" class="btn btn-primary" id="update">Save changes</button> --}}
                  </div>
                </div>
              </div>
            </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

<script> 
$(document).ready(function(){
  $('#kelas').DataTable({
  processing: true,
  serverSide: true,
  ajax: `{{  url('tabelutama')  }}`,
  
  columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex' },
      { data: 'nama', name: 'nama' },
      { data: 'posisi.posisi', name: 'posisi.posisi' },
      // { data: 'foto', name: 'foto', orderable: false, searchable: false},
      {data:null, render:function(data, type, row){
      let html = '';
      
          // html+= `<a href="/tampilkandata/${data.id}"  class="btn btn-info">Edit</button>`;
            // display foto
            // html+= `<a href="/foto/${row.id}"  class="btn btn-info">Lihat foto</button>`;
      // MODAL
           
      html+= `<button data-id="${data.id}" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" id="editmodal">Lihat Foto</button>`;
        
      return html
      // return `<button data-id="${ro.id}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" id="edit">Delete</button>`;
                            }},
      { data: 'email', name: 'email' },   
      { data: 'semester', name: 'semester' },   
      { data: 'universitas', name: 'universitas' },   
      { data: 'created_at', name: 'created_at' },   
      
    {data:null, render:function(data, type, row){
      let html = '';
      //   html += `<div style="text-align:center">`
        //   // html += `<button data-id="$(row.id)" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" id="edit">Edit</button>`;
        //   html += `<button data-id="" class="btn btn-danger"  data-bs-target="#exampleModal" id="edit">Delete</button>`;
        //   // <a href="{{ url('users/${data.id}/edit')}}">
          //     // ${row.id}
          //   html += `</div>`;+
          // ${data.foto}
          // html+= `<a href="/tampilkandata/${data.id}"  class="btn btn-info">Edit</button>`;
            html+= `<a href="/tampilkandata/${data.id}"  class="btn btn-warning">Edit</button>`;
      // MODAL
            // html+= `<button data-id="${row.id}" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" id="edit">MODAL</button>`;
        
      return html
      // return `<button data-id="${ro.id}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" id="edit">Delete</button>`;
                            }},
    //  {data:null, render:function(data, type, row){
    
    //   }},
    {data:null, render:function(data, type, row){
      let html='';
      html+= `<button data-id="${data.id}" class="btn btn-danger" id="delete">Delete</button>`;
     
        return html
    }},
                            

  ],
  columnDefs: [{
      "defaultContent": "-",
      "targets": "_all"
    }]
  });  
});
    // nampilin edit
    $(document).on('click', '#editmodal', function() {
    var id = $(this).data('id');
    
    $.ajax({
        url: "{{ url('editmodal') }}" + "/" + id,
        type: "get",
        dataType: 'json',
        success: function(response) {
            var fotoUrl = response.fotoUrl;
            $('#imagePreview').attr('src', fotoUrl);
            $('#exampleModal').modal('show');
        },
        error: function(xhr, textStatus, error) {
            console.log(xhr.responseText);
        }
    });
});


      // update data
      $(document).on('click', '#update', function() {
                if(confirm('Apakah kamu ingin mengganti data??')) {
                    $.ajax({
                        url: '{{ url("updateDataAkun") }}',
                        type: 'post',
                        dataType: 'json',
                        data: $('#updateform').serialize(),
                        success: function(response) {
                          console.log(response['code'])
                            $('#updateform')[0].reset();
                            // table.ajax.reload();
                            // $('#exampleModal').modal('hide')
                           
                            if (response['code']==200) {
                              location.reload()
                            } else {
                              alert('update gagal')
                            }
                        }
                    })
                }
            })
             // delete data
             $(document).on('click', '#delete', function() {
                if(confirm('Are you sure you want delete??')){
                    $.ajax({
                        url: "{{ url('deletedata') }}",
                        type: "post",
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": $(this).data('id')
                        },
                        success: function(response) {
                          console.log(response['code'])
                          if (response['code']==200) {
                            location.reload()
                          } else {
                            alert('delete gagal')
                          }
                            // table.ajax.reload();
                        }
                    })
                }
            });
        


</script>
{{-- <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script> --}}


{{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script> --}}
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