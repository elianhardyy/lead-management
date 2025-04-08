@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h4>Detail Lead</h4>
                    <a href="{{ route('leads.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th width="30%">ID Input</th>
                                <td>{{ str_pad($lead->id_leads, 3, '0', STR_PAD_LEFT) }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>{{ \Carbon\Carbon::parse($lead->tanggal)->format('d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th>Sales</th>
                                <td>{{ $lead->sales->nama_sales }}</td>
                            </tr>
                            <tr>
                                <th>Produk</th>
                                <td>{{ $lead->produk->nama_produk }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lead</th>
                                <td>{{ $lead->nama_lead }}</td>
                            </tr>
                            <tr>
                                <th>No. Whatsapp</th>
                                <td>{{ $lead->no_wa }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>{{ $lead->kota }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Dibuat</th>
                                <td>{{ $lead->created_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Terakhir Diupdate</th>
                                <td>{{ $lead->updated_at->format('d-m-Y H:i:s') }}</td>
                            </tr>
                        </table>
                    </div>
                    
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('leads.edit', $lead->id_leads) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('leads.destroy', $lead->id_leads) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection