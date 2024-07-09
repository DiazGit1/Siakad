<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FakultasController extends Controller
{
    public function index(): View
    {
        $dataFakultas = Fakultas::latest()->paginate(5);
        return view('fakultas.index', compact('dataFakultas'));
    }
    
    public function create(): View
    {
        return view('fakultas.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'nama_fakultas' => 'required',
            'pimpinan_fakultas' => 'required',
        ]);

        Fakultas::create([
            'nama_fakultas' => $request->nama_fakultas,
            'pimpinan_fakultas' => $request->pimpinan_fakultas,
        ]);

        return redirect()->route('fakultas.index')->with(['success' => 'Data Fakultas Berhasil Disimpan!']);
    }

    // Metode edit dan update

    public function edit($id): View
    {
        $dataFakultas = Fakultas::findOrFail($id);
        return view('fakultas.edit', compact('dataFakultas'));
    }
    

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'nama_fakultas' => 'required',
            'pimpinan_fakultas' => 'required',
        ]);

        $fakultas = Fakultas::findOrFail($id);
        $fakultas->update([
            'nama_fakultas' => $request->nama_fakultas,
            'pimpinan_fakultas' => $request->pimpinan_fakultas,
        ]);

        return redirect()->route('fakultas.index')->with(['success' => 'Data Fakultas Berhasil Diupdate!']);
    }

    public function destroy($id): RedirectResponse
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();

        return redirect()->route('fakultas.index')->with(['success' => 'Data Fakultas Berhasil Dihapus!']);
    }
}
