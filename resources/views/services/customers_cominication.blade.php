
@extends('layouts.master')
@section('pageTitle')
    <div class="box-header with-border">
        <h3 class="box-title"><?php if(isset($title) ) {  echo $title; }    ?>  </h3>
        <a href="{{ route('customers.create') }}" class="btn btn-success pull-right"> Add New </a>
    </div>
@endsection
@section('mainContent')


    <div class="box-body table-responsive">
        <table id="datatable" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Divisions</th>
                <th>Area</th>
                <th>Address</th>
                <th>profession</th>
                <th>position</th>
                <th>type</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @if(isset($customers))
                @foreach( $customers as $customer)
                    <tr>
                        <td>{{ ++$i }}</td>

                        <td>{{$customer->customer_name}}</td>

                        <td>{{$customer->customer_mobile}}
                            <br/>
                            {{$customer->customer_mobile_two}}</td>
                        <td>{{$customer->customer_email}}</td>
                        <td>{{$customer->division_name}}</td>
                        <td>{{$customer->area_name}}</td>
                        <td>{{$customer->customer_address}}</td>
                        <td>{{$customer->profession_name}}</td>
                        <td>{{$customer->position_name}}</td>
                        <td>{{$customer->type_name}}</td>
                        <td>
                        <a  target="_blank" href="{{ url('/customers/notificationView/'.$customer->customer_id) }}"> <span class="glyphicon glyphicon-user btn btn-info"></span></a>
                            <a href="{{ route('customers.edit',$customer->customer_id) }}"> <span class="glyphicon glyphicon-edit btn btn-success"></span></a>
                        </td>

                    </tr>
                @endforeach
            @else
                <h1 style="text-transform:capitalize">There are no customer to Communicate</h1>
            @endif


            </tbody>
        </table>

    </div>


    <!-- /.box-footer -->
    </form>


@endsection

