<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Repositories\TasksRepository;
use App\Http\Requests\CreateTask;
use App\Http\Requests\UpdateTask;

class TasksController extends Controller
{
    protected $repo;

    public function __construct(TasksRepository $repo){
        $this->repo = $repo;
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = $this->repo->todos();
        $dones = $this->repo->dones();
        $projects = request()->user()->projects()->pluck('name', 'id');
        return view('tasks.index', compact('todos', 'dones', 'projects'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(CreateTask $request)
    {
        $this->repo->create($request);
        
        return back();
    }

    
    public function show($id)
    {
        //
    }

    public function check($id){
        $this->repo->check($id);
        return back();
    }

    public function edit($id)
    {
        //
    }

    
    public function update(UpdateTask $request, $id)
    {
        $this->repo->update($request, $id);
        return back();
    }

    
    public function destroy($id)
    {
        $this->repo->destroy($id);
        return back();
    }
}
