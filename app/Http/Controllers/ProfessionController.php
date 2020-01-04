<?php

namespace App\Http\Controllers;

use App\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{

    public function index()
    {
        $data['main'] = 'Professions';
        $data['active'] = 'Professions';
        $data['professions'] = Profession::all();
        return view('proffesions.proffesions_index', $data);
    }

    public function create()
    {
        $data['main'] = 'Professions';
        $data['active'] = 'Add Profession';
        $data['title'] = 'Profession registration form';
        return view('proffesions.proffesions_create', $data);
    }


    public function store(Request $request)
    {
        $request->validate([

            'profession_name' => 'required',


        ]);
        $result = Profession::create($request->all());
        if ($result) {
            return redirect()->route('proffesions.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('proffesions.create')
                ->with('error', 'Some problem to insert data');
        }


    }


    public function show(Profession $Profession)
    {
        //
    }


    public function edit($id)
    {
        $data['main'] = 'Professions';
        $data['active'] = 'Update Profession';
        $data['title'] = 'Profession update registration form';
       $profession= Profession::find($id);

        return view('proffesions.proffesions_edit', $data, compact('profession'));
    }


    public function update(Request $request,$id)
    {
        $request->validate([
            'profession_name' => 'required',
        ]);
       $profesion= Profession::find($id);
        $profesion->profession_name=$request->profession_name;
        $profesion->save();

//        $profession->update($request->all());

        return redirect()->route('proffesions.index')
            ->with('success', 'updated successfully');
    }


    public function destroy( $profession)
    {
        $contact = Profession::find($profession);
        $contact->delete();



        return redirect()->route('proffesions.index')

            ->with('success','deleted successfully');
    }

}
