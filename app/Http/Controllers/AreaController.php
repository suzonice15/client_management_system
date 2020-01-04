<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use DB;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Area';
        $data['active'] = 'Area';
        $data['areas'] = Area::all();
        $data['areas'] = DB::table('areas')
            ->join('divisions', 'divisions.division_id', '=', 'areas.devision_id')
            ->select('areas.*', 'divisions.division_name')
            ->get();
        return view('areas.areas_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Area';
        $data['active'] = 'Add Area';
        $data['title'] = 'Area registration form';
        $data['divisions'] = DB::table('divisions')->get();
        return view('areas.areas_create', $data);
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

            'area_name' => 'required',
            'devision_id' => 'required',


        ]);
        $result = Area::create($request->all());
        if ($result) {
            return redirect()->route('areas.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('areas.create')
                ->with('error', 'Some problem to insert data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {

        $data['main'] = 'Areas';
        $data['active'] = 'Update Area';
        $data['title'] = 'Area update registration form';
        #return view('Areas.Areas_edit", $data);
        $data['divisions'] = DB::table('divisions')->get();
        return view('areas.areas_edit', $data, compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([

            'area_name' => 'required',
            'devision_id' => 'required',


        ]);

        $area->update($request->all());

        return redirect()->route('areas.index')
            ->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();



        return redirect()->route('areas.index')

            ->with('success','deleted successfully');
    }
}
