<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Anak Magang</title>
    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
rel="stylesheet"
/>
</head>
<body>
    <style>
       

        .judul {
            display: flex;
            justify-content: center;
        }
    </style>
 <h1 class="judul">Tambah Daftar Mahasiswa Magang</h1>
 
    
         <div class="container">
     
        
            <div class="row justify-content-center">
              <div class="col-5">
                <div class="card">
                  <div class="card-body">
                    <form action="/insertdata" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input required type="text" name='nama' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Posisi</label>
                        <select class="form-control select2" style="width:100%;" name="posisi_id" id="posisi_id">
                          <option disabled value>Pilih Posisi</option>
                          @foreach ($data as $row)
                          <option value="{{ $row->id }}">{{ $row->posisi }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input required type="email"  name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Semester</label>
                        <input required type="number"  name='semester' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Universitas</label>
                        <input required type="text"  name='universitas' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Masukkan foto</label>
                        <input  type="file"  name='foto' class="form-control" >
                      </div>
                      <a href="/halamanutama" class="btn btn-warning" " >Kembali</a>
                      <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                  </div>
                </div>
                
              </div>
            </div>
            {{-- <div class="card-footer">
              <a href="/halamanutama" class="btn btn-warning" " >Kembali</a>

            </div> --}}
                  
                  {{-- TAMBAH MAHASISWA --}}
            
            <!-- Modal -->
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
    
     --}}
</body>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
></script>
</html>