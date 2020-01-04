<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Professions';
        $data['active'] = 'Professions';
        $data['types'] = Type::all();
        return view('types.types_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Types';
        $data['active'] = 'Add type';
        $data['title'] = 'Types registration form';
        return view('types.types_create', $data);
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

            'type_name' => 'required',


        ]);
        $result = Type::create($request->all());
        if ($result) {
            return redirect()->route('types.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('types.create')
                ->with('error', 'Some problem to insert data');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $data['main'] = 'Types';
        $data['active'] = 'Update Types';
        $data['title'] = 'Types update registration form';
        #return view('Professions.Professions_edit", $data);
        return view('types.types_edit', $data, compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $request->validate([

            'type_name' => 'required',
        ]);
        $type->update($request->all());
        return redirect()->route('types.index')
            ->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {


        $type->delete();



        return redirect()->route('types.index')

            ->with('success','deleted successfully');
    }
    }
