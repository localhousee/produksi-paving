<?php

namespace App\Http\Controllers;

use App\Http\Requests\BahanBakuRequest;
use App\Models\BahanBaku;

class BahanBakuController extends Controller
{
  public function index()
  {
    return view('bahanbaku.index', [
      'bahanbaku' => BahanBaku::orderBy('id', 'desc')->paginate(10),
    ]);
  }

  public function create()
  {
    return view('bahanbaku.create');
  }

  public function store(BahanBakuRequest $request)
  {
    BahanBaku::create($request->validated());
    return redirect(route('bahan-baku.index'))->with('success', 'Data Telah Disimpan');
  }

  public function edit(BahanBaku $bahanBaku)
  {
    return view('bahanbaku.edit', ['bahanBaku' => $bahanBaku]);
  }

  public function update(BahanBaku $bahanBaku, BahanBakuRequest $request)
  {
    $bahanBaku->update($request->validated());
    return redirect(route('bahan-baku.index'))->with('success', 'Data Telah Disimpan');
  }

  public function destroy(BahanBaku $bahanBaku)
  {
    $bahanBaku->delete();
    return redirect(route('bahan-baku.index'))->with('success', 'Data Telah Disimpan');
  }
}
