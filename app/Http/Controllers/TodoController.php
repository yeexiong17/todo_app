<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $monthCount;

    public function __construct()
    {
        $this->monthCount = Carbon::now()->month;
    }

    public function showToday()
    {
        return view('show', [
            'heading' => 'Today\'s Task',
            'todoData' => Todo::latest()->filter(['type' => 'today'])->get()
        ]);
    }

    public function showWeek()
    {
        return view('show', [
            'heading' => 'This Week\'s Task',
            'todoData' => Todo::latest()->filter(['type' => 'week'])->get()
        ]);
    }

    public function searchResult()
    {
        return view('show', [
            'heading' => 'Search Result',
            'todoData' => Todo::latest()->filter(request(['search']))->get()
        ]);
    }

    public function showMonth()
    {
        $now = Carbon::now();
        // dd($now->month);

        return view('month', [
            'countMonth' => $this->monthCount,
            'startDay' => $now->startOfMonth()->dayOfWeek,
            'countDay' => $now->daysInMonth,
            'dateToday' => $now->toDate()->format('Y-m-d'),
            'currentYear' => $now->year,
            'currentMonth' => $now->monthName,
            'numOfDays' => $now->daysInMonth(),
            'todoData' => Todo::latest()->filter(['type' => 'month', 'dateObject' => $now])->get()
        ]);
    }

    public function navigateMonth()
    {
        $now = Carbon::now();

        // dd($now->month((int) request('month'))->startOfMonth()->dayOfWeek);
        $this->monthCount = (int)request('monthCount');

        $chosenMonth = $now->month((int)request('monthCount'));

        // dd($chosenMonth->startOfMonth()->dayOfWeek);

        return view('month', [
            'countMonth' => $this->monthCount,
            'startDay' => $chosenMonth->startOfMonth()->dayOfWeek,
            'firstDayMonth' => $chosenMonth->firstOfMonth(),
            'countDay' => $chosenMonth->daysInMonth,
            'dateToday' => $chosenMonth->day,
            'currentYear' =>  $chosenMonth->year,
            'currentMonth' => $chosenMonth->monthName,
            'numOfDays' => $now->daysInMonth(),
            'todoData' => Todo::latest()->filter(['type' => 'month', 'dateObject' => $chosenMonth])->get()
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

        return back();
    }

    public function updateDone(Todo $todo)
    {
        $todo->update(['done' => 1]);

        return back();
    }

    public function updateUndone(Todo $todo)
    {
        $todo->update(['done' => 0]);

        return back();
    }

    public function delete(Todo $todo)
    {
        $todoDelete = Todo::find($todo->id);

        $todoDelete->delete();

        return back();
    }

    public function updateTodo(Request $request, Todo $todo)
    {
        $formfields = $request->validate([
            'title' => 'required|string|min:1',
            'description' => 'required|string|min:1',
            'datetime' => 'required'
        ]);

        $formfields['datetime'] =  str_replace('T', ' ', $request->datetime);

        $todo->update($formfields);

        return back();
    }
}
