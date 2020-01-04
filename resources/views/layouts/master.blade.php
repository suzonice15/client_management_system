@include('layouts.includes.header')

@include('layouts.includes.sideber')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     <?php if(isset($main) ) {  echo $main ; }    ?>
        <small>Control panel</small>
      </h1>
       {{--<marquee class="btn btn-info">--}}
         {{----}}
      {{--</marquee>--}}
           <ol class="breadcrumb">
        <li><a href="{{ URL::to('/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">  <?php if(isset($active) ) {  echo $active ; }    ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if(Session::has('success'))
        <div class="callout callout-success">


            <p>
                {{ Session::get('success')}}

            </p>
        </div>
        @elseif(Session::has('error'))
            <div class="callout callout-danger">
                <h4>Error !</h4>

                <p>
                    {{ Session::get('error')}}

                </p>
            </div>
        @else
            <div class="callout callout-success">
                <marquee> <h4>Welcome To Isolutionsbd Project Management Software</h4>

                </marquee>
            </div>
        @endif

        <div class="box">

@yield('pageTitle')
        @yield('mainContent')
            <!-- /.box-footer-->
        </div>


    </section>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
@include('layouts.includes.footer')
