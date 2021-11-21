<?php

namespace App\Http\Controllers;

use App\Http\Requests\BahanBakuRequest;
use App\Models\BahanBaku;

class BahanBakuController extends Controller
{
  public function index()
  {
    return view('bahanbaku.index', [
      'bahanbaku' => BahanBaku::all(),
    ]);
  }

  public function create()
  {
    return view('bahanbaku.create');
  }

  public function store(BahanBakuRequest $request)
  {
    // https://laravel.com/docs/8.x/eloquent#mass-assignment
    // https://laravel.com/docs/8.x/validation#form-request-validation
    BahanBaku::create($request->validated());
    return redirect(route('bahan-baku.index'))->with('success', 'Data Telah Disimpan');
  }

  public function edit(BahanBaku $bahanBaku)
  {
    return view('bahanbaku.edit', ['bahanBaku' => $bahanBaku]);
  }

  public function update(BahanBaku $bahanBaku, BahanBakuRequest $request)
  {
    // https://laravel.com/docs/8.x/eloquent#mass-updates
    $bahanBaku->update($request->validated());
    return redirect(route('bahan-baku.index'))->with('success', 'Data Telah Disimpan');
  }

  public function destroy(BahanBaku $bahanBaku)
  {
    // https://laravel.com/docs/8.x/eloquent#deleting-models
    $bahanBaku->delete();
    return redirect(route('bahan-baku.index'))->with('success', 'Data Telah Disimpan');
  }
}
