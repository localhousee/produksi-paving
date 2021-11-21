<?php

namespace App\Http\Controllers;

use App\Models\Paving;
use App\Http\Requests\PavingRequest;
use Illuminate\Support\Facades\Storage;

class PavingController extends Controller
{
    public function index()
    {
        return view('paving.index', [
            'paving' => Paving::all(),
        ]);
    }

    public function create()
    {
        return view('paving.create');
    }

    public function store(PavingRequest $request)
    {
        // https://laravel.com/docs/8.x/validation#form-request-validation
        $data = $request->validated();

        if($request->file('gambar')) {
            // https://laravel.com/docs/8.x/filesystem#file-uploads
            $gambar = $request->file('gambar')->store('paving');
    
            // Ubah value dari Gambar menjadi URL
            $data['gambar'] = $gambar;
        }

        // https://laravel.com/docs/8.x/eloquent#mass-assignment
        Paving::create($data);

        return redirect(route('paving.index'))->with('success', 'Data Telah Disimpan');
    }

    public function edit(Paving $paving)
    {
        return view('paving.edit', ['paving' => $paving]);
    }

    public function update(Paving $paving, PavingRequest $request)
    {
        $data = $request->validated();
        if($request->file('gambar')) {
            // https://laravel.com/docs/8.x/filesystem#deleting-files
            Storage::delete($paving->gambar);

            $gambar = $request->file('gambar')->store('paving');
            $data['gambar'] = '/storage/' . $gambar;
        } else {
            // Data Gambar Tetap
            $data['gambar'] = $paving->gambar;
        }
        // https://laravel.com/docs/8.x/eloquent#mass-updates
        $paving->update($data);
        return redirect(route('paving.index'))->with('success', 'Data Telah Disimpan');
    }

    public function destroy(Paving $paving)
    {
        Storage::delete($paving->gambar);
        // // https://laravel.com/docs/8.x/eloquent#deleting-models
        $paving->delete();
        return redirect(route('paving.index'))->with('success', 'Data Telah Disimpan');
    }
}
