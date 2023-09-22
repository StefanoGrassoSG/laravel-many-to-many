<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\http\controllers\Controller;

//models
use App\Models\Project;
use App\Models\Type;


//requests
use App\http\Requests\Project\StoreProjectRequest;
use App\http\Requests\Project\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
       $formdata = $request->validated();

       $project = Project::create([
            'name' => $formdata['name'],
            'slug' => str()->slug($formdata['name']),
            'description' => $formdata['description'],
            'start_date' => $formdata['start_date'],
            'end_date' => $formdata['end_date'],
            'project_status' => $formdata['project_status'],
            'languages' => $formdata['languages'],
            'project_link' => $formdata['project_link'],
            'type_id' => $formdata['type_id']
       ]);

       return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {   
        $types = Type::all();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $formData = $request->validated();

        $project->update([
            'name' => $formData['name'],
            'slug' => str()->slug($formData['name']),
            'description' => $formData['description'],
            'start_date' => $formData['start_date'],
            'end_date' => $formData['end_date'],
            'project_status' => $formData['project_status'],
            'languages' => $formData['languages'],
            'project_link' => $formData['project_link'],
            'type_id' => $formData['type_id']
        ]);

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
