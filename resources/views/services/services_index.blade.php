
@extends('layouts.master')
@section('pageTitle')
<div class="box-header with-border">
    <h3 class="box-title"><?php if(isset($title) ) {  echo $title; }    ?>  </h3>
    <a href="{{ route('service.create') }}" class="btn btn-success pull-right"> Add New </a>
</div>
    @endsection
@section('mainContent')

    <div class="row">
        <div class="col-md-1">
            {{ csrf_field() }}
        </div>

        <div class="col-md-2">

        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-2">
           
        </div>

    </div>
    <div class="box-body table-responsive">
        <table id="datatable" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Domain</th>
                <th>Hosting</th>
                <th>Service</th>
                <th>Price</th>
                <th>Created date</th>
                <th>Renue Date</th>
                {{--<th id="hideHeading">Action</th>--}}
            </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @if(isset($services))
                @foreach( $services as $service)
            <tr>
                <td>{{ ++$i }}</td>

                <td>{{$service->service_status}}</td>
                <td>{{$service->service_domain_name}}</td>
                <td>{{$service->service_hosting_space}}</td>
                <td>{{$service->service_category_name}}</td>
                <td>{{$service->service_present_price}}</td>
                <td>{{$service->service_start_date}}</td>
                <td>{{$service->service_end_date}}</td>



                {{--<td>--}}

                    {{--<form action="{{ route('customers.destroy',$service->customer_id) }}" method="POST">--}}
                        {{--@csrf--}}
                        {{--@method('DELETE')--}}
                        {{--<a  target="_blank" href="{{ url('/customers/notificationView/'.$service->customer_id) }}"> <span class="glyphicon glyphicon-user btn btn-info"></span></a>--}}
                        {{--<a href="{{ route('customers.edit',$service->customer_id) }}"> <span class="glyphicon glyphicon-edit btn btn-success"></span></a>--}}
                        {{--<input type="submit" class="btn btn-danger" value="Delete">--}}
                    {{--</form>--}}

                {{--</td>--}}
            </tr>
@endforeach
                @endif


            </tbody>
        </table>

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
    <script type="text/javascript">
        function divisionDataLoad($value){
            var division_id = $value;
            $('#hideHeading').hide();
            if(division_id){
                $.ajax({
                    type:"get",
                    url: "{{url('get-division-list')}}?devision_id="+division_id,
                     success: function (results) {
                        var str = "";
                        var str1 = "";
                        $.each(results, function (key, result) {
                           key= key+1;
                            str = '<tr>' +
                                '<td>'+key+'</td>' +
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td><td>' + result['customer_remark'] + '</td>'+
                                '</tr>';
                            str1 = str1 + str;
                        });
                        $("#datatable tbody").empty();
                        $("#datatable tbody").append(str1);
                    }
                });
            }else{
                window.location.href = "{{ route('customers.index') }}";

            }
        }

        function areaDataLoad($value){
            var area_id = $value;
           var  division_id=$('#devision_id').val();
            var _token = $('input[name="_token"]').val();
            if(division_id){
                $.ajax({
                    url:"{{ route('customers.areaData') }}",
                    method:"POST",
                    data:{area_id:area_id, division_id:division_id, _token:_token},
                    success: function (results) {
                        var str = "";
                        var str1 = "";
                        $.each(results, function (key, result) {
                            key= key+1;
                            str = '<tr>' +
                                '<td>'+key+'</td>' +
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td><td>' + result['customer_remark'] + '</td>'+
                                '</tr>';
                            str1 = str1 + str;
                        });
                        $("#datatable tbody").empty();
                        $("#datatable tbody").append(str1);
                    }
                });
            }else{
                $("#area_id").empty();

            }
        }

        function professorDataLoad($value){
            var professor_id = $value;
            var  division_id=$('#devision_id').val();
            var  area_id=$('#area_id').val();
            var _token = $('input[name="_token"]').val();
            if(division_id){
                $.ajax({
                    url:"{{ route('customers.professor') }}",
                    method:"POST",
                    data:{area_id:area_id, division_id:division_id,professor_id:professor_id, _token:_token},
                    success: function (results) {
                        var str = "";
                        var str1 = "";
                        $.each(results, function (key, result) {
                            key= key+1;
                            str = '<tr>' +
                                '<td>'+key+'</td>' +
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td><td>' + result['customer_remark'] + '</td>'+
                                '</tr>';
                            str1 = str1 + str;
                        });
                        $("#datatable tbody").empty();
                        $("#datatable tbody").append(str1);
                    }
                });
            }else{
                $("#area_id").empty();

            }
        }


        function positionDataLoad($value){
            var position_id = $value;
            var  division_id=$('#devision_id').val();
            var  area_id=$('#area_id').val();
            var  profession_id=$('#profession_id').val();
            var _token = $('input[name="_token"]').val();
            if(division_id){
                $.ajax({
                    url:"{{ route('customers.position') }}",
                    method:"POST",
                    data:{area_id:area_id, division_id:division_id,professor_id:profession_id,position_id:position_id, _token:_token},
                    success: function (results) {
                        var str = "";
                        var str1 = "";
                        $.each(results, function (key, result) {
                            key= key+1;
                            str = '<tr>' +
                                '<td>'+key+'</td>' +
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td><td>' + result['customer_remark'] + '</td>'+
                                '</tr>';
                            str1 = str1 + str;
                        });
                        $("#datatable tbody").empty();
                        $("#datatable tbody").append(str1);
                    }
                });
            }else{
                $("#area_id").empty();

            }
        }

        function typeDataLoad($value){
            var type_id = $value;
            var  division_id=$('#devision_id').val();
            var  area_id=$('#area_id').val();
            var  profession_id=$('#profession_id').val();
            var  position_id=$('#position_id').val();
            var _token = $('input[name="_token"]').val();
            if(division_id){
                $.ajax({
                    url:"{{ route('customers.type') }}",
                    method:"POST",
                    data:{area_id:area_id, division_id:division_id,professor_id:profession_id,position_id:position_id,type_id:type_id, _token:_token},
                    success: function (results) {
                        var str = "";
                        var str1 = "";
                        $.each(results, function (key, result) {
                            key= key+1;
                            str = '<tr>' +
                                '<td>'+key+'</td>' +
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td><td>' + result['customer_remark'] + '</td>'+
                                '</tr>';
                            str1 = str1 + str;
                        });
                        $("#datatable tbody").empty();
                        $("#datatable tbody").append(str1);
                    }
                });
            }else{
                $("#area_id").empty();

            }
        }



    </script>

@endsection

