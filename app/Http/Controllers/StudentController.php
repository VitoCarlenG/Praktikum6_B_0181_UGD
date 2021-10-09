<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Mail;
use App\Mail\StudentMail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('created_at', 'DESC')->get();
        $students = Student::orderBy('updated_at', 'DESC')->get();

        return view('studentCRUD.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studentCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_depan' => 'required|max:15',
            'nama_belakang' => 'required|max:15',
            'email' => 'required|email|unique:students,email',
            'no_telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);
        Student::create($request->all());
        
        return redirect()->route('students.index')->with('success','Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students=Student::find($id);

        return view('studentCRUD.show',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students=Student::find($id);

        return view('studentCRUD.edit',compact('students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_depan' => 'required|max:15',
            'nama_belakang' => 'required|max:15',
            'email' => 'required|email|unique:students,email,'.$id,
            'no_telp' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:13',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        Student::find($id)->update($request->all());

        return redirect()->route('students.index')->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();

        return redirect()->route('students.index')->with('success','Item deleted successfully');
    }
}
