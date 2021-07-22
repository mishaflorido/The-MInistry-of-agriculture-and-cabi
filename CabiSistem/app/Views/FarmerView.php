<div style="text-align: center" class="mb-3">
  <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
</div>
<div style="text-align: center" class="mb-3">
  <label for="FarmRegister" class="form-label"> Farmer Registration form</label>
</div>
<div class="container">
  <form>
    <div class="border border-secondary border-3 rounded" style="padding: 1em; border: 6px solid #dee2e6 !important;">
      <div class="text-center mb-2">
        <label for="date_reg" class="form-label"> Register date: </label>
        <input type='date' class="form-control" name="date_reg" />
      </div>
      <hr>

      <div class="my-3">
        <label for="Confidential" class="Confidential"> CONFIDENTIAL</label>
        <h3>I PERSONAL</h3>
      </div>

      <div class="row">
        <div class="col">
          <span class="input-group-text">1. Name: </span>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Name" name="name">
            <input type="text" class="form-control" placeholder="Last Name" name="last_name">
            <input type="text" class="form-control" placeholder="Mother Last Name" name="mo_last_name">
          </div>

        </div>
        <div class="col">
          <span class="input-group-text">AKA: </span>
          <input type="text" class="form-control" placeholder="AKA" name="aka">
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 form-label">
          <span class="input-group-text">2. Date of Birth: </span>
          <input type='date' class="form-control" name="birthdate" />
        </div>
        <div class="col-md-6 form-label">
          <span class="input-group-text">3. Home address:</span>
          <input type="text" class="form-control" placeholder="Home address" name="address">
        </div>
      </div>
      <div class="row">

        <div class="col-md-6 form-label">
          <span class="input-group-text">4. Telephone number:</span>
          <input type="text" class="form-control" placeholder="Telephone number" name="phone_num">
        </div>
        <div class="col-md-6">
          <div class=" row">
            <span class="input-group-text"> 5. Sex:</span>
          </div>
          <div class="form-control">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" id="sex">
              <label class="form-check-label" for="sex"> Male </label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sex" id="sex">
              <label class="form-check-label" for="sex"> Female </label>
            </div>
          </div>


        </div>
        <div class="row">
          <div class="col-md-6">
            <span class="input-group-text"> 6. Distric:</span>
            <div class="row">

              <div class="col-md-6">
                <select class="form-select" aria-label="District Select" id="parish">
                  <option selected disabled>Parish Select</option>

                </select>
              </div>
              <div class="col-md-6">
                <select class="form-select" aria-label="District Select" id="district">
                  <option selected disabled>District Select (First Select Parish)</option>

                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div>
      <label for="involved" class="involved"> 6. Name(s) of others in households / group involved in the farming bussines </label>
    </div>
    <div class="row">
      <div class="col-md-2">
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
</div>