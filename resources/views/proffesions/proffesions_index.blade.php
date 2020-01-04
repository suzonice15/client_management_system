
@extends('layouts.master')
@section('pageTitle')
    <div class="box-header with-border">
        <h3 class="box-title"><?php if(isset($title) ) {  echo $title; }    ?>  </h3>
        <a href="{{ route('proffesions.create') }}" class="btn btn-success pull-right"> Add New </a>
    </div>
@endsection
@section('mainContent')

    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @if(isset($professions))
                @foreach( $professions as $profession)
            <tr>
                <td>{{ ++$i }}</td>
              
                <td>{{$profession->profession_name}}</td>

                <td>{{ date('d-m-Y',strtotime($profession->created_at)) }}</td>

                <td>
                    <form action="{{ route('proffesions.destroy',$profession->profession_id) }}" method="POST" >
                        @csrf
                        @method('DELETE')


                        <a href="{{ route('proffesions.edit',$profession->profession_id) }}"> <span class="glyphicon glyphicon-edit btn btn-success"></span></a>
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
