<div class="form-group">
    <label class="col-sm-2 control-label">Service Category Name</label>

    <div class="col-sm-8">
        <input  name="service_category_name" type="text" value="<?php if(isset($serviceCategory)) { echo $serviceCategory->service_category_name;} ?>" class="form-control">
        <input  name="service_category_id" type="hidden" value="<?php if(isset($serviceCategory)) { echo $serviceCategory->service_category_id;} ?>" class="form-control">
    </div>
</div>
