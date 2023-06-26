<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.judul {
    display: flex;
    justify-content: center;
    align-items: center;
    color: #04AA6D;
}
</style>
</head>
<body>

<h1 class="judul">Daftar Mahasiswa Magang Nore Inovasi</h1>

<table id="customers">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Semester</th>
    <th>Universitas</th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $row)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->email }}</td>
    <td>{{ $row->semester }}</td>
    <td>{{ $row->universitas }}</td>
  </tr>
 @endforeach 
</table>

</body>
</html>


