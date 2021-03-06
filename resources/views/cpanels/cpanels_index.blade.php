
@extends('layouts.master')
@section('pageTitle')
<div class="box-header with-border">
    <h3 class="box-title"><?php if(isset($title) ) {  echo $title; }    ?>  </h3>
    <a href="{{ route('cpanels.create') }}" class="btn btn-success pull-right"> Add New </a>
</div>
    @endsection
@section('mainContent')


    <div class="box-body table-responsive">
        <table id="datatable" class="table table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Sl</th>
                <th> Domain Name</th>
                <th> Cpanel Url </th>
                <th>User Name</th>
                <th>Password</th>
                <th>Created date</th>
                <th>Update date</th>
                <th id="hideHeading">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php $i=0;?>
            @if(isset($cpanels))
                @foreach($cpanels as $cpanel)
            <tr>
                <td>{{ ++$i }}</td>

                <td>{{$cpanel->cpanel_domain_name}}</td>
                <td> <p   onclick="copyToClipboard('copy_{{ $cpanel->id }}')">{{$cpanel->cpanel_url}}</p>

                    <input type="hidden" id="copy_{{ $cpanel->id }}" value="{{ $cpanel->cpanel_url }}">
                </td>

                <td>
                    <p  onclick="copyToClipboard('copy_user_{{ $cpanel->id }}')">  {{$cpanel->cpanel_user}}</p>
                    <input type="hidden" id="copy_user_{{ $cpanel->id }}" value="{{ $cpanel->cpanel_user }}">

                </td>
                <td><p   onclick="copyToClipboard('copy_password_{{ $cpanel->id }}')">{{$cpanel->cpanel_password}}</p>
                    <input type="hidden" id="copy_password_{{ $cpanel->id }}" value="{{ $cpanel->cpanel_password }}">

                </td>

                <td>{{$cpanel->created_at}}</td>
                <td>{{$cpanel->updated_at}}</td>

                <td>

                    <form action="{{ route('cpanels.destroy',$cpanel->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('cpanels.edit',$cpanel->id) }}"> <span class="glyphicon glyphicon-edit btn btn-success"></span></a>
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>

                </td>
            </tr>
@endforeach
                @endif


            </tbody>
        </table>

    </div>


    <!-- /.box-footer -->
    </form>
    <script type="text/javascript">


        function copyToClipboard(id) {


            document.getElementById(id).select();
            document.execCommand('copy');
        }

        $(document).on("click", "#cpanel_url", function(event){

            urlLink=$(this).text();
            alert(urlLink)
            urlLink.select();
            document.execCommand("copy");
        });

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

