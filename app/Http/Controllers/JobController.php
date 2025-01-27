<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{

    public function index()
    {
        $jobs = Job::query()
                   ->filterJobsByTitleOrDescription(request('search'))
                   ->filterJobsByMinSalary(request('min_salary'))
                   ->filterJobsByMaxSalary(request('max_salary'))
                   ->filterJobsByExpierience(request('experience'))
                   ->filterJobsByCategory(request('category'));
   
        return view('jobs.index', ['jobs'=> $jobs->get()]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
