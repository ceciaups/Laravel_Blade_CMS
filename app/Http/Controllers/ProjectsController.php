<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Project;
use App\Models\Skill;

class ProjectsController extends Controller
{

    public function list()
    {
        return view('projects.list', [
            'projects' => Project::all()->where('user_id', Auth::user()->id),
        ]);
    }

    public function addForm()
    {
        return view('projects.add', [
            'skills' => Skill::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'nullable|url',
            'github' => 'nullable|url',
            'content' => 'required',
            'skills' => 'nullable',
        ]);

        $project = new Project();
        $project->title = $attributes['title'];
        $project->slug = str_replace(" ", "-", strtolower($attributes['title']));
        $project->url = $attributes['url'];
        $project->github = $attributes['github'];
        $project->content = $attributes['content'];
        $project->user_id = Auth::user()->id;
        $project->save();

        $project->skills()->attach($attributes['skills']);

        return redirect('/console/projects/list')
            ->with('message', 'Project has been added!');
    }

    public function editForm(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'skills' => Skill::all(),
        ]);
    }

    public function edit(Project $project)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'url' => 'nullable|url',
            'github' => 'nullable|url',
            'content' => 'required',
            'skills' => 'nullable',
        ]);

        $project->title = $attributes['title'];
        $project->slug = str_replace(" ", "-", strtolower($attributes['title']));
        $project->url = $attributes['url'];
        $project->github = $attributes['github'];
        $project->content = $attributes['content'];
        $project->save();

        $project->skills()->detach();
        $project->skills()->attach($attributes['skills']);

        return redirect('/console/projects/list')
            ->with('message', 'Project has been edited!');
    }

    public function delete(Project $project)
    {

        if($project->image)
        {
            Storage::delete($project->image);
        }
        
        $project->skills()->detach();
        $project->delete();
        
        return redirect('/console/projects/list')
            ->with('message', 'Project has been deleted!');        
    }

    public function imageForm(Project $project)
    {
        return view('projects.image', [
            'project' => $project,
        ]);
    }

    public function image(Project $project)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($project->image)
        {
            Storage::delete($project->image);
        }
        
        $path = request()->file('image')->store('projects');

        $project->image = $path;
        $project->save();
        
        return redirect('/console/projects/list')
            ->with('message', 'Project image has been edited!');
    }
    
}
