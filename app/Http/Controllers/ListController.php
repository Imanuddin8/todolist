<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use Carbon\Carbon;

class ListController extends Controller
{
    public function index() {
        $todolist = Todolist::orderBy('created_at', 'desc')->get();

        return view('list.index', compact('todolist'));
    }

    public function create() {
        return view('list.create');
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
        ]);

        // Buat entri baru di tabel todolists
        Todolist::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'status' => false,
        ]);

        // Redirect ke halaman index
        return redirect()->route('list.index');
    }

    public function edit($id) {
        $todolist = Todolist::findOrFail($id);

        return view ('list.edit', compact('todolist'));
    }

    public function update(Request $request, $id) {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $todolist = Todolist::findOrFail($id);

        $todolist->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'status' => $request->has('status') ? true : false
        ]);

        return redirect()->route('list.index');
    }

    public function delete($id) {
        $todolist = Todolist::findOrFail($id);

        $todolist->delete();

        return redirect()->route('list.index');
    }

    public function selesai(Todolist $todolist, $id) {
        $todolist = Todolist::findOrFail($id);
        $todolist->status = true;
        $todolist->save();

        return redirect()->route('list.index');
    }

    public function filter(Request $request) {
        $query = Todolist::query();

        if ($request->filled('cari')) {
            $query->where('judul', 'like', '%' . $request->input('cari') . '%');
        }

        if ($request->filled('awal')) {
            $query->whereDate('tanggal', '>=', $request->input('awal'));
        }

        if ($request->filled('akhir')) {
            $query->whereDate('tanggal', '<=', $request->input('akhir'));
        }

        $todolist = $query->get();

        return view('list.index', compact('todolist'));
    }
}
