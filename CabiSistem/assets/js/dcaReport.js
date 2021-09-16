var dca_table;
$(document).ready(function () {


    dca_table = $('#dca_table_report').DataTable({
        select: {
            style: 'single',
            blurable: true
        },
        stateSave: true,
        dom: 'Bfrtip',
        pagingType: "input",
        buttons: [
            {

                text: 'PDF',
                titleAttr: "To PDF",
                action: function () {
                    var farmer = table.row({ selected: true }).data();

                    to_pdf_farmer(farmer);

                }
            },
            'excel', 'print'
        ],
        ajax: {
            method: "GET",
            url: "get/dca",
            dataSrc: ""

        },
        columns: [

            { data: 'farm_name_dca' },
            { data: 'phone_n_dca' },
            { data: 'f_sex_dca' },
            { data: 'name_lv2' },
            { data: 'Crop_name' },
            { data: 'symtoms' },
            { data: 'type_problem' },
            { data: 'diagnosis' },
            { data: 'rec_curp' },
        ],
        columnDefs: [
            {
                targets: [0],
                data: 'farm_name_dca',
                render: function (data, type, row) {
                    return "<span>NAME: &nbsp; " + data + " <br> ID: &nbsp; " + row.f_id_dca + " </span><input class='id_dca_form' type='hidden' name='id_dca_form' value=" + row.id_dca_form + ">"


                }

            },
            {
                targets: [2],
                data: 'f_sex_dca',
                render: function (data, type, row) {
                    return "<span> SEX: &nbsp;" + data + " <br> AGE: " + row.f_age_dca + "</span>"


                }

            },
            {
                targets: [3],
                data: 'name_lv2',
                render: function (data, type, row) {
                    return "<span> Sub-County: &nbsp;" + data + " <br> Village: " + row.name_lv3 + "</span>"


                }

            },
            {
                targets: [4],
                data: 'Crop_name',
                render: function (data, type, row) {
                    return "<span> Crop: &nbsp;" + data + " <br> Variety: " + row.name_variety + "</span>"


                }

            },
            // {
            //     targets: [6],
            //     data: 'sex',
            //     render: function (data, type, row) {
            //         if (data == 1) {
            //             return "<span>Female</span>"
            //         }
            //         if (data == 2) {
            //             return "<span>Male</span>"
            //         }


            //     }

            // },

            // {
            //     targets: [9],
            //     data: 'parcel_num',
            //     render: function (data, type, row) {
            //         return "<span><i class='fas fa-hashtag'></i>&nbsp;" + data + "</span>"


            //     }

            // },
            // {
            //     targets: [10],
            //     data: 'go_market',
            //     render: function (data, type, row) {
            //         if (data == 1) {
            //             return "<span>YES</span>"
            //         }
            //         if (data == 0) {
            //             return "<span>NO</span>"
            //         }


            //     }

            // },
            // {
            //     targets: [11],
            //     data: 'boundary',
            //     render: function (data, type, row) {
            //         if (data == 1) {
            //             return "<span>KNOW</span>"
            //         }
            //         if (data == 0) {
            //             return "<span>UNKNOW</span>"
            //         }


            //     }

            // },
            // {
            //     targets: [12],
            //     data: 'fe_pump',
            //     render: function (data, type, row) {
            //         var cadena = "<span>";
            //         if (data == 1) {
            //             cadena += "Pump ";
            //         }
            //         if (row.fe_irrig_line == 1) {
            //             cadena += "Irrigator Line ";
            //         }
            //         if (row.fe_other == 1) {
            //             cadena += "Other ";
            //         }
            //         cadena += "</span>";
            //         return cadena;

            //     }

            // },



            // {
            //     targets: [5],
            //     data: 'phone_num',
            //     render: function (data, type, row) {
            //         if (data == 'Activo') {
            //             return "<span class='badge bg-success'>" + data + "</span>"
            //         } else if (data == 'Inactivo') {
            //             return "<span class='badge bg-danger'>" + data + "</span>"
            //         }
            //     }

            // },
        ]
    });

});