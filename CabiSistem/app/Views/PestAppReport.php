<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">Pesticide Application</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active">Pesticide Application</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container">
    <table class="d-none" id="pestapp_t1">
        <thead>
            <tr>
                <th>Farmer Name, Address, tel #</th>
                <th>Date</th>
                <th>Crop(s)</th>
                <th>Plot size</th>
                <th>Target Pest</th>
                <th>Pesticide</th>
                <th>Rate of application</th>
                <th>Amt. applied (gal)</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody id="pestapp_tb1">

        </tbody>
    </table>
    <div class="row my-2">
        <div class="col-md-6">
            <span class="input-group-text">First date: </span>
            <input type="date" class="form-control to_search" id="f_date">
        </div>
        <div class="col-md-6">
            <span class="input-group-text">Last Date: </span>
            <input type="date" class="form-control to_search" id="l_date">
        </div>
    </div>
    <div class="row my-2">
        <div class="offset-md-3 col-md-4">
            <span class="input-group-text">Supervisor signature: </span>
            <input type="text" class="form-control to_search" placeholder="For PDF Make" id="sup_sig_pdf">
        </div>
    </div>

    <div class="row my-4">
        <table id="pestapp_table_report" class="display responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Supervisor signature</th>
                    <th>Farmer Name, Address, tel #</th>
                    <th>Date</th>
                    <th>Comments</th>
                </tr>
            </thead>
            <tbody id="tbody_pestapp_report">
            </tbody>
            <tfoot>
                <tr>
                    <th>Supervisor signature</th>
                    <th>Farmer Name, Address, tel #</th>
                    <th>Date</th>
                    <th>Comments</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>