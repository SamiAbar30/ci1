 <form method="post" class="row " action="<?php echo base_url('Dashboard/'.$action); ?>">
    <div class="col-md-6">
      <label for="inputfirstname" class="form-label">firstname</label>
      <input type="text" name="firstname" class="form-control" value="<?=$users['firstname']?>" id="inputfirstname" placeholder="First name">
    </div>
    <div class="col-md-6">
      <label for="inputlastname" class="form-label">lastname</label>
      <input type="text" name="lastname" class="form-control" value="<?=$users['lastname']?>" id="inputlastname" placeholder="Last name">
    </div>
    <div class="form-group col-lr  g-2">
      <label for="example-date-input" class="col-1 col-form-label">dateofbirth</label>
      <div class="col-12">
        <input class="form-control" name="dateofbirth" type="date" value="<?=$users['dateofbirth']?>" id="example-date-input">
      </div>
    </div>
    <div class="col-md-6">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?=$users['email']?>" id="inputEmail4">
    </div>
    <div class="col-md-6">
      <label for="inputpassword4" class="form-label">password</label>
      <input  type="text" name="password" class="form-control" value="" id="inputPassword4">
    </div>
    <div class="col-12">
      <label for="inputaddress" class="form-label">address</label>
      <input type="text" name="address" class="form-control" value="<?=$users['address']?>" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group  ">
      <label for="example-tel-input" class="col-1 col-form-label">Telephone</label>
      <div class="col-12">
        <input class="form-control" name="phone" typle="tel" value="<?=$users['phone']?>" value="1-(555)-555-5555" id="example-tel-input">
      </div>
    </div>
  
    <div class="col-12">
      <button type="submit" class="btn btn-dark">ok</button>
    </div>
  </form>
