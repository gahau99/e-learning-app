<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomentarController extends Controller
{
    use App\Models\Komentar;

public function store(Request $request)
{
    $validated = $request->validate([
        'isi' => 'required',
        'materi_id' => 'nullable|exists:materis,id',
        'tugas_id' => 'nullable|exists:tugas,id',
    ]);

    $validated['user_id'] = auth()->id();

    Komentar::create($validated);

    return back()->with('success', 'Komentar berhasil ditambahkan');
}
}
