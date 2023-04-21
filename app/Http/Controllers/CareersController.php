<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Career;
use App\Models\Skill;
use App\Models\CareerType;

class CareersController extends Controller
{
    public function list()
    {
        return view('careers.list', [
            'careers' => Career::all(),
        ]);
    }

    public function addForm()
    {
        return view('careers.add', [
            'career_types' => CareerType::all(),
            'skills' => Skill::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'career' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'career_type_id' => 'required',
            'skills' => 'nullable'
        ]);

        $career = new Career();
        $career->career = $attributes['career'];
        $career->location = $attributes['location'];
        $career->start_date = $attributes['start_date'];
        $career->end_date = $attributes['end_date'];
        $career->career_type_id = $attributes['career_type_id'];
        $career->user_id = Auth::user()->id;
        $career->save();

        if (array_key_exists('skills', $attributes)) {
            $career->skills()->attach($attributes['skills']);    
        }

        return redirect('/console/careers/list')
            ->with('message', 'Career has been added!');
    }

    public function editForm(Career $career)
    {
        return view('careers.edit', [
            'career' => $career,
            'career_types' => CareerType::all(),
            'skills' => Skill::all()
        ]);
    }

    public function edit(Career $career)
    {

        $attributes = request()->validate([
            'career' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'nullable',
            'career_type_id' => 'required',
            'skills' => 'nullable'
        ]);

        $career->career = $attributes['career'];
        $career->location = $attributes['location'];
        $career->start_date = $attributes['start_date'];
        $career->end_date = $attributes['end_date'];
        $career->career_type_id = $attributes['career_type_id'];
        $career->save();

        $career->skills()->detach();
        if (array_key_exists('skills', $attributes)) {
            $career->skills()->attach($attributes['skills']);
        }

        return redirect('/console/careers/list')
            ->with('message', 'Career has been edited!');
    }

    public function delete(Career $career)
    {

        if($career->image)
        {
            Storage::delete($career->image);
        }
        
        $career->delete();
        
        return redirect('/console/careers/list')
            ->with('message', 'Career has been deleted!');        
    }

    public function imageForm(Career $career)
    {
        return view('careers.image', [
            'career' => $career,
        ]);
    }

    public function image(Career $career)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        if($career->image)
        {
            Storage::delete($career->image);
        }
        
        $path = request()->file('image')->store('careers');

        $career->image = $path;
        $career->save();
        
        return redirect('/console/careers/list')
            ->with('message', 'Career image has been edited!');
    }
}
