<div class="form-group">
    <label class="col-sm-2 control-label">Name</label>

    <div class="col-sm-8">

        <input type="text" class="form-control" name="customer_name" placeholder="Name"
               value="<?php if (isset($customer->customer_name)) : echo $customer->customer_name;endif ?>">
        <input type="hidden" class="form-control" name="customer_view" placeholder="Name"
               value="0">
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
            <option value="0">select division</option>
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
            <option value="0"> select division</option>
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
            <option value="0"> select Professions</option>
            @foreach($professions as $profession)
                <option value="{{ $profession->profession_id }}">{{ $profession->profession_name }}</option>
            @endforeach

        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Positions</label>
    <div class="col-sm-8">
        <select name="position_id" class="form-control select2" >

            <option value="0"> select Positions</option>

        @foreach($positions as $position)
                <option value="{{ $position->position_id }}">{{ $position->position_name }}</option>
            @endforeach

        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-sm-2 control-label">Types</label>
    <div class="col-sm-8">
        <select name="type_id" class="form-control select2" >
            <option value="0"> select Types</option>
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
    <label class="col-sm-2 control-label">Customers Status</label>

    <div class="col-sm-8">
         <select class="form-control" name="customer_status">
             <option value="0">General  customers </option>
             <option value="1">Client</option>
             <option value="2">Programer </option>
         </select>
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
    <input type="text" name="customer_remendar_date" data-date-format='yyyy-mm-dd' value=" <?php  if (isset($customer->customer_remendar_date)) : echo trim($customer->customer_remendar_date);endif ?> " class="form-control pull-right" id="datepicker">
    </div>
    </div>
    <!-- /.input group -->
</div>
