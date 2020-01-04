<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Positions';
        $data['active'] = 'Positions';
        $data['positions'] = Position::all();

        return view('positions.positions_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Positions';
        $data['active'] = 'Add Position';
        $data['title'] = 'Position registration form';

        return view('positions.positions_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'position_name' => 'required',


        ]);


        $result = Position::create($request->all());
        if ($result) {
            return redirect()->route('positions.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('positions.create')
                ->with('error', 'Some things to insert data');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Position $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Position $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $data['main'] = 'Positions';
        $data['active'] = 'Update Position';
        $data['title'] = 'Position update registration form';
        return view('positions.positions_edit', $data, compact('position'));
    }


    public function update(Request $request, Position $position)
    {
        $request->validate([

            'position_name' => 'required',


        ]);


        $position->update($request->all());


        return redirect()->route('positions.index')
            ->with('success', 'updated successfully');
    }


    public function destroy(Position $position)
    {
        $position->delete();



        return redirect()->route('positions.index')

            ->with('success','deleted successfully');
    }
    function check(Request $request)
    {
        if($request->get('position'))
        {
            $email = $request->get('position');
            $data = DB::table("positions")
                ->where('position_name', $email)
                ->count();
            if($data > 0)
            {
                echo 'not_unique';
            }
            else
            {
                echo 'unique';
            }
        }
    }

}
