<?php

namespace App\Http\Controllers;
use App;
use App\Paste;
use Illuminate\Http\Request;

class PasteController extends Controller
{
    public function index()
    {
        $all_paste = Paste::all();
        return view('paste/create', compact('all_paste'));
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $show_paste = Paste::find($id);
        return view('paste/show', compact('show_paste'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
