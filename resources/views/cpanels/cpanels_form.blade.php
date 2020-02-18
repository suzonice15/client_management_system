<div class="form-group">
    <label class="col-sm-2 control-label">Domain Name</label>

    <div class="col-sm-8">

        <input type="text" class="form-control" name="cpanel_domain_name" placeholder="Domain Name"
               value="<?php if (isset($cpanel->cpanel_domain_name)) : echo $cpanel->cpanel_domain_name;endif ?>">

    </div>

</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Cpanel Url Name</label>

    <div class="col-sm-8">

        <input type="text" class="form-control" name="cpanel_url" placeholder="Cpanel Url"
               value="<?php if (isset($cpanel->cpanel_url)) : echo $cpanel->cpanel_url;endif ?>">

    </div>

</div>

<div class="form-group">
    <label class="col-sm-2 control-label">User Name </label>

    <div class="col-sm-8">
        <input type="text" class="form-control" name="cpanel_user" id="cpanel_user" placeholder="User Name"
               value="<?php  if (isset($cpanel->cpanel_user)) : echo $cpanel->cpanel_user;endif ?>">
        <span id="error_phone"></span>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Password</label>

    <div class="col-sm-8">


        <input type="text" class="form-control" name="cpanel_password" id="cpanel_password" placeholder="Password"
               value="<?php  if (isset($cpanel->cpanel_password)) : echo $cpanel->cpanel_password;endif ?>">
    </div>
</div>
