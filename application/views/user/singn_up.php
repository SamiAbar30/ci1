<div>
  <form method="post" class="row " action="<?php echo base_url('User/singn_up'); ?>">
    <div class="col">
  
      <div class="col g-2">
        <input type="text" name="firstname" class="form-control" placeholder="First name" aria-label="First name">
      </div>
      <br>
      <div class="col g-2">
        <input type="text" name="lastname" class="form-control" placeholder="Last name" aria-label="Last name">
      </div>

    <div class="col-md-6">
      <label for="example-date-input" class="form-label">dateofbirth</label>
     
      <input class="form-control" name="dateofbirth" type="date" id="example-date-input">

    </div>
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
      <label for="inputPassword4" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="inputPassword4">
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Address</label>
      <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group  ">
      <label for="example-tel-input" class="col-1 col-form-label">Telephone</label>
      <div class="col-12">
        <input class="form-control" name="phone" typle="tel" value="(555)-5-5555-5555" id="example-tel-input">
      </div>
    </div>
    <div class="col-12">
      <button type="submit" class="btn btn-dark">Sign in</button>
    </div>
    </div>
  </form>
</div>