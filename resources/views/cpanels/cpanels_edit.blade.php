
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

            <form   action="{{ route('cpanel.update',$cpanel->id) }}" class="form-horizontal"  method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

        @include('cpanels.cpanels_form')

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a type="submit" class="btn btn-danger"  href="{{ route('cpanel.index') }}">Cancel</a>
        <button type="submit" class="btn btn-info pull-right">Save</button>
    </div>

    </form>




@endsection

