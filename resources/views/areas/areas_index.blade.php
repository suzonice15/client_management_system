
@extends('layouts.master')
@section('pageTitle')
    <div class="box-header with-border">
        <h3 class="box-title"><?php if(isset($title) ) {  echo $title; }    ?>  </h3>
        <a href="{{ route('areas.create') }}" class="btn btn-success pull-right"> Add New </a>
    </div>
@endsection
@section('mainContent')

    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Area</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @if(isset($areas))
                @foreach( $areas as $area)
            <tr>
                <td>{{ ++$i }}</td>
              
                <td>{{$area->division_name}}</td>
                <td>{{$area->area_name}}</td>

              
                <td>
                    <form action="{{ route('areas.destroy',$area->area_id) }}" method="POST">
                        @csrf

                        @method('DELETE')


                        <a href="{{ route('areas.edit',$area->area_id) }}"> <span class="glyphicon glyphicon-edit btn btn-success"></span></a>
                        <input type="submit" class="btn btn-danger" value="Delete">

                    </form>


                </td>
            </tr>
@endforeach
                @endif


            </tbody>
        </table>




    </div>
    </form>
@endsection
