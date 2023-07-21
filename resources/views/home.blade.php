@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if($message = Session::get('danger'))
                    <div class="alert alert-danger" role="alert">
                         {{ $message }}
                     </div>
                        @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    Selamat datang!
                    
                </div>
                <div class="card-footer">
                    <a href="/manageakun" class="btn btn-success">Manage Akun</a>
                    <a href="/halamanutama" class="btn btn-primary">
                        Daftar Mahasiswa Magang
                      </a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    {{-- <a href="#" class="btn btn-danger" >Hapus Akun</a> --}}
                    {{-- <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete Akun</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
