<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Checkpoint;
use App\Models\WorkDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $workDay = WorkDay::query()
            ->with(['checkpoints' => function ($query) {
                $query->select('id', 'user_id', 'work_day_id', 'checked_at')->orderBy('checked_at', 'asc');
            }])
            ->where('user_id', Auth::user()->id)
            ->where('date', Carbon::now()->format('Y-m-d'))
            ->first();

        return view('home', compact('workDay'));
    }

    /**
     * Create a new work day.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $today = Carbon::now()->format('Y-m-d');
        $workDay = WorkDay::query()
            ->where('user_id', Auth::user()->id)
            ->where('date', $today)
            ->first();

        if (!$workDay) {
            $workDay = WorkDay::create([
                'user_id' => Auth::user()->id,
                'date' => $today,
            ]);
        }

        $checkpoint = Checkpoint::create([
            'checked_at' => Carbon::now(),
            'user_id' => Auth::user()->id,
            'work_day_id' => $workDay->id,
        ]);

        return redirect()->back();
    }
}
