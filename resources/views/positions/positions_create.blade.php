
@extends('layouts.master')
@section('mainContent')

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
       <form action="{{ route('positions.store') }}" class="form-horizontal"  method="post" enctype="multipart/form-data" >
                @csrf

	   @include('positions.positions_form')

</div>
<!-- /.box-body -->
<div class="box-footer">
    <a type="submit" class="btn btn-danger"  href="{{ route('positions.index') }}">Cancel</a>
    <button type="submit" class="btn btn-info pull-right">Save</button>
</div>


<!-- /.box-footer -->
</form>
    <script>
        $(document).ready(function(){

            $('#position_name').blur(function(){
                var error_position = '';
                var position = $('#position_name').val();
                var _token = $('input[name="_token"]').val();
                if(position.length>2) {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('position.check') }}",

                        data: {position: position, _token: _token},
                        success: function (result) {
                            if (result == 'unique') {
                                $('#error_position').html('<label class="text-success">Position Available</label>');
                                $('#position_name').removeClass('has-error');
                                $('#submit').attr('disabled', false);
                            } else {
                                $('#error_position').html('<label class="text-danger">This position exits</label>');
                                $('#position_name').addClass('has-error');
                                $('#submit').attr('disabled', 'disabled');
                            }
                        }
                    });
                } else{
                    alert('Enter the valid position length');
                }
               
            });

        });
    </script>
    @endsection
