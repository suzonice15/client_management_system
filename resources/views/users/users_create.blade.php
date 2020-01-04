
@extends('layouts.master')
@section('mainContent')
 <style>
     .has-error{
       border-color: red;
     }
 </style>
    <div class="box-body">
        @if (count($errors) > 0)
            <div class=" alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                <ul>

                    @foreach ($errors->all() as $error)

                        <li style="list-style: none">{{ $error }}</li>

                    @endforeach

                </ul>
            </div>
        @endif
                <form action="{{ route('users.store') }}" class="form-horizontal"  method="post" enctype="multipart/form-data" >
                @csrf
       

	   @include('users.users_form')

</div>
<!-- /.box-body -->
<div class="box-footer">
    <a type="submit" class="btn btn-danger"  href="{{ route('users.index') }}">Cancel</a>
    <button type="submit" id="submit" class="btn btn-info pull-right">Save</button>
</div>


<!-- /.box-footer -->
</form>


@endsection

