
@extends('layouts.master')
@section('mainContent')

    <div class="box-body">
        @if (count($errors) > 0)

            <div class="alert alert-danger ">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

            <form action="<?php echo  route('proffesions.update',$profession->profession_id) ?>" class="form-horizontal"  method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

        @include('proffesions.proffesions_form')

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a  class="btn btn-danger"  href="{{ route('proffesions.index') }}">Cancel</a>
        <button type="submit" class="btn btn-info pull-right">Update</button>
    </div>


    <!-- /.box-footer -->
    </form>
@endsection

