
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

        <form  name="customer" action="{{ url('/customers/notificationUpdate') }}" class="form-horizontal"  method="post" enctype="multipart/form-data" >
        @csrf
            <div class="form-group">
                <label class="col-sm-2 control-label">Name</label>

                <div class="col-sm-8">

           <input type="text" class="form-control" name="customer_name" placeholder="Name"
                           value="<?php if (isset($customer->customer_name)) : echo $customer->customer_name;endif ?>">

                    <input type="hidden" class="form-control" name="customer_id" placeholder="Name"
                           value="<?php if (isset($customer->customer_id)) : echo $customer->customer_id;endif ?>">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Mobile One</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" name="customer_mobile" id="customer_mobile" placeholder="Mobile"
                           value="<?php  if (isset($customer->customer_mobile)) : echo $customer->customer_mobile;endif ?>">
                    <span id="error_phone"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Mobile Two</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" name="customer_mobile_two" id="customer_mobile_two" placeholder="Mobile"
                           value="<?php  if (isset($customer->customer_mobile_two)) : echo $customer->customer_mobile_two;endif ?>">
                    <span id="error_phone_two"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Email</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" name="customer_email" id="customer_email" placeholder="Email"
                           value="<?php  if (isset($customer->customer_email)) : echo $customer->customer_email;endif ?>">
                    <span id="error_email"></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Divisions</label>
                <div class="col-sm-8">
                    <select name="division_id" id="devision_id" class="form-control select2">
                        <option value="">select division</option>
                        @foreach($divisions as $division)
                            <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Sub area</label>
                <div class="col-sm-8">
                    <select name="area_id" class="form-control select2" id="area_id">
                        <option> select division</option>
                        @if(isset($areas))
                            @foreach($areas as $area)
                                <option value="{{ $area->area_id }}">{{ $area->area_name }}</option>
                            @endforeach

                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Professions</label>
                <div class="col-sm-8">
                    <select name="profession_id" id="profession_id" class="form-control select2">
                        @foreach($professions as $profession)
                            <option value="{{ $profession->profession_id }}">{{ $profession->profession_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Positions</label>
                <div class="col-sm-8">
                    <select name="position_id" class="form-control select2" id="sel1">
                        @foreach($positions as $position)
                            <option value="{{ $position->position_id }}">{{ $position->position_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Types</label>
                <div class="col-sm-8">
                    <select name="type_id" class="form-control select2" id="sel1">
                        @foreach($types as $type)
                            <option value="{{ $type->type_id }}">{{ $type->type_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Address</label>

                <div class="col-sm-8">
            <textarea rows="4" cols="50" name="customer_address" class="form-control">
                <?php  if (isset($customer->customer_address)) : echo trim($customer->customer_address);endif ?>
            </textarea>
                </div>

            </div>



            <div class="form-group">
                <label class="col-sm-2 control-label">Remark</label>

                <div class="col-sm-8">
            <textarea rows="4" cols="50" name="customer_remark" class="form-control">
                <?php  if (isset($customer->customer_remark)) : echo trim($customer->customer_remark);endif ?>
            </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Communication Date:</label>
                <div class="col-sm-8">

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="customer_remendar_date" data-date-format='yyyy-mm-dd' value="{{ $customer->customer_remendar_date }}" class="form-control pull-right" id="datepicker">
                    </div>
                </div>
                <!-- /.input group -->
            </div>


    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <a type="submit" class="btn btn-danger"  href="{{ url('/customer/notification') }}">Cancel</a>
        <button type="submit" class="btn btn-info pull-right">Update</button>
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

