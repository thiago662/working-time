<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Checkpoint;
use App\Models\WorkDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckpointController extends Controller
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
     * Show the page to create a new work day.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('checkpoint.create', [
            'workDay' => WorkDay::query()->where('user_id', Auth::user()->id)->find($request->work_day_id),
        ]);
    }

    /**
     * Create a new work day.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $checkedAt = $request->has('date') && $request->has('time')
            ? Carbon::parse($request->date . ' ' . $request->time)
            : Carbon::now();

        $checkpoint = Checkpoint::create([
            'checked_at' => $checkedAt,
            'user_id' => Auth::user()->id,
            'work_day_id' => $request->work_day_id,
        ]);

        return str_contains(url()->previous(), 'work_day_id=') ? redirect()->route('work-day.show', ['id' => $checkpoint->work_day_id]) : redirect()->back();
    }

    /**
     * Delete the work day.
     * 
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        $workDay = Checkpoint::query()->where('user_id', Auth::user()->id)->find($id);
        $workDay->delete();

        return redirect()->back();
    }
}
