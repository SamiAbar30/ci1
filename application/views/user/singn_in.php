
<form method="post" action="<?php echo base_url('User/singn_in');?>">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10"style="padding: 0px;">
      <input type="email" name="email" class="form-control" id="inputEmail3">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label" >Password</label>
    <div class="col-sm-10" style="padding: 0px;">
      <input type="password" name="password" class="form-control" id="inputPassword3" >
    </div>
  </div>
 
  <button type="submit" class="btn btn-dark">Sign in</button>
</form>
