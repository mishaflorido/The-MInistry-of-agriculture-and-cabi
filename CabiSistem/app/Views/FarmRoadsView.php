<form>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> List of Farm Roads That Need Urgent Attention</label>
    </div>
    <div class="container">
        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->




            <div class=" row my-2">
                <div class="col-md-12">

                    <span class="input-group-text text-wrap"> xxxx</span>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-1 text-center">
                    <div class="d-inline-flex text-center mt-4">
                        <a class="form-control" role="button" id="add_road" onclick="add_road()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Extension District/Parish</th>
                                    <th scope="col">Name of Road</th>
                                    <th scope="col">Approx. length </th>
                                    <th scope="col">No of Farmers Using Road</th>
                                    <th scope="col">Agricultural Activities</th>
                                    <th scope="col">Work to Be Done</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>

                            <tbody id='tbody_produce_supply'>
                                <tr>
                                    <td><input type="text" name="road_dist" placeholder="" class="form-control road_dist"></td>
                                    <td><input type="text" name="road_name" placeholder="" class="form-control road_name"></td>
                                    <td><input type="number" name="road_length" placeholder="" class="form-control road_length"></td>
                                    <td><input type="number" name="num_farm" placeholder="" class="form-control num_farm"></td>
                                    <td><input type="text" name="agr_act" placeholder="" class="form-control agr_act"></td>
                                    <td><input type="text" name="work" placeholder="" class="form-control work"></td>
                                    <td><input type="text" name="remark" placeholder="" class="form-control remark"></td>
                                    <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>