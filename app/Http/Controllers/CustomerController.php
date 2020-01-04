<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Profession;
use App\Position;
use App\Type;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main'] = 'Customers';
        $data['active'] = 'Customers';
        $data['divisions'] = DB::table('divisions')->get();
        $data['customers'] = DB::table('customers')->where('customer_status',0)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->leftJoin('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->leftJoin('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        $data['professions'] = Profession::all();
        $data['positions'] = Position::all();
        $data['types'] = Type::all();



        return view('customers.customers_index', $data);
    }

    public function report()
    {
        $data['main'] = 'Customers';
        $data['active'] = 'Customers';
        $data['divisions'] = DB::table('divisions')->get();
        $data['customers'] = DB::table('customers')->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        $data['professions'] = Profession::all();
        $data['positions'] = Position::all();
        $data['types'] = Type::all();



        return view('customers.customers_report', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main'] = 'Customers';
        $data['active'] = 'Add Customers';
        $data['title'] = 'Customer registration form';
        $data['divisions'] = DB::table('divisions')->get();
        $data['professions'] = DB::table('professions')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['types'] = DB::table('types')->get();

        return view('customers.customers_create', $data);
    }


    public function store(Request $request)
    {

        $result = Customer::create($request->all());
        if ($result) {
            return redirect()->route('customers.index')
                ->with('success', 'created successfully.');
        } else {
            return redirect()->route('customers.create')
                ->with('error', 'Some problem to insert data');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $data['main'] = 'Customers';
        $data['active'] = 'Update Customer';
        $data['title'] = 'Customer update registration form';
        $data['divisions'] = DB::table('divisions')->get();
        $data['professions'] = DB::table('professions')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['areas'] = DB::table('areas')->get();
        $data['types'] = DB::table('types')->get();
        return view('customers.customers_edit', $data, compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([

            'customer_name' => 'required',
            'division_id' => 'required',
        ]);


        $customer->update($request->all());


        return redirect()->route('customers.index')
            ->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')

            ->with('success','deleted successfully');
    }
    public function subAreaLoad(Request $request){
        $areas = DB::table("areas")
            ->where("devision_id",$request->devision_id)
            ->pluck("area_name","area_id");
        return response()->json($areas);

    }
    function check(Request $request)
    {
        if($request->get('email'))
        {
            $email = $request->get('email');
            $data = DB::table("customers")
                ->where('customer_email', $email)
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
    public  function phoneCheck(Request $request){

        if($request->get('mobile'))
        {
            $phone = $request->get('mobile');
            $data = DB::table("customers")
                ->where('customer_mobile', $phone)->where('customer_mobile_two', $phone)
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

    public function divisionDataLoad(Request $request){
        $division_id = $request->post('devision_id');
        $customers = DB::table('customers')->where('customers.division_id', '=', $division_id)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        return response()->json($customers);

    }
    public function areaDataLoad(Request $request){
        $division_id = $request->get('division_id');
        $area_id = $request->get('area_id');
        $customers = DB::table('customers')->where('customers.division_id', '=', $division_id)->where('customers.area_id', '=', $area_id)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        return response()->json($customers);

    }
    public function professorDataLoad(Request $request){
        $division_id = $request->get('division_id');
        $area_id = $request->get('area_id');
        $professor_id = $request->get('professor_id');
        $customers = DB::table('customers')->where('customers.division_id', '=', $division_id)->where('customers.area_id', '=', $area_id)->where('customers.profession_id', '=', $professor_id)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        return response()->json($customers);

    }
    public function positionDataLoad(Request $request){
        $division_id = $request->get('division_id');
        $area_id = $request->get('area_id');
        $professor_id = $request->get('professor_id');
        $position_id = $request->get('position_id');
        $customers = DB::table('customers')->where('customers.division_id', '=', $division_id)->where('customers.area_id', '=', $area_id)->where('customers.profession_id', '=', $professor_id)->where('customers.position_id', '=', $position_id)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        return response()->json($customers);

    }

    public function typeDataLoad(Request $request){
        $division_id = $request->get('division_id');
        $area_id = $request->get('area_id');
        $professor_id = $request->get('professor_id');
        $position_id = $request->get('position_id');
        $type_id = $request->get('type_id');
        $customers = DB::table('customers')->where('customers.division_id', '=', $division_id)->where('customers.area_id', '=', $area_id)->where('customers.profession_id', '=', $professor_id)->where('customers.position_id', '=', $position_id)->where('customers.type_id', '=', $type_id)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        return response()->json($customers);

    }

    public  function programers(){


        $data['main'] = 'Programers';
        $data['active'] = 'Programers';
        $data['divisions'] = DB::table('divisions')->get();
        $data['customers'] = DB::table('customers')->where('customer_status',2)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->leftJoin('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->leftJoin('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        $data['professions'] = Profession::all();
        $data['positions'] = Position::all();
        $data['types'] = Type::all();
        return view('customers.customers_index', $data);



    }

    public  function clients(){


        $data['main'] = 'Programers';
        $data['active'] = 'Programers';
        $data['divisions'] = DB::table('divisions')->get();
        $data['customers'] = DB::table('customers')->where('customer_status',1)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->leftJoin('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->leftJoin('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();
        $data['professions'] = Profession::all();
        $data['positions'] = Position::all();
        $data['types'] = Type::all();
        return view('customers.customers_index', $data);



    }


}
