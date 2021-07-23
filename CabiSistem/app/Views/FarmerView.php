<div style="text-align: center" class="mb-3">
  <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
</div>
<div style="text-align: center" class="mb-3">
  <label for="FarmRegister" class="form-label"> Farmer Registration form</label>
</div>
<div class="container">
  <!-- First Data Inputs -->
  <form>
    <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;" id="1st_page_farmer">
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
        <div class="col-md-6">
          <span class="input-group-text">1. Name: </span>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Name" name="name">
            <input type="text" class="form-control" placeholder="Last Name" name="last_name">
            <input type="text" class="form-control" placeholder="Mother Last Name" name="mo_last_name">
          </div>
        </div>
        <div class="col-md-6">
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

      <!-- ////////////////// -->
      <div class="row my-2">
        <div>
          <span class="input-group-text">7. Name(s) of others in households / group involved in the farming bussines</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2 text-center">
          <div class="d-inline-flex text-center">
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
                  <th scope="col">Delete</th>
                </tr>
              </thead>

              <tbody id='tbody_involved'>
                <tr>
                  <td><input type="text" name="name" placeholder="Name" class="form-control"></td>
                  <td><input type="text" name="last_name" placeholder="LastName" class="form-control"></td>
                  <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div>
        <span class="input-group-text">8. Watershed:</span>
        <input type="text" class="form-control" placeholder="" name="watershed">
      </div>

    </div>
    <!-- Pagination Section -->
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        <li class="page-item"><a id="1ts_page" class="page-link">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
    <!-- /////////   -->
</div>

<!-- aqui termian la primera parte del formulario farmers register -->
<div class="container">
  <div>
    <label for="farm_inf" class="Farm_inf"> II FARM INFORMATION</label>
    <div>
      1. How many parcel do you operate? <input type="text" class="form-control" placeholder="" name="parcel_num">
    </div>
    <div class="row">
      <div class="col-md-2">
        <div>
          <a class="form-control" role="button" id="add_parcel" onclick="add_parcel()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
        </div>
      </div>
      <div class="col-md-10">
        <div class="container">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Number</th>
                <th scope="col">Address</th>
                <th scope="col">Acreage</th>
                <th scope="col">Tenure</th>
                <th scope="col">Crop/Livestock</th>
              </tr>
            </thead>

            <tbody id='tbody_parcel'>
              <tr>
                <td><input type="text" name="parc_num" id="" placeholder="" class="form-control"></td>
                <td><input type="text" name="parc_address" id="" placeholder="" class="form-control"></td>
                <td><input type="text" name="parc_acreage" id="" placeholder="" class="form-control"></td>
                <td><input type="text" name="parc_tenure" id="" placeholder="" class="form-control"></td>
                <td><input type="text" name="crop_livestock" id="" placeholder="" class="form-control"></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="form-check">2. What farm equipment do you own?>
    <div class="row">
      <div class="col-md-1">
        <input class="form-check-input" type="checkbox" name="f_pump" id="f_pump">
        <label class="form-check-label" for="pump"> Pump </label>
      </div>
      <div class="col-md-2">
        <input class="form-check-input" type="checkbox" name="f_irri" id="f_irri">
        <label class="form-check-label" for="f_irri"> Irrigation line </label>
      </div>
      <div class="col-md-2">
        <input class="form-check-input" type="checkbox" name="f_other" id="f_other">
        <label class="form-check-label" for="f_other"> Other </label>
      </div>
    </div>
  </div>
  <div>
    3. What are the the principal markets for your crop/livestock
  </div>
  <div class="row">
    <div class="col-md-2">
      <div>
        <a class="form-control" role="button" id="add_involved" onclick="add_involded()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
      </div>
      <div class="container">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-2">
              <div>
                <a class="form-control" role="button" id="add_farm_crop" onclick="add_farm_crop()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
              </div>
            </div>
            <div class="col-md-10">
              <div class="container">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Crop</th>
                      <th scope="col">Market</th>
                    </tr>
                  </thead>

                  <tbody id='tbody_parcel'>
                    <tr>
                      <td><input type="text" name="f_crop" id="" placeholder="" class="form-control"></td>
                      <td><input type="text" name="f_market" id="" placeholder="" class="form-control"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-2">
              <div>
                <a class="form-control" role="button" id="add_farm_crop" onclick="add_farm_crop()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
              </div>
            </div>
            <div class="col-md-10">
              <div class="container">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Livestock</th>
                      <th scope="col">Market</th>
                    </tr>
                  </thead>

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

              </div>
              <tbody id='tbody_parcel'>
                <tr>
                  <td><input type="text" name="f_livestock" id="" placeholder="" class="form-control"></td>
                  <td><input type="text" name="f_market" id="" placeholder="" class="form-control"></td>
                </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-check">4. Doyou go to the market or do middlemen come to your farm:
      <div class="row">
        Market:
        <div class="col-md-4">
          <input class="form-check-input" type="radio" name="go_market" id="go_market">
          <label class="form-check-label" for="go_market"> Yes </label>
        </div>
        <div class="col-md-6">
          <input class="form-check-input" type="radio" name="go_market" id="go_market">
          <label class="form-check-label" for="go_market"> No </label>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-2">
            <div>
              <a class="form-control" role="button" id="add_middle_name" onclick="add_middle_name()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
            </div>
          </div>
          <div class="col-md-10">
            <div class="container">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Middleman name</th>
                  </tr>
                </thead>
                <tbody id='tbody_parcel'>
                  <tr>
                    <td><input type="text" name="m_name" id="" placeholder="" class="form-control"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="col-md-6">5. Who is/are your parcel (s) in boundary with?
        <div class="row">
          <div class="col-md-2">
            <div>
              <a class="form-control" role="button" id="add_boundary" onclick="add_boundary()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="container">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Please list</th>
                  </tr>
                </thead>
                <tbody id='tbody_parcel'>
                  <tr>
                    <td><input type="text" name="name_boundary" id="" placeholder="" class="form-control"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="form-check">
      <div class="col-md-3">
        <label class="form-check-label" for="boundary"> Tick if you unknow </label>
        <input class="form-check-input" type="checkbox" name="boundary" id="boundary">
      </div>
    </div>
    <div class="form-control">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>