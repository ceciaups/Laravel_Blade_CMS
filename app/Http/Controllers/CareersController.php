<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\CareerType;

class CareersController extends Controller
{
    public function list()
    {
        return view('careers.list', [
            'careers' => Career::all(),
            'testing' => "testing"
        ]);
    }

    public function addForm()
    {
        return view('careers.add', [
            'career_types' => CareerType::all(),
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
        ]);

        $career = new Career();
        $career->career = $attributes['career'];
        $career->location = $attributes['location'];
        $career->start_date = $attributes['start_date'];
        $career->end_date = $attributes['end_date'];
        $career->career_type_id = $attributes['career_type_id'];
        $career->save();

        return redirect('/console/careers/list')
            ->with('message', 'Career has been added!');
    }

    public function editForm(Career $career)
    {
        return view('careers.edit', [
            'career' => $career,
            'career_types' => CareerType::all(),
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
        ]);

        $career->career = $attributes['career'];
        $career->location = $attributes['location'];
        $career->start_date = $attributes['start_date'];
        $career->end_date = $attributes['end_date'];
        $career->career_type_id = $attributes['career_type_id'];
        $career->save();

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
}
