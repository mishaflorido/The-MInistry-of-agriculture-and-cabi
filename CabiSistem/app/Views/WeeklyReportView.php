<!-- Content Header (Page header) -->
<div class="content-header">
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegister" class="form-label"> OFFICER´S WEEKLY REPORT </label>
        <label for="FarmRegister" class="form-label"> (To be submited to Officer-in-charge on Mondays) </label>
    </div>
</div>
<!-- <div class="container"> -->
<div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
    <!-- start input section -->

    <div class="row my-2">
        <div class="col-md-6">
            <span class="input-group-text">Name of offcer: </span>
            <input type="text" class="form-control" placeholder="Name of offcer" name="ofc_name">
        </div>
        <div class="col-md-6">
            <span class="input-group-text">Desigantion: </span>
            <input type="text" class="form-control" placeholder="Designation" name="ofc_desig">
        </div>
    </div>

    <div class="row my-2">
        <div class="col-md-6">
            <span class="input-group-text">Week ending: </span>
            <input type="text" class="form-control" placeholder="Week ending" name="ofc_week">
        </div>
        <div class="col-md-6">
            <span class="input-group-text">Departament/Unit: </span>
            <input type="text" class="form-control" placeholder="Departamet/Unit" name="ofc_dpt">
        </div>
    </div>

    <table class="table table-bordered table-success">
        <thead>
            <tr>
                <th scope="col" style="width: 8%;">Day & Date</th>
                <th scope="col" style="width: 15%;">Name, Addres, Tel.No</th>
                <th scope="col">Date of previous visit</th>
                <th scope="col" style="width: 30%;">Clients problems, needs and requests</th>
                <th scope="col" style="width: 30%;">Nature of advise given or work done with client (inlcude relevant and especific information)</th>
                <th scope="col">Amount of time spent with client</th>
                <th scope="col">Miles traveled</th>
            </tr>
        </thead>

        <tbody id='tbody_wkly_past_report'>
            <tr>
                <td>
                    <input type="text" name="day_wkly_rpt" value="MON" disabled style="width: 160px;" class="form-control day_monday">
                    <input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_monday">
                </td>
                <td><input type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control day_monday"></td>
                <td><input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_monday"></td>
                <td><input type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control day_monday"></td>
                <td><input type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control day_monday"></td>
                <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control day_monday"></td>
                <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control day_monday"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_wkly_rpt" value="TUES" disabled style="width: 160px;" class="form-control day_tuesday">
                    <input type="date" name="date_wkly_rpt" style="width: 160px;" style="width: 160px;" class="form-control day_tuesday">
                </td>
                <td><input type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control day_tuesday"></td>
                <td><input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_tuesday"></td>
                <td><input type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control day_tuesday"></td>
                <td><input type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control day_tuesday"></td>
                <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control day_tuesday"></td>
                <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control day_tuesday"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_wkly_rpt" value="WED" disabled style="width: 160px;" class="form-control day_wed">
                    <input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_wed">
                </td>
                <td><input type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control day_wed"></td>
                <td><input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_wed"></td>
                <td><input type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control day_wed"></td>
                <td><input type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control day_wed"></td>
                <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control day_wed"></td>
                <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control day_wed"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_wkly_rpt" value="THURS" disabled style="width: 160px;" class="form-control day_thurs">
                    <input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_thurs">
                </td>
                <td><input type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control day_thurs"></td>
                <td><input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_thurs"></td>
                <td><input type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control day_thurs"></td>
                <td><input type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control day_thurs"></td>
                <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control day_thurs"></td>
                <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control day_thurs"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_wkly_rpt" value="FRI" disabled style="width: 160px;" class="form-control day_fri">
                    <input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_fri">
                </td>
                <td><input type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control day_fri"></td>
                <td><input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_fri"></td>
                <td><input type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control day_fri"></td>
                <td><input type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control day_fri"></td>
                <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control day_fri"></td>
                <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control day_fri"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_wkly_rpt" value="SAT" disabled style="width: 160px;" class="form-control day_sat">
                    <input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_sat">
                </td>
                <td><input type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control day_sat"></td>
                <td><input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_sat"></td>
                <td><input type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control day_sat"></td>
                <td><input type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control day_sat"></td>
                <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control day_sat"></td>
                <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control day_sat"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_wkly_rpt" value="SUN" disabled style="width: 160px;" class="form-control day_sun">
                    <input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_sun">
                </td>
                <td><input type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control day_sun"></td>
                <td><input type="date" name="date_wkly_rpt" style="width: 160px;" class="form-control day_sun"></td>
                <td><input type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control day_sun"></td>
                <td><input type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control day_sun"></td>
                <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control day_sun"></td>
                <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control day_sun"></td>
            </tr>

        </tbody>
    </table>
    <div class="row my-2">

        <div style="text-align: center" class="mb-3">
            <label for="FarmRegisterForm" class="form-label">Other Official Activities</label>
        </div>
        <div style="text-align: center" class="mb-3">
            <label for="FarmRegister" class="form-label"> (Attendance at meeting, Seminars, Demostration, etc.) </label>
        </div>

        <div style="text-align: center" class="mb-3">
            <label for="FarmRegisterForm" class="form-label">Other Official Activities</label>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-1 text-center">
            <div class="d-inline-flex text-center mt-4">
                <a class="form-control" role="button" id="add_cropdmg" onclick="add_other_act()"><i class="fa fa-plus" aria-hidden="true" style="width: auto"></i></a>
            </div>
        </div>
        <div class="col-md-11">

            <table class="table table-bordered table-success">
                <thead>
                    <tr>
                        <th scope="col">Day, date & time</th>
                        <th scope="col">Nature of activity</th>
                        <th scope="col">Details</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody id='tbody_plant_aplication'>
                    <tr>
                        <td><input type="text" name="Date_other_act" placeholder=Day, date & time"" class="form-control other_act"></td>
                        <td><input type="text" name="nat_act" placeholder="Nature of activity" class="form-control other_act"></td>
                        <td><input type="text" name="det_act" placeholder="Details" class="form-control other_act"></td>
                        <td class="align-middle text-center"><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">ITINERARY FOR NEXT WEEK</label>
    </div>

    <div class="row my-2">
        <div class="col-md-6">
            <span class="input-group-text">Week begining: </span>
            <input type="text" class="form-control" placeholder="Week begining" name="wk_beg">
        </div>
        <div class="col-md-6">
            <span class="input-group-text">Name of officer </span>
            <input type="text" class="form-control" placeholder="Departamet/Unit" name="name_offc">
        </div>
    </div>

    <table class="table table-bordered table-success">
        <thead>
            <tr>
                <th scope="col" style="width: 8%;">Day & Date</th>
                <th scope="col" style="width: 15%;">Proposed activity eg. Visits, attendace at seminar, meeting, demostration, training session, etc.</th>
                <th scope="col" style="width: 15%;">Names, Address & Tel.No. of clients to be visited</th>
                <th scope="col" style="width: 15%;">Location of proposed activity (Specific addresses)</th>
                <th scope="col" style="width: 15%;">Nature of to be carried out e.g. Advisory work, follop up, demostration, meeting, etc.</th>
            </tr>
        </thead>

        <tbody id='tbody_wkly_plan_report'>
            <tr>
                <td>
                    <input type="text" name="day_plan_rpt" value="MON" disabled style="width: 160px;" class="form-control day_p_monday">
                    <input type="date" name="date_plan_rpt" style="width: 160px;" class="form-control day_p_monday">
                </td>
                <td><input type="text" name="prp_act" placeholder="" class="form-control day_p_monday"></td>
                <td><input type="text" name="name_act" placeholder="" class="form-control day_p_monday"></td>
                <td><input type="text" name="loc_prp" placeholder="" class="form-control day_monday"></td>
                <td><input type="text" name="nat_prp" placeholder="" class="form-control day_monday"></td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="day_plan_rpt" value="THURS" disabled style="width: 160px;" class="form-control day_p_thurs">
                    <input type="date" name="date_plan_rpt" style="width: 160px;" class="form-control day_p_thurs">
                </td>
                <td><input type="text" name="prp_act" placeholder="" class="form-control day_p_thurs"></td>
                <td><input type="text" name="name_act" placeholder="" class="form-control day_p_thurs"></td>
                <td><input type="text" name="loc_prp" placeholder="" class="form-control day_thurs"></td>
                <td><input type="text" name="nat_prp" placeholder="" class="form-control day_thurs"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_plan_rpt" value="WED" disabled style="width: 160px;" class="form-control day_p_wed">
                    <input type="date" name="date_plan_rpt" style="width: 160px;" class="form-control day_p_wed">
                </td>
                <td><input type="text" name="prp_act" placeholder="" class="form-control day_p_wed"></td>
                <td><input type="text" name="name_act" placeholder="" class="form-control day_p_wed"></td>
                <td><input type="text" name="loc_prp" placeholder="" class="form-control day_wed"></td>
                <td><input type="text" name="nat_prp" placeholder="" class="form-control day_wed"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_plan_rpt" value="TUES" disabled style="width: 160px;" class="form-control day_p_tues">
                    <input type="date" name="date_plan_rpt" style="width: 160px;" class="form-control day_p_tues">
                </td>
                <td><input type="text" name="prp_act" placeholder="" class="form-control day_p_tues"></td>
                <td><input type="text" name="name_act" placeholder="" class="form-control day_p_tues"></td>
                <td><input type="text" name="loc_prp" placeholder="" class="form-control day_tues"></td>
                <td><input type="text" name="nat_prp" placeholder="" class="form-control day_tues"></td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="day_plan_rpt" value="FRI" disabled style="width: 160px;" class="form-control day_p_fri">
                    <input type="date" name="date_plan_rpt" style="width: 160px;" class="form-control day_p_fri">
                </td>
                <td><input type="text" name="prp_act" placeholder="" class="form-control day_p_fri"></td>
                <td><input type="text" name="name_act" placeholder="" class="form-control day_p_fri"></td>
                <td><input type="text" name="loc_prp" placeholder="" class="form-control day_fri"></td>
                <td><input type="text" name="nat_prp" placeholder="" class="form-control day_fri"></td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="day_plan_rpt" value="SAT" disabled style="width: 160px;" class="form-control day_p_sat">
                    <input type="date" name="date_plan_rpt" style="width: 160px;" class="form-control day_p_sat">
                </td>
                <td><input type="text" name="prp_act" placeholder="" class="form-control day_p_sat"></td>
                <td><input type="text" name="name_act" placeholder="" class="form-control day_p_sat"></td>
                <td><input type="text" name="loc_prp" placeholder="" class="form-control day_sat"></td>
                <td><input type="text" name="nat_prp" placeholder="" class="form-control day_sat"></td>
            </tr>
        </tbody>
    </table>

    <div class="row my-4">
        <div class="d-grid gap-2 col-md-6 mx-auto">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>

</div>