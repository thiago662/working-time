<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\WorkDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\WorkDayRequest;

class WorkDayController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the page to list work days.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $date = $request->has('date') ? Carbon::parse($request->date) : Carbon::now();

        $workDays = WorkDay::query()
            ->withCount('checkpoints')
            ->where('user_id', Auth::user()->id)
            ->whereBetween('date', [$date->startOfMonth()->format('Y-m-d'), $date->endOfMonth()->format('Y-m-d')])
            ->orderBy('date', 'desc')
            ->get();

        return view('work-day.index', [
            'workDays' => $workDays,
            'date' => $date,
        ]);
    }

    /**
     * Show the page to create a new work day.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('work-day.create');
    }

    /**
     * Create a new work day.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WorkDayRequest $request)
    {
        $workDay = WorkDay::create([
            'user_id' => Auth::user()->id,
            'date' => Carbon::parse($request->date)->format('Y-m-d'),
        ]);

        return redirect()->route('work-day.show', ['id' => $workDay->id]);
    }

    /**
     * Show the page of the work day.
     * 
     * @param string $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show(string $id)
    {
        $workDay = WorkDay::with(['checkpoints' => function ($query) {
            $query->orderBy('checked_at', 'asc');
        }])->find($id);

        return view('work-day.show', compact('workDay'));
    }

    /**
     * Show the page to edit the work day.
     * 
     * @param string $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(string $id)
    {
        $workDay = WorkDay::find($id);

        return view('work-day.edit', compact('workDay'));
    }

    /**
     * Update the work day.
     * 
     * @param Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $workDay = WorkDay::find($id);

        $workDay->date = Carbon::parse($request->date)->format('Y-m-d');

        $workDay->save();

        return redirect()->route('work-day.show', ['id' => $id]);
    }

    /**
     * Delete the work day.
     * 
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $workDay = WorkDay::find($id);
        $workDay->delete();

        return str_contains(url()->previous(), 'work-day/') ? redirect()->route('work-day.index') : redirect()->to(url()->previous());
    }
}
