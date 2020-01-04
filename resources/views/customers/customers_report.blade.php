
@extends('layouts.master')
@section('pageTitle')
    <div class="box-header with-border">
        <h3 class="box-title"><?php if(isset($title) ) {  echo $title; }    ?>  </h3>
        <a href="{{ route('customers.create') }}" class="btn btn-success pull-right"> Add New </a>
    </div>
@endsection
@section('mainContent')

    <div class="row">
        <div class="col-md-1">
            {{ csrf_field() }}
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label for="sel1">Division</label>



                <select required="" name="devision_id" id="devision_id" onchange="divisionDataLoad(this.value)" class="form-control select2 "  aria-hidden="true">
                    <option value="">select division</option>
                    @foreach($divisions as $division)
                        <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                    @endforeach



                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label >Sub area</label>

                <select name="area_id" class="form-control select2" onchange="areaDataLoad(this.value)" id="area_id">
                    <option> select division</option>

                </select>

            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="sel1">Professions</label>
                <select class="form-control select2" id="profession_id" onchange="professorDataLoad(this.value)">
                    <option value="">select profession</option>
                    @foreach($professions as $profession)
                        <option value="{{  $profession->profession_id }}">{{ $profession->profession_name  }}</option>

                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="sel1">Position</label>
                <select class="form-control select2" id="position_id" onchange="positionDataLoad(this.value)">
                    <option value="">select position</option>
                    @foreach($positions as $position)
                        <option value="{{  $position->position_id }}">{{ $position->position_name  }}</option>

                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="sel1">Type</label>
                <select class="form-control select2" id="type_id" onchange="typeDataLoad(this.value)">
                    <option value="">select type</option>
                    @foreach($types as $type)
                        <option value="{{  $type->type_id }}">{{ $type->type_name  }}</option>

                    @endforeach
                </select>
            </div>
        </div>

    </div>
    <div class="box-body table-responsive">
        <table id="datatable" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Divisions</th>
                <th>Area</th>
                <th>Address</th>
                <th>profession</th>
                <th>position</th>
                <th>type</th>



            </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @if(isset($customers))
                @foreach( $customers as $customer)
                    <tr>
                        <td>{{ ++$i }}</td>

                        <td>{{$customer->customer_name}}</td>

                        <td>{{$customer->customer_mobile}}
                            <br/>
                            {{$customer->customer_mobile_two}}</td>
                        <td>{{$customer->customer_email}}</td>
                        <td>{{$customer->division_name}}</td>
                        <td>{{$customer->area_name}}</td>
                        <td>{{$customer->customer_address}}</td>
                        <td>{{$customer->profession_name}}</td>
                        <td>{{$customer->position_name}}</td>
                        <td>{{$customer->type_name}}</td>

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
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td>'+
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
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td>'+
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
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td>'+
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
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td>'+
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
                                '<td >' + result['customer_name'] + '</td><td>' + result['customer_mobile'] + '</td><td>' + result['customer_email'] + '</td><td>' + result['division_name'] + '</td><td>' + result['area_name'] + '</td><td>' + result['customer_address'] + '</td><td>' + result['profession_name'] + '</td><td>' + result['position_name'] + '</td><td>' + result['type_name'] + '</td>'+
                                '</tr>';
                            str1 = str1 + str;
                        });
                        $("#datatable tbody").empty();
                        $("#datatable tbody").append(str1);
                    }
                });
            }else{
                $("#area_id").empty();            }
        }



    </script>

@endsection

