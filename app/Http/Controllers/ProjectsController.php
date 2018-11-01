<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ProjectsRepository; 
use App\Http\Requests\ProjectRequest;

class ProjectsController extends Controller
{
    protected $repo;

    public function __construct(ProjectsRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }

    public function store(ProjectRequest $request)
    {
        // dd($request->all());
        $this->repo->create($request);
        return back();
    }

    public function index()
    {
        $projects = request()->user()->projects()->get();
        // dd($projects);
        // $projects = $this->repo->list();
        return view('welcome', compact('projects'));
    }
}
