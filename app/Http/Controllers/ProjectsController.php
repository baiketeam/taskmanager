<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectsRepository;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;

class ProjectsController extends Controller
{
    protected $repo;

    public function __construct(ProjectsRepository $repo){
        $this->repo = $repo;
        $this->middleware('auth');
    }

    // 增（create）
    public function create(){
        // show create form view
    }

    public function store(CreateProjectRequest $request)
    {
        $this->repo->create($request);
        return back();
    }

    // 删(delete)
    public function destroy($id)
    {
        $this->repo->delete($id);
        return back();
    }

    // 改（update）
    public function edit()
    {
        // show edit form view
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $this->repo->update($request, $id);
        return back();
    }

    // 查(show\read)
    public function index()
    {
        $projects = $this->repo->list();
        return view('welcome', compact('projects'));
    }

    public function show(Project $project){
        // $project = $this->repo->find($id);
        $todos = $this->repo->todos($project);
        $dones = $this->repo->dones($project);
        $projects = request()->user()->projects()->pluck('name','id');
        return view('projects.show',compact('project','todos', 'dones','projects'));
    }
    
}
