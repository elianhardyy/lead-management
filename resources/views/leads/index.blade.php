@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tampilan Keseluruhan</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <h5>Filter Data</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('leads.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select name="bulan" id="bulan" class="form-select">
                        <option value="">Semua Bulan</option>
                        <option value="1" {{ request('bulan') == '1' ? 'selected' : '' }}>Januari</option>
                        <option value="2" {{ request('bulan') == '2' ? 'selected' : '' }}>Februari</option>
                        <option value="3" {{ request('bulan') == '3' ? 'selected' : '' }}>Maret</option>
                        <option value="4" {{ request('bulan') == '4' ? 'selected' : '' }}>April</option>
                        <option value="5" {{ request('bulan') == '5' ? 'selected' : '' }}>Mei</option>
                        <option value="6" {{ request('bulan') == '6' ? 'selected' : '' }}>Juni</option>
                        <option value="7" {{ request('bulan') == '7' ? 'selected' : '' }}>Juli</option>
                        <option value="8" {{ request('bulan') == '8' ? 'selected' : '' }}>Agustus</option>
                        <option value="9" {{ request('bulan') == '9' ? 'selected' : '' }}>September</option>
                        <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                        <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                        <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for="produk" class="form-label">Produk</label>
                    <select name="produk" id="produk" class="form-select">
                        <option value="">Semua Produk</option>
                        @foreach($produk as $p)
                            <option value="{{ $p->id_produk }}" {{ request('produk') == $p->id_produk ? 'selected' : '' }}>
                                {{ $p->nama_produk }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for="sales" class="form-label">Sales</label>
                    <select name="sales" id="sales" class="form-select">
                        <option value="">Semua Sales</option>
                        @foreach($sales as $s)
                            <option value="{{ $s->id_sales }}" {{ request('sales') == $s->id_sales ? 'selected' : '' }}>
                                {{ $s->nama_sales }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="{{ route('leads.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
    @endif
    
    <div class="mb-3">
        <a href="{{ route('leads.create') }}" class="btn btn-success">Tambah Lead</a>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Input</th>
                            <th>Tanggal</th>
                            <th>Sales</th>
                            <th>Produk</th>
                            <th>Nama Leads</th>
                            <th>No WA</th>
                            <th>Kota</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($leads as $index => $lead)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ str_pad($lead->id_leads, 3, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ \Carbon\Carbon::parse($lead->tanggal)->format('d-m-Y') }}</td>
                                <td>{{ $lead->sales->nama_sales }}</td>
                                <td>{{ $lead->produk->nama_produk }}</td>
                                <td>{{ $lead->nama_lead }}</td>
                                <td>{{ $lead->no_wa }}</td>
                                <td>{{ $lead->kota }}</td>
                                <td>
                                    <a href="{{ route('leads.show', $lead->id_leads) }}" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection