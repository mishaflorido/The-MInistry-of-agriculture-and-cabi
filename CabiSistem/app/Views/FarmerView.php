<form>
  <div  style="text-align: center" class="mb-3">
    <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
  </div>
  <div  style="text-align: center" class="mb-3">
    <label for="FarmRegister" class="form-label"> Farmer Registration form</label>
  </div>
  <div>
    <label for="date_reg" class="form-label"> Register date: </label>
    <input type='date' class="form-control" name="date_reg"/>
    <label for="Confidential" class="Confidential"> CONFIDENTIAL</label>
  </div>
  <div>
    <label for="Personal" class="Personal"> I PERSONAL</label>
  </div>
  <div>
    <div class="row">
      <div class="col">
        <p>1. Name: <input type="text" class="name" placeholder="Name" name="name"></p>
      </div>
      <div class="col">
        <p>AKA: <input type="text" class="AKA" placeholder="AKA" name="aka"></p>
      </div>
  </div>
    <div>
     <p>2. Date of Birth: <input type='date' class="form-control" name="birthdate"/></p>
    </div>
    <div>
      <p>3. Home address: <input type="text" class="addres" placeholder="Home address" name="address"></p>
    </div>
    <div>
      <p>4. Telephone number: <input type="text" class="phone_num" placeholder="Telephone number" name="phone_num"></p>
    </div>
    <div class="form-check">
        <p>5. Sex:</p>
        <input class="form-check-input" type="radio" name="sex" id="sex">
        <label class="form-check-label" for="sex"> Male </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="sex" id="sex">
        <label class="form-check-label" for="sex"> Female </label>
    </div>
    <div>
      <label for="involved" class="involved"> 6. Name(s) of others in households / group involved in the farming bussines </label>
    </div>
    <div class="row">
      <div class="col-md-2" >
        <div>
          <a class="form-control" role="button" id="add_involved" onclick="add_involded()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
        </div>

      </div>
      <div class="col-md-10">

        <div class="container">
        <table class="table">
      <thead>
        <tr>
          
          <th scope="col">Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Last Name</th>
              </tr>
      </thead>
      <tbody id='tbody_involved'>
        <tr>
          <td><input type="text" name="" id="" placeholder="Name" class="form-control"></td>
          <td><input type="text" name="" id="" placeholder="LastName" class="form-control"></td>
        </tr>
      </tbody>
    </table>
    
    
      <div class="container">
      </div>
  </div>

  
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
        Default checkbox
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
        Checked checkbox
        </label>
    </div>
    <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>