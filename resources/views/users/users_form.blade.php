<div class="form-group">
    <label class="col-sm-2 control-label">Name</label>

    <div class="col-sm-8">

        <input type="text" class="form-control" name="name" placeholder="Name"
               value="<?php if (isset($user->name)) : echo $user->name;endif ?>">
        <input type="hidden" class="form-control" name="id" placeholder="Name"
               value="<?php if (isset($user->id)) : echo $user->id;endif ?>">


    </div>

</div>




<div class="form-group">
    <label class="col-sm-2 control-label">Email</label>
    <div class="col-sm-8">
        <input type="email" class="form-control" name="email" id="user_email" placeholder="Email"
               value="<?php  if (isset($user->email)) : echo $user->email;endif ?>">
        <span id="error_email"></span>
    </div>
</div>




<div class="form-group">
    <label class="col-sm-2 control-label">Password</label>
    <div class="col-sm-8">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
               value="">
        <span id="error_email"></span>
    </div>
</div>
