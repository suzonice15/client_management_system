
<?php
$date=date('Y-m-d');

$customers=DB::table('customers')->where('customer_status',0)->count();
$clients=DB::table('customers')->where('customer_status',1)->count();
$programers=DB::table('customers')->where('customer_status',2)->count();
$notification=DB::table('customers')->where('customer_remendar_date',$date)->where('customer_view',0)->count();
$viewnotification=DB::table('customers')->where('customer_view',1)->count();
;
?>
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{asset('public/admin/')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>   {{ Session::get('name') }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>




    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li >
            <a href="{{ route('users.index')}}">
                <i class="fa fa-th"></i> <span>Users</span>

            </a>
        </li>
        <li >
            <a href="{{ route('positions.index')}}">
                <i class="fa fa-th"></i> <span>Positions</span>

            </a>
        </li>


        <li >
            <a href="{{ route('serviceCatogory.index')}}">
                <i class="fa fa-th"></i> <span>Service Category</span>

            </a>
        </li>

        <li >
            <a href="{{ route('proffesions.index')}}">
                <i class="fa fa-th"></i> <span>Professions</span>

            </a>
        </li>
        <li >
            <a href="{{ route('types.index')}}">
                <i class="fa fa-th"></i> <span>Types</span>

            </a>
        </li>
        <li >
            <a href="{{ route('areas.index')}}">
                <i class="fa fa-th"></i> <span>Areas</span>

            </a>
        </li>
        <li >
            <a href="{{ route('service.index')}}">
                <i class="fa fa-th"></i> <span>Service list</span>

                <span class="count pull-right" style="width:22px;height:22px;background:green;color:#fff;text-align:center;border-radius:50%;font-size:12px;">{{$clients}}</span>


            </a>
        </li>
        <li >
            <a href="{{ route('customers.index')}}">
                <i class="fa fa-th"></i> <span>Custormers list</span>

                <span class="count pull-right" style="width:22px;height:22px;background:green;color:#fff;text-align:center;border-radius:50%;font-size:12px;">{{$customers}}</span>


            </a>
        </li>
        <li >
            <a href="{{ route('cpanel.index')}}">
                <i class="fa fa-th"></i> <span>Cpanels list</span>

                <span class="count pull-right" style="width:22px;height:22px;background:green;color:#fff;text-align:center;border-radius:50%;font-size:12px;">{{$customers}}</span>


            </a>
        </li>
        <li >
            <a href="{{ url('customer/clients')}}">
                <i class="fa fa-th"></i> <span>Clients list</span>

                <span class="count pull-right" style="width:22px;height:22px;background:green;color:#fff;text-align:center;border-radius:50%;font-size:12px;">{{$clients}}</span>


            </a>
        </li>
        <li >
            <a href="{{ url('customer/programers')}}">
                <i class="fa fa-th"></i> <span>Programers list</span>

                <span class="count pull-right" style="width:22px;height:22px;background:green;color:#fff;text-align:center;border-radius:50%;font-size:12px;">{{$programers}}</span>


            </a>
        </li>
        <li >
            <a href="{{ url('customer/report')}}">
                <i class="fa fa-th"></i> <span>Custormers Report</span>

            </a>
        </li>
        <li >
            <a href="{{ url('customer/notification')}}">
                <i class="fa fa-th"></i> <span>Notifications Report</span>
                {{--<span style="width: 30px;height: 18px;border-radius: 4px;" class="label label-success pull-right">{{$notification}}</span>--}}
                <span class="count pull-right" style="width:22px;height:22px;background:green;color:#fff;text-align:center;border-radius:50%;font-size:12px;">{{$notification}}</span>

            </a>
        </li>
        <li >
            <a href="{{ url('customer/cominication')}}">
                <i class="fa fa-th"></i> <span>Comunicated Customers</span>

                <span class="count pull-right" style="width:22px;height:22px;background:green;color:#fff;text-align:center;border-radius:50%;font-size:12px;">{{$viewnotification}}</span>

            </a>
        </li>
        <li >
            <a href="">
                <i class="fa fa-th"></i> <span>Setting</span>


            </a>
        </li>


    </ul>
</section>
<!-- /.sidebar -->
</aside>
