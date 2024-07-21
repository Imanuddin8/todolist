<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $todolist = Todolist::whereDate('tanggal', $today)->get();

        return view('todo.index', compact('todolist'));
    }

    public function selesai(Todolist $todolist, $id) {
        $todolist = Todolist::findOrFail($id);
        $todolist->status = true;
        $todolist->save();

        return redirect()->route('todo.index');
    }
}
