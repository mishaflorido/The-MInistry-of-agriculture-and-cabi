<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">Crop Damage Data Report</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active">Crop Damage Data Report</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">
    <table class="d-none" id="t-farm-road">
        <thead>
            <tr>
                <th>Date Registered</th>
                <th>Extension District/Parish</th>
                <th>Name of Road</th>
                <th>Approximate Length</th>
                <th>N° of Farmer Using Road</th>
                <th>Agricultural Activities</th>
                <th>Work to be Done</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody id="tb_farm_road">

        </tbody>
    </table>
    <div class="row my-2">
        <input type="date" name="" id="date_farmroad_report" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="row my-4">
        <table id="froad_table_report" class="display responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Registration Date</th>
                    <th>Extension District/Parish</th>
                    <th>Name of Road</th>
                    <th>Approximate Length</th>
                    <th>N° of Farmer Using Road</th>
                    <th>Agricultural Activities</th>
                    <th>Work to be Done</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody id="tbody_froad_report">
            </tbody>
            <tfoot>
                <tr>
                    <th>Registration Date</th>
                    <th>Extension District/Parish</th>
                    <th>Name of Road</th>
                    <th>Approximate Length</th>
                    <th>N° of Farmer Using Road</th>
                    <th>Agricultural Activities</th>
                    <th>Work to be Done</th>
                    <th>Remarks</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>