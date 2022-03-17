<?php

namespace App\Http\Controllers;

use App\Models\Paving;
use App\Http\Requests\PavingRequest;
use App\Models\BahanBaku;
use Illuminate\Support\Facades\Storage;

class PavingController extends Controller
{
    public function index()
    {
        return view('paving.index', [
            'paving' => Paving::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function create()
    {
        return view('paving.create');
    }

    public function store(PavingRequest $request)
    {
        $data = $request->except('abu_batu', 'semen');

        if ($request->file('gambar')) {
            $gambar = $request->file('gambar')->store('paving');

            $data['gambar'] = $gambar;
        }

        $paving = Paving::create($data);

        $semen = BahanBaku::where('jenis', 'semen')->first();
        $abuBatu = BahanBaku::where('jenis', 'abu batu')->first();

        $paving->bahan_baku()->attach($semen, [
            'jumlah' => $request->semen,
        ]);

        $paving->bahan_baku()->attach($abuBatu, [
            'jumlah' => $request->abu_batu,
        ]);

        return redirect(route('paving.index'))->with('success', 'Data Telah Disimpan');
    }

    public function show(Paving $paving)
    {
        return view('paving.show', ['paving' => $paving]);
    }

    public function edit(Paving $paving)
    {
        return view('paving.edit', ['paving' => $paving]);
    }

    public function update(Paving $paving, PavingRequest $request)
    {
        $data = $request->except('abu_batu', 'semen');
        if ($request->file('gambar')) {
            Storage::delete($paving->gambar);

            $gambar = $request->file('gambar')->store('paving');
            $data['gambar'] = $gambar;
        } else {

            $data['gambar'] = $paving->gambar;
        }
        $paving->update($data);

        $semen = BahanBaku::where('jenis', 'semen')->first();
        $abuBatu = BahanBaku::where('jenis', 'abu batu')->first();

        $paving->bahan_baku()->updateExistingPivot($semen, [
            'jumlah' => $request->semen,
        ]);

        $paving->bahan_baku()->updateExistingPivot($abuBatu, [
            'jumlah' => $request->abu_batu,
        ]);

        return redirect(route('paving.index'))->with('success', 'Data Telah Disimpan');
    }

    public function destroy(Paving $paving)
    {
        if ($paving->gambar) {
            Storage::delete($paving->gambar);
        }

        $paving->bahan_baku()->detach();
        $paving->delete();
        return redirect(route('paving.index'))->with('success', 'Data Telah Disimpan');
    }
}
