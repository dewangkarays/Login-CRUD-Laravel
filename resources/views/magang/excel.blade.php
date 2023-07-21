<!DOCTYPE html>
<html>
<head>

</head>
<body>

<table id="customers">
  <tr>
    <th><strong>No</strong></th>
    <th><strong>Nama</strong></th>
    <th><strong>Posisi</strong></th>
    <th><strong>Email</strong></th>
    <th><strong>Semester</strong></th>
    <th><strong>Universitas</strong></th>
  </tr>
  @php
      $no=1;
  @endphp
  @foreach ($data as $row)
  <tr>
    <td>{{ $no++ }}</td>
    <td>{{ $row->nama }}</td>
    <td>{{ $row->posisi->posisi }}</td>
    {{-- <td>
      <img url="{{ asset('fotomagang/'.$row->foto) }}" alt="" style="width: 100px">
  </td> --}}
    <td>{{ $row->email }}</td>
    <td>{{ $row->semester }}</td>
    <td>{{ $row->universitas }}</td>
  </tr>
 @endforeach 
</table>

</body>
</html>
