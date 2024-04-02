<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function showToday()
    {
        return view('today', [
            'todayData' => Todo::latest()->filter(['type' => 'today'])->get()
        ]);
    }

    public function create(Request $request)
    {
        $formfields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'datetime' => 'required'
        ]);

        $formfields['datetime'] =  str_replace('T', ' ', $request->datetime);

        Todo::create($formfields);

        return redirect('/');
    }

    public function done(Request $request, Todo $todo)
    {
        $todo->update(['done' => true]);

        return back();
    }
}
