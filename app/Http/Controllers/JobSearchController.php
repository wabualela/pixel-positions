<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobSearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('jobs.results', [ 
            'jobs' => Job::query()
                ->with([ 'employer', 'tags' ])
                ->where('title', 'LIKE', '%' . $request->q . '%')
                ->get(),
        ]);
    }
}
