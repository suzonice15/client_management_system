
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

            <form  name="customer" action="{{ route('customers.update',$customer->customer_id) }}" class="form-horizontal"  method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')

        @include('customers.customers_form')

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a type="submit" class="btn btn-danger"  href="{{ route('customers.index') }}">Cancel</a>
        <button type="submit" class="btn btn-info pull-right">Save</button>
    </div>

    </form>
    <script>

        document.forms['customer'].elements['devision_id'].value="{{ $customer->division_id }}";
        document.forms['customer'].elements['area_id'].value="{{ $customer->area_id }}";
        document.forms['customer'].elements['profession_id'].value="{{ $customer->profession_id }}";
        document.forms['customer'].elements['position_id'].value="{{ $customer->position_id }}";
        document.forms['customer'].elements['type_id'].value="{{ $customer->type_id }}";
    </script>

    <script type="text/javascript">
        $('#devision_id').change(function(){
            var devision_id = $(this).val();
            if(devision_id){
                $.ajax({
                    type:"GET",
                    url:"{{url('get-area-list')}}?devision_id="+devision_id,
                    success:function(res){
                        if(res){
                            $("#area_id").empty();
                            $("#area_id").append('<option>Select area</option>');
                            $.each(res,function(key,value){
                                $("#area_id").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#area_id").empty();
                        }
                    }
                });
            }else{
                $("#area_id").empty();

            }
        });



    </script>
    <script>
        $(document).ready(function(){

            $('#customer_email').blur(function(){
                var error_email = '';
                var email = $('#customer_email').val();
                var _token = $('input[name="_token"]').val();
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!filter.test(email))
                {
                    $('#error_email').html('<label class="text-danger">Invalid Email</label>');
                    $('#customer_email').addClass('has-error');
                    $('#submit').attr('disabled', 'disabled');
                }
                else
                {
                    $.ajax({
                        url:"{{ route('email_available.check') }}",
                        method:"POST",
                        data:{email:email, _token:_token},
                        success:function(result)
                        {
                            if(result == 'unique')
                            {
                                $('#error_email').html('<label class="text-success">Email Available</label>');
                                $('#customer_email').removeClass('has-error');
                                $('#submit').attr('disabled', false);
                            }
                            else
                            {
                                $('#error_email').html('<label class="text-danger">This email exits</label>');
                                $('#customer_email').addClass('has-error');
                                $('#submit').attr('disabled', 'disabled');
                            }
                        }
                    })
                }
            });

        });
    </script>

    <script>
        $(document).ready(function(){

            $('#customer_mobile').blur(function(){
                var error_email = '';
                var mobile = $(this).val();
                var _token = $('input[name="_token"]').val();

                if(phone_validate(mobile))
                {

                    $.ajax({
                        method:"post",
                        url:"{{ route('phone_available.phoneCheck') }}",
                        data:{mobile:mobile, _token:_token},
                        success:function(result)
                        {
                            if(result == 'unique')
                            {
                                $('#error_phone').html('<label class="text-success">Phone Available</label>');
                                $('#customer_mobile').removeClass('has-error');
                                $('#submit').attr('disabled', false);
                            }
                            else
                            {
                                $('#error_phone').html('<label class="text-danger">This Phone exits</label>');

                                $('#submit').attr('disabled', 'disabled');
                            }
                        },
                        error:function () {
                            alert('ffffff')
                        }

                    })
                }
                else
                {
                    $('#error_phone').html('<label class="text-danger">Invalid Phone Number</label>');
                    $('#customer_mobile').addClass('has-error');

                }
            });

        });
        function phone_validate(phno)
        {
            var regexPattern=new RegExp(/^[0-9-+]+$/);    // regular expression pattern
            return regexPattern.test(phno);
        }
    </script>

@endsection

