<div class="form-group">
    <label class="col-sm-2 control-label">Clients Name</label>

    <div class="col-sm-8">


            <select class="form-control select2" name="customer_id">
              @foreach($customers as $customer)
                <option value="{{$customer->customer_id}}">{{ $customer->customer_name }} </option>
                  @endforeach
            </select>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Service Types</label>
    &nbsp;&nbsp;<input type="checkbox" id="domain" name="domain" value="domain">&nbsp; &nbsp;Domain&nbsp;&nbsp;
    <input type="checkbox" id="hosting" name="hosting" value="hosting">&nbsp; &nbsp; Hosting&nbsp;&nbsp;
    <input type="checkbox" id="domain_hosting"  name="domain_hosting" value="domain_hosting" >&nbsp; &nbsp; Domain & Hosting&nbsp;&nbsp;
    <input type="checkbox" id="service" name="service" value="service" >&nbsp; &nbsp; Services&nbsp;&nbsp;
</div>


<div  id="domain_checkbox" class="form-group ">
    <div  class="form-group">
        <label class="col-sm-2 control-label">Domain Name:</label>
        <div class="col-sm-8">
            <input  name="service_domain_name[]" type="text" class="form-control">
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Starting Date:</label>
        <div class="col-sm-8">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="service_start_date[]" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->service_start_date)) : echo trim($customer->service_start_date);endif ?> " class="form-control pull-right datepicker" id="">
            </div>
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Ending Date:</label>
        <div class="col-sm-8">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="service_end_date[]" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->service_end_date)) : echo trim($customer->service_end_date);endif ?> " class="form-control pull-right datepicker" id="">
            </div>
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Present Price:</label>
        <div class="col-sm-8">

          <input  name="service_present_price[]" type="text" class="form-control">
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Renue Price:</label>
        <div class="col-sm-8">

            <input type="text" name="service_renue_price[]" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Remark</label>

        <div class="col-sm-8">
            <textarea rows="5" cols="50" name="service_remark[]" class="form-control">
                <?php  if (isset($customer->service_remark)) : echo trim($customer->service_remark);endif ?>
            </textarea>
        </div>
    </div>

</div>

<div  id="hosting_checkbox" class="form-group ">
    <div  class="form-group">
        <label class="col-sm-2 control-label">Hosting Space:</label>
        <div class="col-sm-8">
            <input  name="service_hosting_space[]" type="text" class="form-control">
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Starting Date:</label>
        <div class="col-sm-8">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="service_start_date[]" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->service_start_date)) : echo trim($customer->service_start_date);endif ?> " class="form-control pull-right datepicker " id="">
            </div>
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Ending Date:</label>
        <div class="col-sm-8">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="service_end_date[]" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->service_end_date)) : echo trim($customer->service_end_date);endif ?> " class="form-control pull-right datepicker " id="datepicker">
            </div>
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Present Price:</label>
        <div class="col-sm-8">

            <input  name="service_present_price[]" type="text" class="form-control">
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Renue Price:</label>
        <div class="col-sm-8">

            <input type="text" name="service_renue_price[]" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Remark</label>

        <div class="col-sm-8">
            <textarea rows="5" cols="50" name="service_remark[]" class="form-control">
                <?php  if (isset($customer->service_remark)) : echo trim($customer->service_remark);endif ?>
            </textarea>
        </div>
    </div>

</div>

<div  id="domain_hosting_checkbox" class="form-group ">
    <div  class="form-group">
        <label class="col-sm-2 control-label">Domain Name:</label>
        <div class="col-sm-8">
            <input  name="service_domain_name[]" type="text" class="form-control">
        </div>
    </div>
    <div  class="form-group">
        <label class="col-sm-2 control-label">Hosting Space:</label>
        <div class="col-sm-8">
            <input  name="service_hosting_space[]" type="text" class="form-control">
        </div>
    </div>
    <div  class="form-group">
        <label class="col-sm-2 control-label">Starting Date:</label>
        <div class="col-sm-8">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="service_start_date[]" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->service_start_date)) : echo trim($customer->service_start_date);endif ?> " class="form-control pull-right datepicker" id="">
            </div>
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Ending Date:</label>
        <div class="col-sm-8">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="service_end_date[]" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->service_end_date)) : echo trim($customer->service_end_date);endif ?> " class="form-control pull-right datepicker" id="">
            </div>
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Present Price:</label>
        <div class="col-sm-8">

            <input  name="service_present_price[]" type="text" class="form-control">
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Renue Price:</label>
        <div class="col-sm-8">

            <input type="text" name="service_renue_price[]" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Remark</label>

        <div class="col-sm-8">
            <textarea rows="2" cols="50" name="service_remark[]" class="form-control">
                <?php  if (isset($customer->service_remark)) : echo trim($customer->service_remark);endif ?>
            </textarea>
        </div>
    </div>

</div>




<div  id="service_checkbox" class="form-group ">
    <div class="form-group">
        <label class="col-sm-2 control-label">Service Name</label>

        <div class="col-sm-8">


            <select class="form-control " name="service_name">
                @foreach($services as $service)
                    <option value="{{$service->service_category_id}}">{{ $service->service_category_name }} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div  class="form-group">
        <label class="col-sm-2 control-label">Starting Date:</label>
        <div class="col-sm-8">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="service_renue_start_date" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->service_renue_start_date)) : echo trim($customer->service_renue_start_date);endif ?> " class="form-control pull-right datepicker" id="">
            </div>
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Ending Date:</label>
        <div class="col-sm-8">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" name="service_renue_end_date" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->service_renue_end_date)) : echo trim($customer->service_renue_end_date);endif ?> " class="form-control pull-right datepicker" id="">
            </div>
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Present Price:</label>
        <div class="col-sm-8">

            <input  name="service_name_price" type="text" class="form-control">
        </div>
    </div>

    <div  class="form-group">
        <label class="col-sm-2 control-label">Renue Price:</label>
        <div class="col-sm-8">

            <input type="text" name="service_name_renue_price" class="form-control">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Remark</label>

        <div class="col-sm-8">
            <textarea rows="2" cols="50" name="service_name_remark" class="form-control">
                <?php  if (isset($customer->service_name_remark)) : echo trim($customer->service_name_remark);endif ?>
            </textarea>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('#domain_checkbox').hide();
        $('#hosting_checkbox').hide();
        $('#domain_hosting_checkbox').hide();
        $('#domain_hosting_checkbox').hide();
        $('#service_checkbox').hide();

        $('#domain').on('change',function () {
            if($('#domain').is(':checked')){
                $('#domain_checkbox').show();

            } else {
                $('#domain_checkbox').hide();


            }
        });
        $('#hosting').on('change',function () {
            if($('#hosting').is(':checked')){
                $('#hosting_checkbox').show();

            } else {
                $('#hosting_checkbox').hide();


            }
        });

        $('#domain_hosting').on('change',function () {
            if($('#domain_hosting').is(':checked')){
                $('#domain_hosting_checkbox').show();

            } else {
                $('#domain_hosting_checkbox').hide();


            }
        });
        $('#service').on('change',function () {
            if($('#service').is(':checked')){
                $('#service_checkbox').show();

            } else {
                $('#service_checkbox').hide();


            }
        });

    });


</script>
