<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with([ 'tags', 'employer' ])
            ->latest()
            ->get()
            ->groupBy('featured');
        return view('jobs.index', [ 
            'featuredJobs' => $jobs[1], // '1' is the value of 'featured' column in the database
            'jobs'         => $jobs[0],
            'tags'         => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create', [ 
            'schedules' => Job::SCHEDULE,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $request['featured'] = $request->has('featured');

        $job = Auth::user()->employer->jobs()->create(
            Arr::except($request->all(), 'tags')
        );

        if ($request->tags) {
            foreach (explode(',', $request->tags) as $tag) {
                $job->tag($tag);
            }
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return $job->tags;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
