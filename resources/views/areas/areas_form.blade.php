

<div class="form-group">
    <label class="col-sm-2 control-label">  Division <span style="color:red">*</span></label>

    <div class="col-sm-6">





                    <select name="devision_id" id="devision_id" class="form-control" >
                        @foreach($divisions as $division)
                            <option value="{{ $division->division_id }}">{{ $division->division_name }}</option>
                        @endforeach

                    </select>


    </div>
</div>



    <div class="form-group">
        <label  class="col-sm-2 control-label">Area Name</label>

        <div class="col-sm-6">

            <input type="text" class="form-control" name="area_name" placeholder="Name" value="<?php if(isset($area->area_name )) : echo $area->area_name ;endif ?>">
        </div>
    </div>
