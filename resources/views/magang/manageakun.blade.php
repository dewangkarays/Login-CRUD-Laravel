<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   
    <title>Manage Akun User</title>
    
</head>
<body>
    <style>
        #user {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
         
            
        }
        
        #user td, #user th {
          border: 1px solid #ddd;
          padding: 8px;
          
        }
        
        #user tr:nth-child(even){background-color: #f2f2f2;}
        
        #user tr:hover {background-color: #ddd;}
        
        #user th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
          
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
          .judul {
            display: flex;
            justify-content: center;
            color: #04AA6D;
        }

        </style>
        <h1 class="judul">Edit User</h1>
        <div class="container">
          <a href="/manageakun" class= ></a>
          <div class="input-group">
            
            
          </div>
          <br>
   
   
        <div class="peringatan">
        
                {{-- @if($message = Session::get('success'))
             <div class="alert alert-success" role="alert">
                  {{ $message }}
              </div>
                 @endif
                 @if($message = Session::get('danger'))
                 <div class="alert alert-danger" role="alert">
                      {{ $message }}
                  </div>
                     @endif
                </div> --}}
        
       <table class="table table-bordered" id="user">
             <thead>
             
               <tr>
                 {{-- <th scope="col">id</th> --}}
                 <th>Nomor</th>
                 <th>Nama</th>
                 <th>Email</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>             
             </tbody>
           </table>
           <a href="/home" class="btn btn-warning" " >Kembali</a>
          

    
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script> 
$(document).ready(function(){
  $('#user').DataTable({
  processing: true,
  serverSide: true,
  ajax: `{{  url('infoakun')  }}`,
  
  columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex' },
      { data: 'name', name: 'name' },
      { data: 'email', name: 'email' },   
      
      {data:null, render:function(data, type, row){
    
    return `<button data-id="${row.id}" class="btn btn-danger" id="delete">Delete</button>`;
    }}

  ]
  });  
});
$(document).on('click', '#delete', function() {
                if(confirm('Are you sure you want delete??')){
                    $.ajax({
                        url: "{{ url('deletedataakun') }}",
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
                            
                        }
                    })
                }
            });

</script>
</body>

</html>