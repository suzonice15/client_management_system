
@extends('layouts.master')
@section('mainContent')

    <div class="box-body">
    <div class="col-md-offset-2 col-md-8">
<br/>
<br/>
<br/>

        <table class="table table-bordered col-md-6">

            <tr>
                <th>Name</th>
                <td>{{  $customer->customer_name }} </td>
            </tr>
            <tr>
                <th>Mobile </th>
                <td>{{  $customer->customer_mobile }} , {{  $customer->customer_mobile_two }}</td>
            </tr>
            <tr>
                <th>Email </th>
                <td>{{  $customer->customer_email }} </td>
            </tr>



            <tr>
                <th>Divisions </th>
                <td>{{  $customer->division_name }} </td>
            </tr>

            <tr>
                <th>Sub area </th>
                <td>{{  $customer->area_name }} </td>
            </tr>

            <tr>
                <th>Professions </th>
                <td>{{  $customer->profession_name }} </td>
            </tr>

            <tr>
                <th>Positions </th>
                <td>{{  $customer->position_name }} </td>
            </tr>

            <tr>
                <th>Types </th>
                <td>{{  $customer->type_name }} </td>
            </tr>

            <tr>
                <th>Address </th>
                <td>{{  $customer->customer_address }} </td>
            </tr>

            <tr>
                <th>Remark </th>
                <td>{{  $customer->customer_remark }} </td>
            </tr>

            <tr>
                <th>Communication Date </th>
                <td>{{  $customer->customer_remendar_date }} </td>
            </tr>
            <tr>
                <th></th>
                <td>    <a type="submit" class="btn btn-info pull-right"  href="{{ url('/customer/notification') }}">Back</a>
                </td>
            </tr>



        </table>
    </div>
    </div>
@endsection

