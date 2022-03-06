<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends ParentController
{
    public function index(){
        $course = Course::latest()->paginate(5);
        return view('pages\courses\course', compact('course'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('pages\courses\create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'course'=>'required',
            'fee'=>'required'
        ]);

        Course::create($request->all());

        return redirect()->route('course')
        ->with('success','Details Inserted Successfully!');
    }

    public function edit(Course $course,$id){
        return view('pages\courses\edit')->with('course',Course::find($id));
    }

    public function update(Request $request, $id){


        $data = Course::find($id);
        $data->name = $request->input('name');
        $data->course = $request->input('course');
        $data->fee = $request->input('fee');
        $data->save();

         return redirect()->route('course')
         ->with('success','Details Inserted Successfully!');

    }

    public function delete(Course $course,$id){
        $course->find($id)->delete();

        return redirect()->route('course')
        ->with('success','Updated Successfully');
    }

}
