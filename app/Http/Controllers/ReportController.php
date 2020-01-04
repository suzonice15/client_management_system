<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Profession;
use App\Position;
use App\Type;
use Illuminate\Http\Request;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notification()
    {

        $data['main'] = 'Notifications';
        $data['active'] = 'View Notifications';
        date_default_timezone_set('Asia/Dhaka');
        $date=date('Y-m-d');
        $data['customers'] = DB::table('customers')->where('customer_view',0)->where('customer_remendar_date',$date)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();

        return view('customers.customers_notification', $data);
    }


    public function report()
    {
        $data['main'] = 'Customers';
        $data['active'] = 'Customers Report';
        $data['divisions'] = DB::table('divisions')->get();
        $data['professions'] = Profession::all();
        $data['positions'] = Position::all();
        $data['types'] = Type::all();

        $data['customers'] = DB::table('customers')->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();



        return view('customers.customers_report', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function notificationEdit($id){

        $data['main'] = 'Notifications';
        $data['active'] = 'Update Notifications';
        $data['title'] = 'Update Notifications registration form';
        $data['customer']=Customer::find($id);
        $data['divisions'] = DB::table('divisions')->get();
        $data['professions'] = DB::table('professions')->get();
        $data['positions'] = DB::table('positions')->get();
        $data['areas'] = DB::table('areas')->get();
        $data['types'] = DB::table('types')->get();
        return view('customers.customers_notification_edit', $data);

    }

    public function notificationView($id){

        $data['main'] = 'Notifications';
        $data['active'] = 'View Customer';
        $data['title'] = 'Customer profile page';
        $data['customer'] = DB::table('customers')->where('customers.customer_id', $id)
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->first();

        return view('customers.customers_view', $data)->with('customer',$data['customer']);

    }

    public function notificationUpdate(Request $request){

        $id=$request->customer_id;
     $data['customer_name']=$request->customer_name;
     $data['customer_remendar_date']=$request->customer_remendar_date;
     $data['customer_mobile']=$request->customer_mobile;
     $data['customer_mobile_two']=$request->customer_mobile_two;
     $data['customer_email']=$request->customer_email;
     $data['division_id']=$request->division_id;
     $data['area_id']=$request->area_id;
     $data['position_id']=$request->position_id;
     $data['profession_id']=$request->profession_id;
     $data['type_id']=$request->type_id;
     $data['customer_remark']=$request->customer_remark;
     $data['customer_address']=$request->customer_address;
     $data['customer_remendar_date']=$request->customer_remendar_date;
        //Customer::update($request->all())->where('customer_id',$id);
        Customer::where('customer_id',$id)->update($data);
       # DB::table('customers')->where('customer_id',$id)->updateOrInsert($data);

       return redirect('/customer/notification')->with('success','Notification Update Successfully');

    }
    public function notificationShow($id){
        $data['customer_view']=1;
        Customer::where('customer_id',$id)->update($data);
        return redirect('/customer/notification')->with('success','Notification View Successfully');

    }
    public function cominication(){
        $data['main'] = 'Customers';
        $data['active'] = 'View Comunicated Customer';


        $data['customers'] = DB::table('customers')->where('customer_view',1)->orderBy('customers.customer_id', 'DESC')
            ->leftJoin('positions', 'customers.position_id', '=', 'positions.position_id')
            ->leftJoin('professions', 'customers.profession_id', '=', 'professions.profession_id')
            ->join('divisions', 'customers.division_id', '=', 'divisions.division_id')
            ->join('areas', 'customers.area_id', '=', 'areas.area_id')
            ->leftJoin('types', 'customers.type_id', '=', 'types.type_id')
            ->select('customers.*', 'professions.profession_name', 'positions.position_name','types.type_name','divisions.division_name','areas.area_name')->get();

        return view('customers.customers_cominication', $data);

    }
}
