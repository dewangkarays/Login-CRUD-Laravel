@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    Selamat datang!
                    
                </div>
                <div class="card-footer">
                    <a href="/halamanutama" class="btn btn-primary">
                        Daftar Mahasiswa Magang
                      </a>
                    <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
