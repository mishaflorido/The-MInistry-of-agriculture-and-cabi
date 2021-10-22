<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0"> OFFICER´S WEEKLY REPORT </h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active">officer's weekly report</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div style="text-align: center" class="mb-3">
    <label for="FarmRegisterForm" class="form-label">THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES</label></br>
    <label for="FarmRegisterForm" class="form-label">OFFICER´S WEEKLY REPORT</label></br>
    <label for="FarmRegisterForm" class="form-label">(To be submited to Officer-in-charge on Mondays)</label>
</div>
<div class="container">
    <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
        <form class="frm_ofwr">
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Name of officer: </span>
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
                    <div class="row" style="margin-left: 1px;">
                        <input type="text" class="form-control" placeholder="Week ending" name="ofc_week" style="width:50%;" id="week_end">
                        <input placeholder="Date of Week Ending" name="date_wkly_rpt" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 48.5%;" class="form-control day_monday input_date" id="week_end">
                    </div>

                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Departament/Unit: </span>
                    <input type="text" class="form-control" placeholder="Departamet/Unit" name="ofc_dpt">
                </div>
            </div>

            <table class="table table-bordered table-success">
                <thead>
                    <tr>
                        <th scope="col" style="width: 8%;">
                            Day & Date
                        </th>
                        <th scope="col" style="width: 15%;">Name, Addres, Tel.No</th>
                        <th scope="col">Date of previous visit</th>
                        <th scope="col" style="width: 15%;">Clients problems, needs and requests</th>
                        <th scope="col" style="width: 20%;">Nature of advise given or work done with client (inlcude relevant and especific information)</th>
                        <th scope="col">Amount of time spent with client</th>
                        <th scope="col">Miles traveled</th>
                    </tr>
                </thead>

                <tbody id='tbody_wkly_past_report'>
                    <tr>
                        <td>
                            <input type="text" name="day_ofwr" value="MON" disabled style="width: 70px;" class="form-control day_monday show_inp day_ofwr">
                            <input placeholder="MON" name="date_rpt_day" type="hidden" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 70px;" class="form-control date_rpt_day h_input d-none">

                        </td>
                        <td><textarea style="overflow:hidden" type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control name_wkly_rpt"></textarea></td>
                        <td><input type="text" name="date_wkly_rpt" style="width: 107px;" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date_wkly_rpt"></td>
                        <td><textarea style=" overflow:hidden;" type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control clt_wkly_rpt"></textarea></td>
                        <td><textarea style=" overflow:hidden" type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control Adv_wkly_rpt"></textarea></td>
                        <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control time_wkly_rpt"></td>
                        <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control miles_wkly_rpt"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_ofwr" value="TUES" disabled style="width: 70px;" class="form-control day_ofwr">
                            <input type="hidden" name="date_rpt_day" style="width: 70px;" style="width: 70px;" class="form-control date_rpt_day h_input d-none">
                        </td>
                        <td><textarea style="overflow:hidden" type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control name_wkly_rpt"></textarea></td>
                        <td><input type="text" name="date_wkly_rpt" style="width: 107px;" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date_wkly_rpt"></td>
                        <td><textarea style=" overflow:hidden" type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control clt_wkly_rpt"></textarea></td>
                        <td><textarea style="overflow:hidden" type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control Adv_wkly_rpt"></textarea></td>
                        <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control time_wkly_rpt"></td>
                        <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control miles_wkly_rpt"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_ofwr" value="WED" disabled style="width: 70px;" class="form-control day_ofwr">
                            <input type="hidden" name="date_rpt_day" style="width: 70px;" class="form-control date_rpt_day h_input d-none">
                        </td>
                        <td><textarea style="overflow:hidden" type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control name_wkly_rpt"></textarea></td>
                        <td><input type="text" name="date_wkly_rpt" style="width: 107px;" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date_wkly_rpt"></td>
                        <td><textarea style="  overflow:hidden" type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control clt_wkly_rpt"></textarea></td>
                        <td><textarea style="  overflow:hidden" type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control Adv_wkly_rpt"></textarea></td>
                        <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control time_wkly_rpt"></td>
                        <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control miles_wkly_rpt"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_ofwr" value="THURS" disabled style="width: 70px;" class="form-control day_ofwr">
                            <input type="hidden" name="date_rpt_day" style="width: 70px;" class="form-control date_rpt_day h_input d-none">
                        </td>
                        <td><textarea style="overflow:hidden" type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control name_wkly_rpt"></textarea></td>
                        <td><input type="text" name="date_wkly_rpt" style="width: 107px;" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date_wkly_rpt"></td>
                        <td><textarea style=" overflow:hidden" type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control clt_wkly_rpt"></textarea></td>
                        <td><textarea style=" overflow:hidden" type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control Adv_wkly_rpt"></textarea></td>
                        <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control time_wkly_rpt"></td>
                        <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control miles_wkly_rpt"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_ofwr" value="FRI" disabled style="width: 70px;" class="form-control  day_ofwr">
                            <input type="hidden" name="date_rpt_day" style="width: 70px;" class="form-control date_rpt_day h_input d-none">
                        </td>
                        <td><textarea style="overflow:hidden" type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control name_wkly_rpt"></textarea></td>
                        <td><input type="text" name="date_wkly_rpt" style="width: 107px;" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date_wkly_rpt"></td>
                        <td><textarea style="  overflow:hidden" type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control clt_wkly_rpt"></textarea></td>
                        <td><textarea style=" overflow:hidden" type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control Adv_wkly_rpt"></textarea></td>
                        <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control time_wkly_rpt"></td>
                        <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control miles_wkly_rpt"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_ofwr" value="SAT" disabled style="width: 70px;" class="form-control day_ofwr">
                            <input type="hidden" name="date_rpt_day" style="width: 70px;" class="form-control date_rpt_day h_input d-none">
                        </td>
                        <td><textarea style="overflow:hidden" type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control name_wkly_rpt"></textarea></td>
                        <td><input type="text" name="date_wkly_rpt" style="width: 107px;" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date_wkly_rpt"></td>
                        <td><textarea style="  overflow:hidden" type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control clt_wkly_rpt"></textarea></td>
                        <td><textarea style="  overflow:hidden" type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control Adv_wkly_rpt"></textarea></td>
                        <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control time_wkly_rpt"></td>
                        <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control miles_wkly_rpt"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_ofwr" value="SUN" disabled style="width: 70px;" class="form-control day_ofwr">
                            <input type="hidden" name="date_rpt_day" style="width: 70px;" class="form-control date_rpt_day h_input d-none">
                        </td>
                        <td><textarea style="overflow:hidden" type="text" name="name_wkly_rpt" placeholder="Name, Addres, Tel.No" class="form-control name_wkly_rpt"></textarea></td>
                        <td><input type="text" name="date_wkly_rpt" style="width: 107px;" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date_wkly_rpt"></td>
                        <td><textarea style=" overflow:hidden" type="text" name="clt_wkly_rpt" placeholder="Client problems" class="form-control clt_wkly_rpt"></textarea></td>
                        <td><textarea style="  overflow:hidden" type="text" name="Adv_wkly_rpt" placeholder="Advise" class="form-control Adv_wkly_rpt"></textarea></td>
                        <td><input type="number" name="time_wkly_rpt" placeholder="time" class="form-control time_wkly_rpt"></td>
                        <td><input type="number" name="miles_wkly_rpt" placeholder="Miles" class="form-control miles_wkly_rpt"></td>
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

                        <tbody id='tbody_other_ofActivities'>
                            <tr>
                                <td><input type="text" name="date_other_act" placeholder="Day, date & time" class="form-control date_other_act"></td>
                                <td><input type="text" name="nat_act" placeholder="Nature of activity" class="form-control nat_act"></td>
                                <td><input type="text" name="det_act" placeholder="Details" class="form-control det_act"></td>
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
                <div class="col-md-12">
                    <span class="input-group-text" style="text-align: center;">Week begining: </span>
                    <div class="row" style="margin-left: 1px;">
                        <input type="text" class="form-control" placeholder="Week Begining" name="wk_beg" style="width:50%;">
                        <input placeholder="Date of Week Ending" name="" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 48.5%;" class="form-control day_monday input_date" id="week_beg">
                    </div>

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
                            <input type="text" name="day_plan_rpt" value="MON" disabled style="width: 70px;" class="form-control day_plan_rpt show_inp">
                            <input placeholder="MON" name="date_plan_rpt" type="hidden" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 70px;" class="form-control date_plan_rpt h_input_b d-none">
                        </td>
                        <td><input type="text" name="prp_act" placeholder="" class="form-control prp_act"></td>
                        <td><input type="text" name="name_act" placeholder="" class="form-control name_act"></td>
                        <td><input type="text" name="loc_prp" placeholder="" class="form-control loc_prp"></td>
                        <td><input type="text" name="nat_prp" placeholder="" class="form-control nat_prp"></td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="day_plan_rpt" value="TUES" disabled style="width: 70px;" class="form-control day_plan_rpt">
                            <input placeholder="MON" name="date_plan_rpt" type="hidden" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 70px;" class="form-control date_plan_rpt h_input_b d-none">
                        </td>
                        <td><input type="text" name="prp_act" placeholder="" class="form-control prp_act"></td>
                        <td><input type="text" name="name_act" placeholder="" class="form-control name_act"></td>
                        <td><input type="text" name="loc_prp" placeholder="" class="form-control loc_prp"></td>
                        <td><input type="text" name="nat_prp" placeholder="" class="form-control nat_prp"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_plan_rpt" value="WED" disabled style="width: 70px;" class="form-control day_plan_rpt">
                            <input placeholder="MON" name="date_plan_rpt" type="hidden" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 70px;" class="form-control date_plan_rpt h_input_b d-none">
                        </td>
                        <td><input type="text" name="prp_act" placeholder="" class="form-control prp_act"></td>
                        <td><input type="text" name="name_act" placeholder="" class="form-control name_act"></td>
                        <td><input type="text" name="loc_prp" placeholder="" class="form-control loc_prp"></td>
                        <td><input type="text" name="nat_prp" placeholder="" class="form-control nat_prp"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_plan_rpt" value="THURS" disabled style="width: 70px;" class="form-control day_plan_rpt">
                            <input placeholder="MON" name="date_plan_rpt" type="hidden" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 70px;" class="form-control date_plan_rpt h_input_b d-none">
                        </td>
                        <td><input type="text" name="prp_act" placeholder="" class="form-control prp_act"></td>
                        <td><input type="text" name="name_act" placeholder="" class="form-control name_act"></td>
                        <td><input type="text" name="loc_prp" placeholder="" class="form-control loc_prp"></td>
                        <td><input type="text" name="nat_prp" placeholder="" class="form-control nat_prp"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_plan_rpt" value="FRI" disabled style="width: 70px;" class="form-control day_plan_rpt">
                            <input placeholder="MON" name="date_plan_rpt" type="hidden" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 70px;" class="form-control date_plan_rpt h_input_b d-none">
                        </td>
                        <td><input type="text" name="prp_act" placeholder="" class="form-control prp_act"></td>
                        <td><input type="text" name="name_act" placeholder="" class="form-control name_act"></td>
                        <td><input type="text" name="loc_prp" placeholder="" class="form-control loc_prp"></td>
                        <td><input type="text" name="nat_prp" placeholder="" class="form-control nat_prp"></td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name="day_plan_rpt" value="SAT" disabled style="width: 70px;" class="form-control day_plan_rpt">
                            <input placeholder="MON" name="date_plan_rpt" type="hidden" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 70px;" class="form-control date_plan_rpt h_input_b d-none">
                        </td>
                        <td><input type="text" name="prp_act" placeholder="" class="form-control prp_act"></td>
                        <td><input type="text" name="name_act" placeholder="" class="form-control name_act"></td>
                        <td><input type="text" name="loc_prp" placeholder="" class="form-control loc_prp"></td>
                        <td><input type="text" name="nat_prp" placeholder="" class="form-control nat_prp"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="day_plan_rpt" value="SUN" disabled style="width: 70px;" class="form-control day_plan_rpt">
                            <input placeholder="MON" name="date_plan_rpt" type="hidden" onfocus="(this.type='date')" onblur="(this.type='text')" style="width: 70px;" class="form-control date_plan_rpt h_input_b d-none">
                        </td>
                        <td><input type="text" name="prp_act" placeholder="" class="form-control prp_act"></td>
                        <td><input type="text" name="name_act" placeholder="" class="form-control name_act"></td>
                        <td><input type="text" name="loc_prp" placeholder="" class="form-control loc_prp"></td>
                        <td><input type="text" name="nat_prp" placeholder="" class="form-control nat_prp"></td>
                    </tr>
                </tbody>
            </table>
            <div class="row my-2">
                <div class="offset-lg-1 col-lg-10">
                    <!-- Alert -->
                    <div class="alert alert-success d-none" role="alert" id="alert_ofwr">

                    </div>
                    <!-- ///////// -->
                </div>
            </div>
            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="submit" class="btn btn-success" id="ofiwr_btn_submit">
                        <span class="spinner-border spinner-border-sm d-none spin_ofwr" role="status" aria-hidden="true"></span>
                        <span class="d-none spin_ofwr">Loading...<br></span>
                        <span class="d-none spin_ofwr"> Please Wait</span>
                        <span class="not_spin_ofwr"> Submit</span>
                    </button>

                </div>
            </div>
        </form>

    </div>
</div>