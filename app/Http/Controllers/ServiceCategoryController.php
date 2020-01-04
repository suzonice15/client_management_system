<?php

namespace App\Http\Controllers;

use App\ServiceCategory;
use Illuminate\Http\Request;
use DB;
class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Service Category';
        $data['active'] = 'View Service Category';
        $data['categorys'] = ServiceCategory::all();

        return view('servicesCategory.servicesCategory_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Service Category';
        $data['active'] = 'Add Service Category';
        $data['title'] = 'Service Category registration form';
        return view('servicesCategory.servicesCategory_create', $data);
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

            'service_category_name' => 'required',


        ]);


        $result = ServiceCategory::create($request->all());
        if ($result) {
            return redirect()->route('serviceCatogory.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('serviceCatogory.create')
                ->with('error', 'Some things to insert data');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($serviceCategory)


    {



        $serviceCategory= ServiceCategory::findOrFail($serviceCategory);

        $data['main'] = 'Positions';
        $data['active'] ='Update Position';
        $data['title'] ='Position update registration form';
        #return view('positions.positions_edit", $data);
        return view('servicesCategory.servicesCategory_edit', $data)->with('serviceCategory',$serviceCategory);
    }

    public function update(Request $request, ServiceCategory  $service)
    {
        $request->validate([

            'service_category_name' => 'required',


        ]);
        $data['service_category_name']=  $request->service_category_name;

        $service_category_id=  $request->service_category_id;


        $result =DB::table('service_categories')->where('service_category_id',$service_category_id)->update($data);


        return redirect()->route('serviceCatogory.index')
            ->with('success', 'updated successfully');
    }


    public function destroy($serviceCategory)
    {

        DB::table('service_categories')->where('service_category_id',$serviceCategory)->delete();
        return redirect()->route('serviceCatogory.index')
            ->with('success','deleted successfully');
    }
}
