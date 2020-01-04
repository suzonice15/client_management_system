<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
//use Request;
use DB;
use App\Customer;
use App\ServiceCategory;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Services';
        $data['active'] = 'View Services';
        //$data['title'] = 'Customer Services registration form';

        $data['services'] = DB::table('services')
            ->LeftJoin('customers', 'customers.customer_id', '=', 'services.customer_id')
            ->LeftJoin('service_categories', 'service_categories.service_category_id', '=', 'services.service_name')->orderBy('service_id', 'desc')
            ->select('services.*', 'service_categories.*', 'customers.*')->get();

        return view('services.services_index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Services';
        $data['active'] = 'Add Services';
        $data['title'] = 'Customer Services registration form';
        $data['customers'] = Customer::where('customer_status',1)->get();
        $data['services'] = ServiceCategory::all();


        return view('services.services_create', $data);
    }


    public function store(Request $request)
    {

        $data=array();

$data['customer_id']=$request->input('customer_id');
$domain=$request->input('domain');
if(isset($domain)){

    $data['service_status']=$domain;
    $data['service_domain_name']=implode(' ',array_filter($request->input('service_domain_name')));
    $data['service_present_price']=implode(' ',array_filter($request->input('service_present_price')));
    $data['service_renue_price']=implode(' ',array_filter($request->input('service_renue_price')));
    $data['service_start_date']=implode(' ',array_filter($request->input('service_start_date')));
    $data['service_end_date']=implode(' ',array_filter($request->input('service_end_date')));
    $data['service_remark']=implode(' ',array_filter($request->input('service_remark')));
}
        $hosting=$request->input('hosting');
        if(isset($hosting)){

            $data['service_status']=$hosting;
            $data['service_hosting_space']=implode(' ',array_filter($request->input('service_hosting_space')));
            $data['service_present_price']=implode(' ',array_filter($request->input('service_present_price')));
            $data['service_renue_price']=implode(' ',array_filter($request->input('service_renue_price')));
            $data['service_start_date']=implode(' ',array_filter($request->input('service_start_date')));
            $data['service_end_date']=implode(' ',array_filter($request->input('service_end_date')));
            $data['service_remark']=implode(' ',array_filter($request->input('service_remark')));
        }


        $domain_hosting=$request->input('domain_hosting');
        if(isset($domain_hosting)){

            $data['service_status']=$domain_hosting;
            $data['service_domain_name']=implode(' ',array_filter($request->input('service_domain_name')));
            $data['service_hosting_space']=implode(' ',array_filter($request->input('service_hosting_space')));
            $data['service_present_price']=implode(' ',array_filter($request->input('service_present_price')));
            $data['service_renue_price']=implode(' ',array_filter($request->input('service_renue_price')));
            $data['service_start_date']=implode(' ',array_filter($request->input('service_start_date')));
            $data['service_end_date']=implode(' ',array_filter($request->input('service_end_date')));
            $data['service_remark']=implode(' ',array_filter($request->input('service_remark')));
        }
        $service=$request->input('service');
        if(isset($service)){

            $data['service_status']=$service;
            $data['service_name']=$request->input('service_name');
            $data['service_name_price']=($request->input('service_name_price'));
            $data['service_name_renue_price']=($request->input('service_name_renue_price'));
            $data['service_renue_start_date']=$request->input('service_renue_start_date');
            $data['service_renue_end_date']=$request->input('service_renue_end_date');
            $data['service_name_remark']=$request->input('service_name_remark');
        }

        $service_status=$domain.','.$hosting.','.$domain_hosting.','.$service;
        $chopString =preg_replace('/(.*?),/', '\1', $service_status);
        $data['service_status']=$chopString;

        $result = DB::table('services')->insert($data);
        if ($result) {
            return redirect()->route('service.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('service.create')
                ->with('error', 'Some things to insert data');
        }

    }


    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
