
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
                <form action="{{ route('service.store') }}" class="form-horizontal"  method="post" enctype="multipart/form-data" >
                @csrf
       

	   @include('services.services_form')

</div>
<!-- /.box-body -->
<div class="box-footer">
    <a type="submit" class="btn btn-danger"  href="{{ route('service.index') }}">Cancel</a>
    <button type="submit" id="submit" class="btn btn-info pull-right">Save</button>
</div>


<!-- /.box-footer -->
</form>

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
                            $("#area_id").append('<option value="0">Select area</option>');
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
                                $('#error_email').html('<label class="text-success">Ok,Unique</label>');
                                $('#customer_email').removeClass('has-error');
                                $('#submit').attr('disabled', false);
                            }
                            else
                            {
                                $('#error_email').html('<label class="text-danger">Duplicated,Insert Unique Data </label>');
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
                             $('#error_phone').html('<label class="text-success">Ok,Unique</label>');
                             $('#customer_mobile').removeClass('has-error');
                             $('#submit').attr('disabled', false);
                         }
                         else
                         {
                             $('#error_phone').html('<label class="text-danger">Duplicated,Insert Unique Data </label>');

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

 <script>
     $(document).ready(function(){

         $('#customer_mobile_two').blur(function(){
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
                             $('#error_phone_two').html('<label class="text-success">Ok,Unique</label>');
                             $('#customer_mobile_two').removeClass('has-error');
                             $('#submit').attr('disabled', false);
                         }
                         else
                         {
                             $('#error_phone_two').html('<label class="text-danger">Duplicated,Insert Unique Data </label>');

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
                 $('#error_phone_two').html('<label class="text-danger">Invalid Phone Number</label>');
                 $('#customer_mobile_two').addClass('has-error');

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

