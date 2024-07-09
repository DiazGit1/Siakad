<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\ProgramStudi;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts = ProgramStudi::with('fakultas')->latest()->paginate(5);

        //render view with posts
        return view('posts.index', compact('posts'));
    }
   
    public function create(): View
    {
        $fak = Fakultas::all();
        return view('posts.create', compact('fak'));
    }
    
    public function store(Request $request): RedirectResponse 
    {
        $this->validate($request, [
            'kode_prodi'  => 'required|min:5',
            'nama_prodi'  => 'required',
            'fakultas_id' => 'required'
        ]);

        ProgramStudi::create([
            'kode_prodi'  => $request->kode_prodi,
            'nama_prodi'  => $request->nama_prodi,
            'fakultas_id' => $request->fakultas_id
        ]);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan! horee!']);
    }

    public function edit($id): View
    {
        $fak = Fakultas::all();
        $post = ProgramStudi::findOrFail($id);
        return view('posts.edit', compact('post','fak'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'kode_prodi'  => 'required|min:5',
            'nama_prodi'  => 'required',
            'fakultas_id' => 'required'
        ]);

        $post = ProgramStudi::findOrFail($id);
        $post->update([
            'kode_prodi'  => $request->kode_prodi,
            'nama_prodi'  => $request->nama_prodi,
            'fakultas_id' => $request->fakultas_id
        ]);

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy($id): RedirectResponse
    {
        $post = ProgramStudi::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

