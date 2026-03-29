<?php

namespace App\Controllers;

use PXP\Http\Controllers\Controller;
use App\Note;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes', ['notes' => Note::all()]);
    }

    public function show(string $uid)
    {
        return view('note', ['note' => Note::find($uid)]);
    }
}
