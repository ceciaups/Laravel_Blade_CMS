<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CareerType;

class CareerTypesController extends Controller
{
    public function list()
    {
        return view('career_types.list', [
            'career_types' => CareerType::all()
        ]);
    }

    public function addForm()
    {
        return view('career_types.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'career_type' => 'required'            
        ]);

        $career_type = new CareerType();
        $career_type->career_type = $attributes['career_type'];
        $career_type->save();

        return redirect('/console/career_types/list')
            ->with('message', 'Career Type has been added!');
    }

    public function editForm(CareerType $career_type)
    {
        return view('career_types.edit', [
            'career_type' => $career_type,
        ]);
    }

    public function edit(CareerType $career_type)
    {

        $attributes = request()->validate([
            'career_type' => 'required'
        ]);

        $career_type->career_type = $attributes['career_type'];
        $career_type->save();

        return redirect('/console/career_types/list')
            ->with('message', 'Career Type has been edited!');
    }

    public function delete(CareerType $career_type)
    {

        if($career_type->image)
        {
            Storage::delete($career_type->image);
        }
        
        $career_type->delete();
        
        return redirect('/console/career_types/list')
            ->with('message', 'Career Type has been deleted!');        
    }
}
