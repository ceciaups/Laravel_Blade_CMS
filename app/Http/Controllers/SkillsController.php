<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Skill;

class SkillsController extends Controller
{

    public function list()
    {
        return view('skills.list', [
            'skills' => Skill::all()
        ]);
    }

    public function addForm()
    {
        return view('skills.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $skill = new Skill();
        $skill->name = $attributes['name'];
        $skill->user_id = Auth::user()->id;
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been added!');
    }

    public function editForm(Skill $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
        ]);
    }

    public function edit(Skill $skill)
    {

        $attributes = request()->validate([
            'name' => 'required',
        ]);

        $skill->name = $attributes['name'];
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been edited!');
    }

    public function delete(Skill $skill)
    {

        if($skill->logo)
        {
            Storage::delete($skill->logo);
        }
        
        $skill->delete();
        
        return redirect('/console/skills/list')
            ->with('message', 'Skill has been deleted!');        
    }

    public function logoForm(Skill $skill)
    {
        return view('skills.logo', [
            'skill' => $skill,
        ]);
    }

    public function logo(Skill $skill)
    {

        $attributes = request()->validate([
            'logo' => 'required|image',
        ]);

        if($skill->logo)
        {
            Storage::delete($skill->logo);
        }
        
        $path = request()->file('logo')->store('skills');

        $skill->logo = $path;
        $skill->save();
        
        return redirect('/console/skills/list')
            ->with('message', 'Skill logo has been edited!');
    }
    
}
