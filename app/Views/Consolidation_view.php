<div class="container">
    <div class="row">
        <div class="mb-3">
            <label for="" class="form-label">Select Report</label>
            <select class="form-select form-select-md" name="" id="consolidation_table_select">
                <option value="table_1">Crop Establishment and Production Information</option>
                <option value="table_2">List of Farm Roads That Need Urgent Attention</option>
                <option value="table_3">Pesticide Application / Field Record Sheet</option>
            </select>
        </div>
    </div>
    <div class="row my-4">
        <div class="border p-4">
            <div id="table_1" class="table-responsive ">
                <table id="crestWDC_table_report" class="display" style="width:100%">
                    <thead>

                        <th>Registration Number</th>
                        <th>Created by</th>
                        <th>Farmer Name</th>
                        <th>Parcel Address</th>
                        <th>Parcel Number</th>
                        <th>Parish</th>
                        <th>Village</th>
                        <th>Complementary Address</th>
                        <th>Crop Name</th>
                        <th>Plot Size(Acre)</th>
                        <th>N°of Stools</th>
                        <th>Date Planted</th>
                        <th>Variety</th>
                        <th>Stage Of Maturity</th>
                        <th>Expected Harvest Date(S)</th>
                        <th>Expect-Ed Yield</th>
                        <th>Activities Carried Out By Farmers</th>
                        <th>Type Quantity Of Assistance Received From Moa</th>
                        <th>N°Farm Visits</th>
                        <th>Remarks</th>

                    </thead>
                    <tbody id="tbody_crestWDC_report">
                    </tbody>
                    <tfoot>

                        <th>Registration Number</th>
                        <th>Created by</th>
                        <th>Farmer Name</th>
                        <th>Parcel Address</th>
                        <th>Parcel Number</th>
                        <th>Parish</th>
                        <th>Village</th>
                        <th>Complementary Address</th>
                        <th>Crop Name</th>
                        <th>Plot Size(Acre)</th>
                        <th>N°of Stools</th>
                        <th>Date Planted</th>
                        <th>Variety</th>
                        <th>Stage Of Maturity</th>
                        <th>Expected Harvest Date(S)</th>
                        <th>Expect-Ed Yield</th>
                        <th>Activities Carried Out By Farmers</th>
                        <th>Type Quantity Of Assistance Received From Moa</th>
                        <th>N°Farm Visits</th>
                        <th>Remarks</th>

                    </tfoot>
                </table>


            </div>
            <div id="table_2" class="table-responsive d-none ">
                <table id="listFR_consolidation_table_report" class="display" style="width:100%">
                    <thead>

                        <th>Registration Date</th>
                        <th>Created By</th>
                        <th>Parish</th>
                        <th>Village</th>
                        <th>Complementary / address</th>
                        <th>Name of Road</th>
                        <th>Approximate Length</th>
                        <th>N° of Farmer Using Road</th>
                        <th>Agricultural Activities</th>
                        <th>Work to be Done</th>
                        <th>Remarks</th>

                    </thead>
                    <tbody id="tbody_froad_report">
                    </tbody>
                    <tfoot>

                        <th>Registration Date</th>
                        <th>Created By</th>
                        <th>Parish</th>
                        <th>Village</th>
                        <th>Complementary / address</th>
                        <th>Name of Road</th>
                        <th>Approximate Length</th>
                        <th>N° of Farmer Using Road</th>
                        <th>Agricultural Activities</th>
                        <th>Work to be Done</th>
                        <th>Remarks</th>

                    </tfoot>
                </table>
            </div>
            <div id="table_3" class="table-responsive d-none">
                <table id="pestapp_consolidation_table_report" class="display" style="width:100%">
                    <thead>
                        <th>Created By</th>
                        <th>Supervisor signature</th>
                        <th>Farmer Name</th>
                        <th>Address</th>
                        <th>Phone #</th>
                        <th>Date</th>
                        <th>Comments</th>
                    </thead>
                    <tfoot>
                        <th>Created By</th>
                        <th>Supervisor signature</th>
                        <th>Farmer Name</th>
                        <th>Address</th>
                        <th>Phone #</th>
                        <th>Date</th>
                        <th>Comments</th>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>