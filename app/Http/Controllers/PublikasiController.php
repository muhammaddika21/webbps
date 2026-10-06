<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index()
    {
        $publikasi = Publikasi::orderBy('tanggal_rilis', 'desc')->get();

        return view('publikasi.index', compact('publikasi'));
    }

    public function create()
    {
        return view('publikasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_rilis' => 'required|date',
            'sampul' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('sampul')) {
            $file = $request->file('sampul');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9.\-_]/', '_', $file->getClientOriginalName());
            $file->move(public_path('images'), $filename);
            $validated['sampul'] = $filename;
        }

        Publikasi::create($validated);

        return redirect()->route('publikasi.index')->with('sukses', 'Data Berhasil Ditambahkan');
    }

    public function destroy(Publikasi $publikasi)
    {
        if ($publikasi->sampul) {
            $masihDipakai = Publikasi::where('sampul', $publikasi->sampul)
                ->where('id', '!=', $publikasi->id)
                ->exists();
            $path = public_path('images/' . $publikasi->sampul);
            if (! $masihDipakai && is_file($path)) {
                @unlink($path);
            }
        }

        $publikasi->delete();

        return redirect()->route('publikasi.index')->with('sukses', 'Data Berhasil Dihapus');
    }
}
