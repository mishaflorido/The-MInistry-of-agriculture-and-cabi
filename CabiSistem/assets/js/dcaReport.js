var dca_table;
var dca_toPOMS_table;
$(document).ready(function () {
    setInterval(function () {
        dca_toPOMS_table.ajax.reload();
    }, 180000);

    dca_toPOMS_table = $('#table_dcatoPOMS').DataTable({
        select: {
            style: 'single',
            blurable: true
        },
        stateSave: true,
        dom: 'Bfrtip',
        pagingType: "input",
        buttons: [
            {

                text: 'Individual form print',
                titleAttr: "Individual form print",
                action: function () {
                    var dca = dca_toPOMS_table.row({ selected: true }).data();
                    if (dca == null) {
                        alert("Please select a row to create PDF");
                    }
                    else {
                        to_pdf_dcaform(dca);
                    }

                }
            },
            {
                extend: 'print',
                text: "Print Table"
            },
            {

                text: 'Edit Row',
                titleAttr: "Edit register",
                action: function () {
                    var dca = dca_toPOMS_table.row({ selected: true }).data();
                    if (dca == null) {
                        alert("Please select a row to Edit");
                    }
                    else {
                        edit_row_dcaform(dca);
                    }

                }
            },
            {
                extend: 'excel',
                title: 'Excel_POMS_format',
                text: 'Excel'
            },
            {

                text: 'Delete Row',
                titleAttr: "Delete Register",
                action: function () {

                    var dca = dca_toPOMS_table.row({ selected: true }).data();
                    if (dca == null) {
                        alert("Please select a row to Delet");
                    }
                    else {
                        if (confirm("Want to Delete the row?")) {
                            delete_row_dcaform(dca);
                        }

                    }
                }
            }

        ],
        ajax: {
            method: "GET",
            url: "get/dca",
            dataSrc: ""

        },
        columns: [

            { data: 'date_dcaform' },
            { data: 'cli_det' },
            { data: 'pdoc_name' },
            { data: 'farm_name_dca' },
            { data: 'f_sex_dca' },
            { data: 'f_age_dca' },
            { data: 'name_lv1' },
            { data: 'name_lv2' },
            { data: 'name_lv3' },
            { data: 'phone_n_dca' },
            { data: 'Crop_name' },
            { data: 'name_variety' },
            { data: 'sb_dca' },
            { data: 'dev_stage' },
            { data: 'pp_afected' },
            { data: 'yfs_dca' },
            { data: 'area_planted' },
            { data: 'unit_ap' },
            { data: 'per_cafected' },
            { data: 'symtoms' },
            { data: 'sym_dist' },
            { data: 'desc_problem' },
            { data: 'type_problem' },
            { data: 'diagnosis' },
            { data: 'Cur_cnt' },
            { data: 'rec_type' },
            { data: 'rec_curp' },
            { data: 'rec_prevp' },
            { data: 's_tolab' },
            { data: 'sheet_giv' },
            { data: 'field_v' },
            { data: 'Latitude' },
            { data: 'Longitude' },

        ],
        columnDefs: [
            {
                targets: [12],
                data: 'sb_dca',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>Yes</span>"
                    }
                    else {
                        return "<span>No</span>"
                    }


                }

            },
            {
                targets: [24],
                data: 'Cur_cnt',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>Yes</span>"
                    }
                    else {
                        return "<span>No</span>"
                    }


                }

            },
            {
                targets: [28],
                data: 's_tolab',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>Yes</span>"
                    }
                    else {
                        return "<span>No</span>"
                    }


                }

            },
            {
                targets: [29],
                data: 'sheet_giv',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>Yes</span>"
                    }
                    else {
                        return "<span>No</span>"
                    }


                }

            },
            {
                targets: [30],
                data: 'field_v',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>Yes</span>"
                    }
                    else {
                        return "<span>No</span>"
                    }


                }

            },
        ]

    });

});
function to_pdf_dcaform(dca) {
    let doc = new jsPDF('p', 'mm', 'a4');


    doc.setFont('helvetica');
    doc.setFontType('bold');
    doc.text(15, 10, 'THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES');
    doc.setFontSize(10);
    // clinic information
    doc.rect(10, 30, 190, 8)
    // doc.setFontType('bold');
    doc.setFontType('normal');
    doc.text(12, 28, 'Clinic information ');
    doc.text(14, 35, 'Date: ' + dca["date_dcaform"]);
    doc.text(65, 35, 'Clinic Code: ' + dca['cli_det']);
    doc.text(120, 35, 'Plant Doctor: ' + dca['pdoc_name'] + " " + dca['pdoc_lastname']);
    // Farmer information
    doc.rect(10, 45, 190, 20)
    doc.text(12, 44, 'Clinic information ');
    doc.text(14, 49, 'Name: ' + dca['farm_name_dca']);
    doc.text(120, 49, 'Id Number: ' + dca['f_id_dca']);
    doc.text(14, 54, 'Parish: ' + dca["name_lv1"]);
    doc.text(14, 59, 'District: ' + dca["name_lv2"]);
    doc.text(14, 64, 'Village: ' + dca["name_lv3"]);
    doc.text(80, 54, 'Sex: ');


    if (dca['f_sex_dca'] == "Male") {
        doc.rect(88, 50, 4, 4)
        doc.text(89, 53, 'X');
        doc.rect(100, 50, 4, 4)
        doc.text(101, 53, '');
    } else {
        doc.rect(88, 50, 4, 4)
        doc.text(89, 53, '');
        doc.rect(100, 50, 4, 4)
        doc.text(101, 53, 'X');
    }
    doc.setFontSize(8);
    doc.text(93, 54, 'Male');
    doc.text(106, 54, 'Female');
    doc.setFontSize(10);

    doc.text(120, 54, 'Age: ');
    doc.setFontSize(8);
    doc.text(135, 54, '0-24');
    doc.text(150, 54, '25-49');
    doc.text(165, 54, '+50');
    doc.setFontSize(10);
    // console.log(dca['f_age_dca']);
    switch (dca['f_age_dca']) {
        case "Youth":
            doc.rect(129, 50, 4, 4)
            doc.text(130, 53, 'X');
            doc.rect(145, 50, 4, 4)
            doc.text(146, 53, '');
            doc.rect(160, 50, 4, 4)
            doc.text(161, 53, '');

            break;
        case "Senior":
            doc.rect(129, 50, 4, 4)
            doc.text(130, 53, '');
            doc.rect(145, 50, 4, 4)
            doc.text(146, 53, 'X');
            doc.rect(160, 50, 4, 4)
            doc.text(161, 53, '');

            break;
        case "Adult":
            doc.rect(129, 50, 4, 4)
            doc.text(130, 53, '');
            doc.rect(145, 50, 4, 4)
            doc.text(146, 53, '');
            doc.rect(160, 50, 4, 4)
            doc.text(161, 53, 'X');

            break;

        default:
            break;
    }


    doc.text(100, 64, 'Tel.: ' + dca['phone_n_dca']);
    // sample information
    doc.rect(10, 70, 190, 12)
    doc.text(12, 69, 'Sample information ');
    doc.text(14, 74, 'Crop: ' + dca['Crop_name']);
    doc.text(14, 79, 'Variety: ' + dca['name_variety']);
    doc.text(120, 79, 'Sample brought: ');

    doc.text(152, 79, 'Yes');
    doc.text(164, 79, 'No');
    doc.rect(147, 75, 4, 4)
    doc.rect(159, 75, 4, 4)
    if (dca['sb_dca'] == 1) {
        doc.text(148, 79, 'X');
    } else {
        doc.text(160, 79, 'X');

    }

    // development stage
    doc.rect(10, 87, 60, 12);
    doc.text(12, 86, 'Development stage: ');

    doc.setFontSize(8);
    doc.text(15, 91, 'Seeding');
    doc.rect(11, 88, 3, 3)
    doc.text(31, 91, 'Intermediate');
    doc.rect(27, 88, 3, 3)
    doc.text(52, 91, 'Flowering');
    doc.rect(48, 88, 3, 3)
    doc.text(15, 97, 'Fruiting');
    doc.rect(11, 94, 3, 3)
    doc.text(31, 97, 'Mature');
    doc.rect(27, 94, 3, 3)
    doc.text(52, 97, 'Post hasrvest');
    doc.rect(48, 94, 3, 3)
    doc.setFontSize(10);
    //Aca falta hacer la seleccion para poner la x
    var devestage = dca['dev_stage'].split(",");
    devestage.forEach(element => {
        switch (element) {
            case "Seeding":
                doc.text(11, 91, 'X');
                break;
            case "Intermediate":
                doc.text(27, 91, 'X');
                break;
            case "Flowering":
                doc.text(48, 91, 'X');
                break;
            case "Fruiting":
                doc.text(11, 97, 'X');
                break;
            case "Mature":
                doc.text(27, 97, 'X');
                break;
            case "Post hasrvest":
                doc.text(48, 97, 'X');
                break;

        }

    });



    // Part afected
    doc.rect(72, 87, 129, 12)
    doc.text(74, 86, 'Part afected: ');

    doc.setFontSize(8);
    doc.text(80, 91, 'Seed');
    doc.rect(75, 88, 3, 3)
    doc.text(100, 91, 'Root/Tuber');
    doc.rect(95, 88, 3, 3)
    doc.text(130, 91, 'Steem/Shot');
    doc.rect(125, 88, 3, 3)
    doc.text(150, 91, 'Twig/branch');
    doc.rect(146, 88, 3, 3)

    doc.text(80, 97, 'Leaf');
    doc.rect(75, 94, 3, 3)
    doc.text(100, 97, 'Flower');
    doc.rect(95, 94, 3, 3)
    doc.text(130, 97, 'Fruit/grain');
    doc.rect(125, 94, 3, 3)
    doc.text(150, 97, 'Whole plant');
    doc.rect(146, 94, 3, 3)
    doc.setFontSize(10);
    //Aca falta hacer la seleccion para poner la x
    var partAfect = dca['pp_afected'].split(",");
    partAfect.forEach(element => {
        switch (element) {
            case "Seed":
                doc.text(75, 91, 'X');
                break;
            case "Root/Tuber":
                doc.text(95, 91, 'X');
                break;
            case "Steem/Shot":
                doc.text(125, 91, 'X');
                break;
            case "Twig/branch":
                doc.text(146, 91, 'X');
                break;
            case "Leaf":
                doc.text(75, 97, 'X');
                break;
            case "Flower":
                doc.text(95, 97, 'X');
                break;
            case "Fruit/grain":
                doc.text(125, 97, 'X');
                break;
            case "Whole plant":
                doc.text(146, 97, 'X');
                break;

        }

    });

    // when afected
    doc.rect(10, 104, 110, 12)
    doc.text(12, 103, 'When First Seen an Area Affected: ');
    doc.setFontSize(8);
    doc.text(14, 108, 'Year first noticed: ' + dca['yfs_dca']);
    doc.text(14, 114, 'Area planted: ' + dca['area_planted']);
    doc.text(75, 108, 'Acres');
    doc.rect(70, 105, 3, 3)
    doc.text(90, 108, 'Hectares');
    doc.rect(85, 105, 3, 3)
    doc.text(75, 114, 'M2');
    doc.rect(70, 112, 3, 3)
    doc.text(90, 114, 'Plants');
    doc.rect(85, 112, 3, 3)
    //Aca falta hacer la seleccion para poner la x
    switch (dca['unit_ap']) {
        case "Acres":
            doc.text(70, 108, 'X');
            break;
        case "Hectares":
            doc.text(85, 108, 'X');
            break;
        case "m2":
            doc.text(70, 115, 'X');
            break;
        case "Plants":
            doc.text(85, 115, 'X');
            break;

    }




    doc.setFontSize(10);

    // % crop afected
    doc.rect(122, 104, 79, 12)
    doc.text(124, 103, '% crop afected: ');
    doc.setFontSize(8);

    doc.text(130, 111, '100%');
    doc.rect(126, 108, 3, 3)
    doc.text(145, 111, '75%');
    doc.rect(139, 108, 3, 3)
    doc.text(160, 111, '50%');
    doc.rect(156, 108, 3, 3)
    doc.text(175, 111, '25%');
    doc.rect(169, 108, 3, 3)
    doc.text(190, 111, '<25%');
    doc.rect(185, 108, 3, 3)
    //Aca falta hacer la seleccion para poner la x
    switch (dca['per_cafected']) {
        case '100%':
            doc.text(127, 111, 'X');
            break;
        case '75%':
            doc.text(140, 111, 'X');
            break;
        case '50%':
            doc.text(157, 111, 'X');
            break;
        case '25%':
            doc.text(170, 111, 'X');

            break;
        case '<25%':
            doc.text(186, 111, 'X');
            break;

    }
    // Major Symptom
    doc.setFontSize(10);
    doc.rect(10, 121, 190, 15)
    doc.text(12, 120, 'Mayor symptom: ');
    doc.setFontSize(8);
    doc.text(20, 125, 'Insect seen');
    doc.text(40, 125, 'Frass');
    doc.text(60, 125, 'Galls/swellings');
    doc.text(85, 125, 'Wilt');
    doc.text(105, 125, 'Stunted');
    doc.text(125, 125, 'Leaf spot');
    doc.text(150, 125, 'Slaining');
    doc.text(170, 125, 'Blistered');

    doc.text(20, 130, 'Mite seen');
    doc.text(40, 130, 'Webbing');
    doc.text(60, 130, 'Witches broom');
    doc.text(85, 130, 'Yellow');
    doc.text(105, 130, 'Leaf Fall');
    doc.text(125, 130, 'Suface growth');
    doc.text(150, 130, 'Rot');
    doc.text(170, 130, 'Distorted');

    doc.text(20, 135, 'Bore holes');
    doc.text(40, 135, 'Chewed');
    doc.text(60, 135, 'Dieback');
    doc.text(85, 135, 'Red');
    doc.text(105, 135, 'Pustule');
    doc.text(125, 135, 'Drying');
    doc.text(150, 135, 'Mosaic');
    doc.text(170, 135, 'Streak');

    doc.rect(16, 122, 3, 3);
    doc.rect(36, 122, 3, 3);
    doc.rect(56, 122, 3, 3);
    doc.rect(81, 122, 3, 3);
    doc.rect(101, 122, 3, 3);
    doc.rect(121, 122, 3, 3);
    doc.rect(146, 122, 3, 3);
    doc.rect(166, 122, 3, 3);

    doc.rect(16, 127, 3, 3);
    doc.rect(36, 127, 3, 3);
    doc.rect(56, 127, 3, 3);
    doc.rect(81, 127, 3, 3);
    doc.rect(101, 127, 3, 3);
    doc.rect(121, 127, 3, 3);
    doc.rect(146, 127, 3, 3);
    doc.rect(166, 127, 3, 3);

    doc.rect(16, 132, 3, 3);
    doc.rect(36, 132, 3, 3);
    doc.rect(56, 132, 3, 3);
    doc.rect(81, 132, 3, 3);
    doc.rect(101, 132, 3, 3);
    doc.rect(121, 132, 3, 3);
    doc.rect(146, 132, 3, 3);
    doc.rect(166, 132, 3, 3);

    //Aca falta hacer la seleccion para poner la x
    var majsimtoms = dca['symtoms'].split(",");
    majsimtoms.forEach(element => {
        switch (element) {
            case 'Insect seen':
                doc.text(16, 125, 'X');
                break;
            case 'Frass':
                doc.text(36, 125, 'X');
                break;
            case 'Galls/sweellings':
                doc.text(56, 125, 'X');
                break;
            case 'Wilt':
                doc.text(81, 125, 'X');
                break;
            case 'Stunted':
                doc.text(101, 125, 'X');
                break;
            case 'Leaf spot':
                doc.text(121, 125, 'X');
                break;
            case 'Slaining':
                doc.text(146, 125, 'X');
                break;
            case 'Blistered':
                doc.text(166, 125, 'X');
                break;
            case 'Mite seen':
                doc.text(16, 130, 'X');
                break;
            case 'Webbing':
                doc.text(36, 130, 'X');
                break;
            case 'Witches broom':
                doc.text(56, 130, 'X');
                break;
            case 'Yellow':
                doc.text(81, 130, 'X');
                break;
            case 'Leaf Fall':
                doc.text(101, 130, 'X');
                break;
            case 'Suface growth':
                doc.text(121, 130, 'X');
                break;
            case 'Rot':
                doc.text(146, 130, 'X');
                break;
            case 'Distorted':
                doc.text(166, 130, 'X');
                break;
            case 'Bore holes':
                doc.text(16, 135, 'X');
                break;
            case 'Chewed':
                doc.text(36, 135, 'X');
                break;

            case 'Dieback':
                doc.text(56, 135, 'X');
                break;
            case 'Red':
                doc.text(81, 135, 'X');
                break;

            case 'Pustule':
                doc.text(101, 135, 'X');
                break;
            case 'Drying':
                doc.text(121, 135, 'X');
                break;

            case 'Mosaic':
                doc.text(146, 135, 'X');
                break;
            case 'Streak':
                doc.text(166, 135, 'X');
                break;

        }

    });
    // Distribution of symptom
    doc.setFontSize(10);
    doc.rect(10, 141, 190, 5)
    doc.text(12, 140, 'Distribution of symptom: ');

    doc.setFontSize(8);
    doc.text(18, 145, 'Localised');
    doc.text(40, 145, 'Scattered');
    doc.text(60, 145, 'Linear');
    doc.text(75, 145, 'Field margin');
    doc.text(95, 145, 'Even');
    doc.text(110, 145, 'Certain varieties');
    doc.text(140, 145, 'Individual plants');
    doc.text(165, 145, 'High areas');
    doc.text(185, 145, 'Low areas');

    doc.rect(14, 142, 3, 3);
    doc.rect(36, 142, 3, 3);
    doc.rect(56, 142, 3, 3);
    doc.rect(71, 142, 3, 3);
    doc.rect(91, 142, 3, 3);
    doc.rect(106, 142, 3, 3);
    doc.rect(136, 142, 3, 3);
    doc.rect(161, 142, 3, 3);
    doc.rect(181, 142, 3, 3);

    //Aca falta hacer la seleccion para poner la x
    var distSimptoms = dca['sym_dist'].split(",");
    distSimptoms.forEach(element => {
        switch (element) {
            case 'Localised':
                doc.text(14, 145, 'X');
                break;
            case 'Scattered':
                doc.text(36, 145, 'X');
                break;
            case 'Linear':
                doc.text(56, 145, 'X');
                break;
            case 'Field margin':
                doc.text(71, 145, 'X');
                break;
            case 'Even':
                doc.text(91, 145, 'X');
                break;
            case 'Certain varieties':
                doc.text(106, 145, 'X');
                break;
            case 'Individual plants':
                doc.text(136, 145, 'X');
                break;
            case 'High areas':
                doc.text(161, 145, 'X');
                break;
            case 'Low areas':
                doc.text(181, 145, 'X');
                break;
        }

    });

    // Describe problem 
    doc.setFontSize(10);
    doc.rect(10, 151, 190, 15)
    doc.text(12, 150, 'Describe problem: ');

    doc.setFontSize(8);
    doc.text(14, 155, '(Adtional information - Include key observed symptoms, plan part afected, etc  ');
    doc.text(dca['desc_problem'], 14, 158, { maxWidth: 180, align: "left" });


    // Type of problem
    doc.setFontSize(10);
    doc.rect(10, 171, 190, 12)
    doc.text(12, 170, 'Type of problem: ');

    doc.setFontSize(8);
    doc.text(18, 175, 'Fungus');
    doc.text(40, 175, 'Bacterium');
    doc.text(60, 175, 'Insecto');
    doc.text(75, 175, 'Mollusc');
    doc.text(95, 175, 'Nematode');
    doc.text(115, 175, 'Weed');
    doc.text(150, 175, 'Other');
    doc.text(160, 175, dca['prob_type_other']);
    doc.line(160, 176, 195, 176);


    doc.text(18, 180, 'Water mould');
    doc.text(40, 180, 'Virus');
    doc.text(60, 180, 'Mite');
    doc.text(75, 180, 'Bird');
    doc.text(95, 180, 'Mammal');
    doc.text(115, 180, 'Nutrient deficiency');
    doc.text(150, 180, 'Unknow');


    doc.rect(14, 172, 3, 3);
    doc.rect(36, 172, 3, 3);
    doc.rect(56, 172, 3, 3);
    doc.rect(71, 172, 3, 3);
    doc.rect(91, 172, 3, 3);
    doc.rect(111, 172, 3, 3);
    doc.rect(146, 172, 3, 3);

    doc.rect(14, 178, 3, 3);
    doc.rect(36, 178, 3, 3);
    doc.rect(56, 178, 3, 3);
    doc.rect(71, 178, 3, 3);
    doc.rect(91, 178, 3, 3);
    doc.rect(111, 178, 3, 3);
    doc.rect(146, 178, 3, 3);

    //Aca falta hacer la seleccion para poner la x
    var type_prob = dca['type_problem'].split(",");
    type_prob.forEach(element => {
        switch (element) {
            case "Fungus":
                doc.text(14, 175, 'X');
                break;
            case "Bacterium":
                doc.text(36, 175, 'X');
                break;
            case "Insecto":
                doc.text(56, 175, 'X');
                break;
            case "Mollusc":
                doc.text(71, 175, 'X');
                break;
            case "Nematode":
                doc.text(91, 175, 'X');
                break;
            case "Weed":
                doc.text(111, 175, 'X');
                break;
            case "Other":
                doc.text(146, 175, 'X');
                break;
            case "Water mould":
                doc.text(14, 181, 'X');
                break;
            case "Virus":
                doc.text(36, 181, 'X');
                break;
            case "Mite":
                doc.text(56, 181, 'X');
                break;
            case "Bird":
                doc.text(71, 181, 'X');
                break;
            case "Mammal":
                doc.text(91, 181, 'X');
                break;
            case "Nutrient deficiency":
                doc.text(111, 181, 'X');
                break;
            case "Unknow":
                doc.text(146, 181, 'X');
                break;
        }

    });


    // Diagnosis
    doc.setFontSize(10);
    doc.rect(10, 187, 190, 5)
    doc.text(12, 186, 'Diagnosis: ');
    doc.setFontSize(8);
    doc.text(30, 186, '(start a new sheet for each new problem) ');
    doc.text(dca['diagnosis'], 12, 190, { maxWidth: 180, align: "left" });



    // Current control
    doc.setFontSize(10);
    doc.rect(10, 196, 190, 5)
    doc.text(12, 195, 'Current control: ');
    if (dca['Cur_cnt'] == 1) {
        doc.text(40, 200, 'Yes');
    } else {
        doc.text(40, 200, 'No');
    }
    doc.setFontSize(8);
    doc.text(12, 200, 'Practices used');



    // Recommendation for management:
    doc.setFontSize(10);
    doc.rect(10, 206, 190, 60)
    doc.text(12, 205, 'Recommendation for management: ');

    doc.setFontSize(8);
    doc.text(20, 211, 'Monitoring');
    doc.text(40, 211, 'Cultural');
    doc.text(55, 211, 'Biological');
    doc.text(75, 211, 'Resistant');
    doc.text(75, 214, 'varieties');
    doc.text(95, 211, 'Fungicide');
    doc.text(115, 211, 'Insecticide/');
    doc.text(115, 214, 'acaricide');
    doc.text(135, 211, 'Herbicide');
    doc.text(155, 211, 'Botanical');
    doc.text(175, 211, 'Fertilizer');
    doc.text(190, 211, 'Other');
    doc.line(160, 218, 196, 218);
    doc.text(160, 217, dca['rec_type_other']);


    doc.rect(16, 209, 3, 3);
    doc.rect(36, 209, 3, 3);
    doc.rect(51, 209, 3, 3);
    doc.rect(71, 209, 3, 3);
    doc.rect(91, 209, 3, 3);
    doc.rect(111, 209, 3, 3);
    doc.rect(131, 209, 3, 3);
    doc.rect(151, 209, 3, 3);
    doc.rect(171, 209, 3, 3);
    doc.rect(187, 209, 3, 3);

    //Aca falta hacer la seleccion para poner la x
    var rec_manag = dca['rec_type'].split(",");
    rec_manag.forEach(element => {
        switch (element) {
            case "Monitoring":
                doc.text(16, 212, 'X');
                break;

            case "Cultural":
                doc.text(36, 212, 'X');
                break;

            case "Biological":
                doc.text(51, 212, 'X');
                break;

            case "Resistant varieties":
                doc.text(71, 212, 'X');
                break;

            case "Fungicide":
                doc.text(91, 212, 'X');
                break;

            case "Insecticide/acaricide":
                doc.text(111, 212, 'X');
                break;

            case "Herbicide":
                doc.text(131, 212, 'X');
                break;

            case "Botanical":
                doc.text(151, 212, 'X');
                break;
            case "Fertilizer":
                doc.text(171, 212, 'X');
                break;
            case "Other":
                doc.text(187, 212, 'X');
                break;

        }

    });
    doc.setFontSize(9);
    doc.text(dca["rec_curp"], 14, 222, { maxWidth: 180, align: "left" });
    doc.text(dca["rec_prevp"], 14, 249, { maxWidth: 180, align: "left" });
    doc.setFontSize(10);
    doc.text(14, 218, 'Recommendation for the current problem: ');
    doc.text(14, 245, 'Recommendation to prevent this problem for the current problem: ');

    doc.text(14, 275, 'Followup activities: ');

    doc.setFontSize(8);
    doc.text(55, 272, 'Sample sent to lab: ');
    doc.rect(55, 273, 23, 6);
    doc.text(60, 277, 'Yes');
    doc.text(71, 277, 'No');
    doc.rect(56, 274, 3, 3);
    doc.rect(67, 274, 3, 3);
    if (dca['s_tolab'] == 1) {
        doc.text(57, 277, 'X');
    } else {

        doc.text(68, 277, 'X');
    }

    doc.text(90, 272, 'Factsheet given: ');
    doc.rect(90, 273, 23, 6);
    doc.text(96, 277, 'Yes');
    doc.text(107, 277, 'No');
    doc.rect(92, 274, 3, 3);
    doc.rect(103, 274, 3, 3);
    if (dca['sheet_giv'] == 1) {
        doc.text(93, 277, 'X');
    } else {
        doc.text(104, 277, 'X');
    }


    doc.text(120, 272, 'Fiel visit arranged: ');
    doc.rect(120, 273, 23, 6);
    doc.text(126, 277, 'Yes');
    doc.text(137, 277, 'No');
    doc.rect(122, 274, 3, 3);
    doc.rect(133, 274, 3, 3);
    if (dca['field_v'] == 1) {
        doc.text(123, 277, 'X');
    } else {
        doc.text(134, 277, 'X');
    }

    doc.rect(170, 273, 30, 6);

    window.open(doc.output('bloburl'));
}
function edit_row_dcaform(data) {
    console.log("edit_row_dcaform");
    $("#dca_form").collapse("toggle");
    $("input[name='coordinates_lat']").val(data['Latitude']);
    $("input[name='coordinates_lng']").val(data["Longitude"]);
    $("input[name='id_dca_form']").val(data['id_dca_form']).trigger('change');
    $("#cli_det option").each(function () {
        if ($(this).val() == data["cli_det"]) {
            $(this).attr("selected", true);
        }

    })
    $("input[name='farm_name_dca']").val(data["farm_name_dca"]);
    $("input[name='id_plant_doc']").val(data['pdoc_name'] + " " + data["pdoc_lastname"]);
    $("input[name='phone_n_dca']").val(data["phone_n_dca"]);
    $("input[name='f_sex_dca']").val(data["f_sex_dca"]);
    $("input[name='f_id_dca']").val(data["f_id_dca"]);
    if (data["f_sex_dca"] == "Female") {
        $("#f_sex_dca_fem").attr("checked", 'checked');
    } else {
        $("#f_sex_dca_male").attr("checked", 'checked');
    }
    switch (data['f_age_dca']) {
        case "Adult":
            $("#adult_inp").attr("checked", "checked");

            break;
        case "Senior":
            $("#senior_inp").attr("checked", "checked");

            break;
        case "Youth":
            $("#youth_inp").attr("checked", "checked");

            break;

    }
    $("#county_list_id option").each(function () {
        if ($(this).val() == data["id_lv1"]) {
            $(this).attr("selected", "selected").trigger("change");
        }
    })
    $("#sub_county_list_id option").each(function () {
        if ($(this).val() == data["id_lv2"]) {
            $(this).attr("selected", "selected").trigger("change");
        }
    })
    $("#village_id option").each(function () {
        if ($(this).val() == data["id_lv3"]) {
            $(this).attr("selected", "selected").trigger("change");
        }
    })
    $("#crop_dca option").each(function () {
        if ($(this).attr("id") == data["id_crop"]) {
            $("input[name='id_crop']").val($(this).val()).trigger("change");
        }
    })
    $("#list_dca_variety option").each(function () {
        if ($(this).attr("id") == data["id_variety"]) {
            $("input[name='id_variety']").val($(this).val()).trigger("change");
        }
    })
    if (data["sb_dca"] == 1) {
        $("#sb_dca_yes").attr("checked", true);

    } else {
        $("#sb_dca_no").attr("checked", true);
    }
    var dev_stage = data["dev_stage"].split(",");
    dev_stage.forEach(element => {

        switch (element) {
            case "Seeding":
                $("#id-Seeding").attr("checked", "checked");
                break;
            case "Intermediate":
                $("#id-Intermediate").attr("checked", "checked");
                break;
            case "Flowering":
                $("#id-Flowering").attr("checked", "checked");
                break;
            case "Fruiting":
                $("#id-Fruiting").attr("checked", "checked");
                break;
            case "Mature":
                $("#id-Mature").attr("checked", "checked");
                break;
            case "Post hasrvest":
                $("#id-Postharvest").attr("checked", "checked");
                break;

        }
    })
    var pp_afected = data["pp_afected"].split(",");
    pp_afected.forEach(element => {
        switch (element) {
            case "Seed":
                $("#id-Seed").attr("checked", "checked");
                break;
            case "Root/Tuber":
                $("#id-RootTuber").attr("checked", "checked");
                break;
            case "Steem/Shot":
                $("#id-SteemShot").attr("checked", "checked");
                break;
            case "Twig/branch":
                $("#id-Twigbranch").attr("checked", "checked");
                break;
            case "Leaf":
                $("#id-Leaf").attr("checked", "checked");
                break;
            case "Flower":
                $("#id-Flower").attr("checked", "checked");
                break;
            case "Fruit/grain":
                $("#id-Fruitgrain").attr("checked", "checked");
                break;
            case "Whole plant":
                $("#id-Whole plant").attr("checked", "checked");
                break;

        }

    });
    $("input[name='yfs_dca']").val(data["yfs_dca"]);
    $("input[name='area_planted']").val(data["area_planted"]);
    $("select[name='unit_ap'] option").each(function () {
        console.log($(this).val());
        if ($(this).val() == data['unit_ap']) {
            $(this).attr("selected", "selected");
        }
    });
    $("select[name='per_cafected'] option").each(function () {
        if ($(this).val() == data['per_cafected']) {
            $(this).attr("selected", "selected");
        }
    });
    var majsimtoms = data['symtoms'].split(",");
    majsimtoms.forEach(element => {
        switch (element) {
            case 'Insect seen':
                $("#id-Insectseen").attr("checked", "checked");
                break;
            case 'Frass':
                $("#id-Frass").attr("checked", "checked");
                break;
            case 'Galls/sweellings':
                $("#id-Gallssweellings").attr("checked", "checked");
                break;
            case 'Wilt':
                $("#id-Wilt").attr("checked", "checked");
                break;
            case 'Stunted':
                $("#id-Stunted").attr("checked", "checked");
                break;
            case 'Leaf spot':
                $("#id-Leafspot").attr("checked", "checked");
                break;
            case 'Slaining':
                $("#id-Slaining").attr("checked", "checked");
                break;
            case 'Blistered':
                $("#id-Blistered").attr("checked", "checked");
                break;
            case 'Mite seen':
                $("#id-Miteseen").attr("checked", "checked");
                break;
            case 'Webbing':
                $("#id-Webbing").attr("checked", "checked");
                break;
            case 'Witches broom':
                $("#id-Witchesbroom").attr("checked", "checked");
                break;
            case 'Yellow':
                $("#id-Yellow").attr("checked", "checked");
                break;
            case 'Leaf Fall':
                $("#id-LeafFall").attr("checked", "checked");
                break;
            case 'Suface growth':
                $("#id-Sufacegrowth").attr("checked", "checked");
                break;
            case 'Rot':
                $("#id-Rot").attr("checked", "checked");
                break;
            case 'Distorted':
                $("#id-Distorted").attr("checked", "checked");
                break;
            case 'Bore holes':
                $("#id-Boreholes").attr("checked", "checked");
                break;
            case 'Chewed':
                $("#id-Chewed").attr("checked", "checked");
                break;

            case 'Dieback':
                $("#id-Dieback").attr("checked", "checked");
                break;
            case 'Red':
                $("#id-Red").attr("checked", "checked");
                break;

            case 'Pustule':
                $("#id-Pustule").attr("checked", "checked");
                break;
            case 'Drying':
                $("#id-Drying").attr("checked", "checked");
                break;

            case 'Mosaic':
                $("#id-Mosaic").attr("checked", "checked");
                break;
            case 'Streak':
                $("#id-Streak").attr("checked", "checked");
                break;

        }

    });
    var distSimptoms = data['sym_dist'].split(",");
    distSimptoms.forEach(element => {
        switch (element) {
            case 'Localised':
                $("#id-Localised").attr("checked", "checked");
                break;
            case 'Scattered':
                $("#id-Scattered").attr("checked", "checked");
                break;
            case 'Linear':
                $("#id-Linear").attr("checked", "checked");
                break;
            case 'Field margin':
                $("#id-Fieldmargin").attr("checked", "checked");
                break;
            case 'Even':
                $("#id-Even").attr("checked", "checked");
                break;
            case 'Certain varieties':
                $("#id-Certain varieties").attr("checked", "checked");
                break;
            case 'Individual plants':
                $("#id-Individual plants").attr("checked", "checked");
                break;
            case 'High areas':
                $("#id-Highareas").attr("checked", "checked");
                break;
            case 'Low areas':
                $("#id-Lowareas").attr("checked", "checked");
                break;
        }

    });
    $("textarea[name='desc_problem']").val(data['desc_problem']);
    var type_prob = data['type_problem'].split(",");
    type_prob.forEach(element => {
        switch (element) {
            case "Fungus":
                $("#id-Fungus").attr("checked", "checked");
                break;
            case "Bacterium":
                $("#id-Bacterium").attr("checked", "checked");
                break;
            case "Insecto":
                $("#id-Insecto").attr("checked", "checked");
                break;
            case "Mollusc":
                $("#id-Mollusc").attr("checked", "checked");
                break;
            case "Nematode":
                $("#id-Nematode").attr("checked", "checked");
                break;
            case "Weed":
                $("#id-Weed").attr("checked", "checked");
                break;
            case "Other":
                $("#id-Other").attr("checked", "checked");
                break;
            case "Water mould":
                $("#id-Watermould").attr("checked", "checked");
                break;
            case "Virus":
                $("#id-Virus").attr("checked", "checked");
                break;
            case "Mite":
                $("#id-Mite").attr("checked", "checked");
                break;
            case "Bird":
                $("#id-Bird").attr("checked", "checked");
                break;
            case "Mammal":
                $("#id-Mammal").attr("checked", "checked");
                break;
            case "Nutrient deficiency":
                $("#id-Nutrientdeficiency").attr("checked", "checked");
                break;
            case "Unknow":
                $("#id-Unknow").attr("checked", "checked");
                break;
        }

    });
    // $("#").val(data[''])
    $("input[name='diagnosis']").val(data['diagnosis']);
    switch (data['Cur_cnt']) {
        case '1':
            $("#id_Cur_cnt_yes").attr("checked", "checked");

            break;

        default:
            $("#id_Cur_cnt_no").attr("checked", "checked");
            break;
    }
    var rec_manag = data['rec_type'].split(",");
    rec_manag.forEach(element => {
        switch (element) {
            case "Monitoring":
                $("#id-Monitoring").attr("checked", "checked");
                break;

            case "Cultural":
                $("#id-Cultural").attr("checked", "checked");
                break;

            case "Biological":
                $("#id-Biological").attr("checked", "checked");
                break;

            case "Resistant varieties":
                $("#id-Resistantvarieties").attr("checked", "checked");
                break;

            case "Fungicide":
                $("#id-Fungicide").attr("checked", "checked");
                break;

            case "Insecticide/acaricide":
                $("#id-Insecticideacaricide").attr("checked", "checked");
                break;

            case "Herbicide":
                $("#id-Herbicide").attr("checked", "checked");
                break;

            case "Botanical":
                $("#id-Botanical").attr("checked", "checked");
                break;
            case "Fertilizer":
                $("#id-Fertilizer").attr("checked", "checked");
                break;
            case "Other":
                $("#id-Other").attr("checked", "checked");
                break;

        }

    });
    $("input[name='rec_curp']").val(data["rec_curp"]);
    $("input[name='rec_prevp']").val(data['rec_prevp']);
    switch (data["s_tolab"]) {
        case 1:
            $("#id_stlb_yes").attr("checked", "checked");

            break;

        default:
            $("#id_stlb_no").attr("checked", "checked");
            break;
    }
    switch (data["sheet_giv"]) {
        case 1:
            $("#sheet_giv_yes").attr("checked", "checked");

            break;

        default:
            $("#sheet_giv_no").attr("checked", "checked");
            break;
    }
    switch (data["field_v"]) {
        case 1:
            $("#field_v_yes").attr("checked", "checked");

            break;

        default:
            $("#field_v_no").attr("checked", "checked");
            break;
    }
    // $("input[name='farm_name_dca']").val(data["farm_name_dca"]);
}
function delete_row_dcaform(data) {

    $.ajax({
        url: 'delete/dca_form',
        type: "POST",
        data: {
            'id_dca_form': data['id_dca_form'],

        },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (respuesta) {
            console.log(respuesta);
        }
    })
    reload_dca_table();
}