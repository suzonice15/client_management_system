<?php

namespace App\Http\Controllers;

use App\Cpanel;

use Illuminate\Http\Request;
use DB;

class CpanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Cpanels';
        $data['active'] = 'View Cpanels';
        $data['divisions'] = DB::table('divisions')->get();
        $data['cpanels'] = DB::table('cpanels')->orderBy('id', 'DESC')->get();       
        return view('cpanels.cpanels_index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Cpanels';
        $data['active'] = 'Add Cpanel';
        $data['title'] = 'Cpanel registration form';

        return view('cpanels.cpanels_create', $data);
    }


    public function store(Request $request)
    {


    
        $result = Cpanel::create($request->all());

        if ($result) {
            return redirect()->route('cpanels.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('cpanels.create')
                ->with('error', 'Some problem to insert data');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(Cpanel $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Cpanel $cpanel)
    {
        $data['main'] = 'Cpanels';
        $data['active'] = 'Update Cpanel';
        $data['title'] = 'Cpanel update registration form';
        return view('cpanels.cpanels_edit', $data, compact('cpanel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cpanel $cpanel)
    {

        $cpanel->update($request->all());


        return redirect()->route('cpanels.index')
            ->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cpanel $cpanel)
    {
        $cpanel->delete();
        return redirect()->route('cpanels.index')

            ->with('success','deleted successfully');
    }






}
