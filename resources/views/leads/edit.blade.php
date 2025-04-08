@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-light">
                    <h4>Edit Lead</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('leads.update', $lead->id_leads) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal', $lead->tanggal) }}">
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="id_sales" class="form-label">Sales</label>
                                <select class="form-select @error('id_sales') is-invalid @enderror" id="id_sales" name="id_sales">
                                    <option value="">--Pilih Sales--</option>
                                    @foreach($sales as $s)
                                        <option value="{{ $s->id_sales }}" {{ old('id_sales', $lead->id_sales) == $s->id_sales ? 'selected' : '' }}>
                                            {{ $s->nama_sales }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_sales')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="nama_lead" class="form-label">Nama Lead</label>
                                <input type="text" class="form-control @error('nama_lead') is-invalid @enderror" id="nama_lead" name="nama_lead" value="{{ old('nama_lead', $lead->nama_lead) }}" placeholder="Nama Lead">
                                @error('nama_lead')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="id_produk" class="form-label">Produk</label>
                                <select class="form-select @error('id_produk') is-invalid @enderror" id="id_produk" name="id_produk">
                                    <option value="">--Pilih Produk--</option>
                                    @foreach($produk as $p)
                                        <option value="{{ $p->id_produk }}" {{ old('id_produk', $lead->id_produk) == $p->id_produk ? 'selected' : '' }}>
                                            {{ $p->nama_produk }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_produk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="no_wa" class="form-label">No. Whatsapp</label>
                                <input type="text" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa" name="no_wa" value="{{ old('no_wa', $lead->no_wa) }}" placeholder="No. Whatsapp">
                                @error('no_wa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" value="{{ old('kota', $lead->kota) }}" placeholder="Asal Kota">
                                @error('kota')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('leads.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection