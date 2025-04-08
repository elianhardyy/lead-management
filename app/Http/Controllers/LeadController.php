<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Produk;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::with(['sales', 'produk']);
        
        // Filter berdasarkan bulan jika ada
        if ($request->has('bulan')) {
            $bulan = $request->bulan;
            $query->whereMonth('tanggal', $bulan);
        } else {
            // Default tampilkan bulan saat ini
            $query->whereMonth('tanggal', Carbon::now()->month);
        }
        
        // Filter berdasarkan nama produk jika ada
        if ($request->has('produk') && $request->produk != '') {
            $query->where('id_produk', $request->produk);
        }
        
        // Filter berdasarkan sales jika ada
        if ($request->has('sales') && $request->sales != '') {
            $query->where('id_sales', $request->sales);
        }
        
        $leads = $query->get();
        $sales = Sales::all();
        $produk = Produk::all();
        
        return view('leads.index', compact('leads', 'sales', 'produk'));
    }

    public function create()
    {
        $sales = Sales::all();
        $produk = Produk::all();
        return view('leads.create', compact('sales', 'produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_sales' => 'required|exists:sales,id_sales',
            'id_produk' => 'required|exists:produk,id_produk',
            'no_wa' => 'required|string',
            'nama_lead' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
        ]);

        $lead = new Lead();
        $lead->tanggal = $request->tanggal;
        $lead->id_sales = $request->id_sales;
        $lead->id_produk = $request->id_produk;
        $lead->no_wa = $request->no_wa;
        $lead->nama_lead = $request->nama_lead;
        $lead->kota = $request->kota;
        $lead->id_user = Auth::id();
        $lead->save();

        return redirect()->route('leads.index')
            ->with('success', 'Lead berhasil disimpan!');
    }

    public function show(Lead $lead)
    {
        return view('leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        $sales = Sales::all();
        $produk = Produk::all();
        return view('leads.edit', compact('lead', 'sales', 'produk'));
    }

    public function update(Request $request, Lead $lead)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'id_sales' => 'required|exists:sales,id_sales',
            'id_produk' => 'required|exists:produk,id_produk',
            'no_wa' => 'required|string',
            'nama_lead' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
        ]);

        $oldData = $lead->getOriginal();
        
        $lead->tanggal = $request->tanggal;
        $lead->id_sales = $request->id_sales;
        $lead->id_produk = $request->id_produk;
        $lead->no_wa = $request->no_wa;
        $lead->nama_lead = $request->nama_lead;
        $lead->kota = $request->kota;
        $lead->save();
        
        // Cek apakah data berubah, jika ya, tampilkan notifikasi
        if ($lead->wasChanged()) {
            return redirect()->route('leads.index')
                ->with('info', 'Data lead dengan ID Input ' . $lead->id_leads . ' telah berubah.');
        }
        
        return redirect()->route('leads.index')
            ->with('success', 'Lead berhasil diperbarui!');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        
        return redirect()->route('leads.index')
            ->with('success', 'Lead berhasil dihapus!');
    }
}