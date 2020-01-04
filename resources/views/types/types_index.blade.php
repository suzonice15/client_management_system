
@extends('layouts.master')
@section('pageTitle')
    <div class="box-header with-border">
        <h3 class="box-title"><?php if(isset($title) ) {  echo $title; }    ?>  </h3>
        <a href="{{ route('types.create') }}" class="btn btn-success pull-right"> Add New </a>
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
            @if(isset($types))
                @foreach( $types as $type)
            <tr>
                <td>{{ ++$i }}</td>
              
                <td>{{$type->type_name}}</td>

                <td>{{ date('d-m-Y',strtotime($type->created_at)) }}</td>

                <td>
                    <form action="{{ route('types.destroy',$type->type_id) }}" method="POST">
                        @csrf

                        @method('DELETE')


                        <a href="{{ route('types.edit',$type->type_id) }}"> <span class="glyphicon glyphicon-edit btn btn-success"></span></a>
                        <input type="submit" class="btn btn-danger" value="Delete">
                            {{--<span class="glyphicon glyphicon-trash btn btn-danger"></span>--}}
                    </input>




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
