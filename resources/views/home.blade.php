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

                    <h4>Selamat Datang di Lead Management System</h4>
                    <p>Silahkan pilih menu di atas untuk melanjutkan.</p>
                    
                    <div class="d-grid gap-2 col-md-6 mx-auto mt-4">
                        <a href="{{ route('leads.index') }}" class="btn btn-primary">Lihat Semua Lead</a>
                        <a href="{{ route('leads.create') }}" class="btn btn-success">Tambah Lead Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection