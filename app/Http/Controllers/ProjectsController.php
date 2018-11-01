<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\ProjectsRepository; 

class ProjectsController extends Controller
{
    protected $repo;

    public function __construct(ProjectsRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->repo->create($request);
        return back();
    }
}
