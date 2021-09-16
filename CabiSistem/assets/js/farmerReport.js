let rows = [];
$(document).ready(function () {


    var table = $('#farmer_table_report').DataTable({
        select: {
            style: 'single',
            blurable: true
        },
        stateSave: true,
        dom: 'Bfrtip',
        pagingType: "input",
        buttons: [
            {

                text: '<i class="fas fa-trash-o" aria-hidden="true"></i>',
                titleAttr: "Eliminar",
                action: function () {
                    var farmer = table.row({ selected: true }).data();

                    to_pdf_dcaform(farmer);

                }
            },
            'excel', 'print'
        ],
        ajax: {
            method: "GET",
            url: "get/farmer",
            dataSrc: ""

        },
        columns: [

            { data: 'date_reg' },
            { data: 'name' },
            { data: 'AKA' },
            { data: 'birthdate' },
            { data: 'address' },
            { data: 'phone_num' },
            { data: 'sex' },
            { data: 'name_lv3' },
            { data: 'watershed' },
            { data: 'parcel_num' },
            { data: 'go_market' },
            { data: 'boundary' },
            { data: 'fe_pump' },

        ],
        columnDefs: [
            {
                targets: [1],
                data: 'name',
                render: function (data, type, row) {
                    return "<span></i>" + data + " " + row.last_name + " " + row.mo_last_name + "</span><input class='id_farm' type='hidden' name='id_farm_other' value=" + row.id_farm + ">"


                }

            },
            {
                targets: [2],
                data: 'AKA',
                render: function (data, type, row) {
                    return "<span><i class='fas fa-hashtag'></i>&nbsp;" + data + "</span>"


                }

            },
            {
                targets: [6],
                data: 'sex',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>Female</span>"
                    }
                    if (data == 2) {
                        return "<span>Male</span>"
                    }


                }

            },

            {
                targets: [9],
                data: 'parcel_num',
                render: function (data, type, row) {
                    return "<span><i class='fas fa-hashtag'></i>&nbsp;" + data + "</span>"


                }

            },
            {
                targets: [10],
                data: 'go_market',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>YES</span>"
                    }
                    if (data == 0) {
                        return "<span>NO</span>"
                    }


                }

            },
            {
                targets: [11],
                data: 'boundary',
                render: function (data, type, row) {
                    if (data == 1) {
                        return "<span>KNOW</span>"
                    }
                    if (data == 0) {
                        return "<span>UNKNOW</span>"
                    }


                }

            },
            {
                targets: [12],
                data: 'fe_pump',
                render: function (data, type, row) {
                    var cadena = "<span>";
                    if (data == 1) {
                        cadena += "Pump ";
                    }
                    if (row.fe_irrig_line == 1) {
                        cadena += "Irrigator Line ";
                    }
                    if (row.fe_other == 1) {
                        cadena += "Other ";
                    }
                    cadena += "</span>";
                    return cadena;

                }

            },



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
$(document).on("click", "#tbody_farmer_registered tr", function () {
    var id_farm = $(this).find(".id_farm").val();
    // console.log(id_farm);
    get_otherinvolved(id_farm);

})
function to_pdf_dcaform(indentidad){
      let doc = new jsPDF('p', 'mm', 'a4');


   doc.setFont('helvetica');
    doc.setFontType('bold');
    doc.text(15, 10, 'THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES');
    doc.setFontSize(10);
    doc.text(50, 20, 'DCA FORM');
    // clinic information
    doc.rect(10,30,190,8)
    doc.setFontType('bold');
    doc.setFontType('normal');
    doc.text(12, 28, 'Clinic information: ');
    doc.text(14, 35, 'Date: ');
    doc.text(65, 35, 'Clinic Code: ');
    doc.text(120, 35, 'Plant Doctor: ');
    // Farmer information
    doc.rect(10,45,190,20)
    doc.text(12, 44, 'Clinic information: ');
    doc.text(14, 49, 'Name: ');
    doc.text(120, 49, 'Id Number: ');
    doc.text(14, 54, 'Parish: ');
    doc.text(14, 59, 'District: ');
    doc.text(14, 64, 'Village: ');
    doc.text(80, 54, 'Sex: ');

    
if (1==2) {
    //var checkBox = new jsPDF.API.AcroFormCheckBox();
	//checkBox.fieldName = "CheckBox1";
    //checkBox.maxFontSize="12"
    //checkBox.Rect=[95,50,4,4];
    //checkBox.readOnly = true;
    //checkBox.appearanceState = 'Off';
    //doc.addField(checkBox);
    //var checkBox = new jsPDF.API.AcroFormCheckBox();
	//checkBox.fieldName = "CheckBox2";
    //checkBox.maxFontSize="12"
    //checkBox.Rect=[112,50,4,4];
    //checkBox.readOnly = true;
    //checkBox.appearanceState = 'On';
	//doc.addField(checkBox);
    doc.rect(88,50,4,4)
    doc.text(89, 53, 'X');
    doc.rect(100,50,4,4)
    doc.text(101, 53, '');
} else {
    doc.rect(88,50,4,4)
    doc.text(89, 53, '');
    doc.rect(100,50,4,4)
    doc.text(101, 53, 'X');
    //var checkBox = new jsPDF.API.AcroFormCheckBox();
	//checkBox.fieldName = "CheckBox3";
    //checkBox.maxFontSize="12"
    //checkBox.Rect=[95,50,4,4];
    //checkBox.readOnly = true;
    //checkBox.appearanceState = 'On';
    //doc.addField(checkBox);
    //var checkBox = new jsPDF.API.AcroFormCheckBox();
	//checkBox.fieldName = "CheckBox4";
    //checkBox.maxFontSize="12"
    //checkBox.Rect=[112,50,4,4];
    //checkBox.readOnly = true;
    //checkBox.appearanceState = 'Off';
	//doc.addField(checkBox);
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

    doc.rect(129,50,4,4)
    doc.text(130, 53, 'X');
    doc.rect(145,50,4,4)
    doc.text(146, 53, '');
    doc.rect(160,50,4,4)
    doc.text(161, 53, '');

    doc.text(100, 64, 'Tel.: ');
    // sample information
    doc.rect(10,70,190,12)
    doc.text(12, 69, 'Sample information: ');
    doc.text(14, 74, 'Crop: ');
    doc.text(14, 79, 'Variety: ');
    doc.text(120, 79, 'Sample brought: ');

        doc.text(152, 79, 'Yes');
        doc.text(164, 79, 'No');
        doc.rect(147,75,4,4)
        doc.rect(159,75,4,4)
      if (1==2) {
         doc.text(148, 79, 'X');
        } else {
        doc.text(160, 79, 'X');

    }
        
    // development stage
    doc.rect(10,87,60,12)
    doc.text(12, 86, 'Development stage: ');

        doc.setFontSize(8);
        doc.text(15, 91, 'Seeding');
        doc.rect(11,88,3,3)
        doc.text(31, 91, 'Intermediate');
        doc.rect(27,88,3,3)
        doc.text(52, 91, 'Flowering');
        doc.rect(48,88,3,3)
        doc.text(15, 97, 'Fruiting');
        doc.rect(11,94,3,3)
        doc.text(31, 97, 'Mature');
        doc.rect(27,94,3,3)
        doc.text(52, 97, 'Post hasrvest');
        doc.rect(48,94,3,3)
        doc.setFontSize(10);
        //Aca falta hacer la seleccion para poner la x
        doc.text(11, 91, 'X');
        doc.text(27, 91, 'X');
        doc.text(48, 91, 'X');
        doc.text(11, 97, 'X');
        doc.text(27, 97, 'X');
        doc.text(48, 97, 'X');
        
    // Part afected
    doc.rect(72,87,129,12)
    doc.text(74, 86, 'Part afected: ');
        
        doc.setFontSize(8);
        doc.text(80, 91, 'Seed');
        doc.rect(75,88,3,3)
        doc.text(100, 91, 'Root/Tuber');
        doc.rect(95,88,3,3)
        doc.text(130, 91, 'Steem/Shot');
        doc.rect(125,88,3,3)
        doc.text(150, 91, 'Twig/branch');
        doc.rect(146,88,3,3)
        
        doc.text(80, 97, 'Leaf');
        doc.rect(75,94,3,3)
        doc.text(100, 97, 'Flower');
        doc.rect(95,94,3,3)
        doc.text(130, 97, 'Fruit/grain');
        doc.rect(125,94,3,3)
        doc.text(150, 97, 'Whole plant');
        doc.rect(146,94,3,3)
        doc.setFontSize(10);
        //Aca falta hacer la seleccion para poner la x
        doc.text(75, 91, 'X');
        doc.text(95, 91, 'X');
        doc.text(125, 91, 'X');
        doc.text(146, 91, 'X');
        doc.text(75, 97, 'X');
        doc.text(95, 97, 'X');
        doc.text(125, 97, 'X');
        doc.text(146, 97, 'X');

    
    
    // when afected
    doc.rect(10,104,110,12)
    doc.text(12, 103, 'When First Seen an Area Affected: ');
    doc.setFontSize(8);
    doc.text(14, 108, 'Year first noticed:');
    doc.text(14, 114, 'Area planted: ');
        doc.text(75, 108, 'Acres');
        doc.rect(70,105,3,3)
        doc.text(90, 108, 'Hectares');
        doc.rect(85,105,3,3)
        doc.text(75, 114, 'M2');
        doc.rect(70,112,3,3)
        doc.text(90, 114, 'Number');
        doc.rect(85,112,3,3)
        //Aca falta hacer la seleccion para poner la x
        doc.text(70, 108, 'X');
        doc.text(85, 108, 'X');
        doc.text(70, 115, 'X');
        doc.text(85, 115, 'X');
        doc.setFontSize(10);

    // % crop afected
    doc.rect(122,104,79,12)
    doc.text(124, 103, '% crop afected: ');
        doc.setFontSize(8);

        doc.text(130, 111, '100%');
        doc.rect(126,108,3,3)
        doc.text(145, 111, '75%');
        doc.rect(139,108,3,3)
        doc.text(160,111, '50%');
        doc.rect(156,108,3,3)
        doc.text(175, 111, '25%');
        doc.rect(169,108,3,3)
        doc.text(190, 111, '<25%');
        doc.rect(185,108,3,3)
        //Aca falta hacer la seleccion para poner la x
        doc.text(127, 111, 'X');
        doc.text(140, 111, 'X');
        doc.text(157, 111, 'X');
        doc.text(170, 111, 'X');
        doc.text(186, 111, 'X');
        

    // Major Symptom
    doc.setFontSize(10);
    doc.rect(10,121,190,15)
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

        doc.rect(16,122,3,3);
        doc.rect(36,122,3,3);
        doc.rect(56,122,3,3);
        doc.rect(81,122,3,3);
        doc.rect(101,122,3,3);
        doc.rect(121,122,3,3);
        doc.rect(146,122,3,3);
        doc.rect(166,122,3,3);

        doc.rect(16,127,3,3);
        doc.rect(36,127,3,3);
        doc.rect(56,127,3,3);
        doc.rect(81,127,3,3);
        doc.rect(101,127,3,3);
        doc.rect(121,127,3,3);
        doc.rect(146,127,3,3);
        doc.rect(166,127,3,3);

        doc.rect(16,132,3,3);
        doc.rect(36,132,3,3);
        doc.rect(56,132,3,3);
        doc.rect(81,132,3,3);
        doc.rect(101,132,3,3);
        doc.rect(121,132,3,3);
        doc.rect(146,132,3,3);
        doc.rect(166,132,3,3);

//Aca falta hacer la seleccion para poner la x
        doc.text(16, 125, 'X');
        doc.text(36, 125, 'X');   
        doc.text(56, 125, 'X');
        doc.text(81, 125, 'X');
        doc.text(101, 125, 'X');
        doc.text(121, 125, 'X');
        doc.text(146, 125, 'X');
        doc.text(166, 125, 'X');

        doc.text(16, 130, 'X');
        doc.text(36, 130, 'X');   
        doc.text(56, 130, 'X');
        doc.text(81, 130, 'X');
        doc.text(101, 130, 'X');
        doc.text(121, 130, 'X');
        doc.text(146, 130, 'X');
        doc.text(166, 130, 'X');
    
        doc.text(16, 135, 'X');
        doc.text(36, 135, 'X');   
        doc.text(56, 135, 'X');
        doc.text(81, 135, 'X');
        doc.text(101, 135, 'X');
        doc.text(121, 135, 'X');
        doc.text(146, 135, 'X');
        doc.text(166, 135, 'X');
    

    // Distribution of symptom
    doc.setFontSize(10);
    doc.rect(10,141,190,5)
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
        doc.text(185, 145, 'Low areaa');

        doc.rect(14,142,3,3);
        doc.rect(36,142,3,3);
        doc.rect(56,142,3,3);
        doc.rect(71,142,3,3);
        doc.rect(91,142,3,3);
        doc.rect(106,142,3,3);
        doc.rect(136,142,3,3);
        doc.rect(161,142,3,3);
        doc.rect(181,142,3,3);

    //Aca falta hacer la seleccion para poner la x
        doc.text(14, 145, 'X');
        doc.text(36, 145, 'X');   
        doc.text(56, 145, 'X');
        doc.text(71, 145, 'X');
        doc.text(91, 145, 'X');
        doc.text(106, 145, 'X');
        doc.text(136, 145, 'X');
        doc.text(161, 145, 'X');
        doc.text(181, 145, 'X');

    // Describe problem 
    doc.setFontSize(10);
    doc.rect(10,151,190,15)
    doc.text(12, 150, 'Describe problem: ');

    doc.setFontSize(8);
    doc.text(14, 155, '(Adtional information - Include key observed symptoms, plan part afected, etc  ');
    
    // Type of problem
    doc.setFontSize(10);
    doc.rect(10,171,190,12)
    doc.text(12, 170, 'Type of problem: ');

        doc.setFontSize(8);
        doc.text(18, 175, 'Fungus');
        doc.text(40, 175, 'Bacterium');
        doc.text(60, 175, 'Insecto');
        doc.text(75, 175, 'Mollusc');
        doc.text(95, 175, 'Nematode');
        doc.text(115, 175, 'Weed');
        doc.text(150, 175, 'Other');
        
        
        doc.text(18, 180, 'Water mould');
        doc.text(40, 180, 'Virus');
        doc.text(60, 180, 'Mite');
        doc.text(75, 180, 'Bird');
        doc.text(95, 180, 'Mammal');
        doc.text(115, 180, 'Nutrient deficiency');
        doc.text(150, 180, 'Unknow');
        
        
        doc.rect(14,172,3,3);
        doc.rect(36,172,3,3);
        doc.rect(56,172,3,3);
        doc.rect(71,172,3,3);
        doc.rect(91,172,3,3);
        doc.rect(111,172,3,3);
        doc.rect(146,172,3,3);
        
        doc.rect(14,178,3,3);
        doc.rect(36,178,3,3);
        doc.rect(56,178,3,3);
        doc.rect(71,178,3,3);
        doc.rect(91,178,3,3);
        doc.rect(111,178,3,3);
        doc.rect(146,178,3,3);
        
//Aca falta hacer la seleccion para poner la x
        doc.text(14, 175, 'X');
        doc.text(36, 175, 'X');   
        doc.text(56, 175, 'X');
        doc.text(71, 175, 'X');
        doc.text(91, 175, 'X');
        doc.text(111, 175, 'X');
        doc.text(146, 175, 'X');
        
        doc.text(14, 181, 'X');
        doc.text(36, 181, 'X');   
        doc.text(56, 181, 'X');
        doc.text(71, 181, 'X');
        doc.text(91, 181, 'X');
        doc.text(111, 181, 'X');
        doc.text(146, 181, 'X');
        
    
    
    // Diagnosis
    doc.setFontSize(10);
    doc.rect(10,187,190,5)
    doc.text(12, 186, 'Diagnosis: ');
    doc.setFontSize(8);
    doc.text(30, 186, '(start a new sheet for each new problem) ');
    doc.setFontSize(10);
    

    // Current control
    doc.setFontSize(10);
    doc.rect(10,196,190,5)
    doc.text(12, 195, 'Current control: ');
    doc.setFontSize(8);
    doc.text(14, 200, 'Practices used');
    doc.setFontSize(10);
    
    
    // Recomendation for management:
    doc.setFontSize(10);
    doc.rect(10,206,190,60)
    doc.text(12, 205, 'Recomendation for management: ');

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
        doc.text(175, 211, 'Fertilizar');
        doc.text(190, 211, 'Other');

        
        doc.rect(16,209,3,3);
        doc.rect(36,209,3,3);
        doc.rect(51,209,3,3);
        doc.rect(71,209,3,3);
        doc.rect(91,209,3,3);
        doc.rect(111,209,3,3);
        doc.rect(131,209,3,3);
        doc.rect(151,209,3,3);
        doc.rect(171,209,3,3);
        doc.rect(187,209,3,3);
//Aca falta hacer la seleccion para poner la x
        doc.text(16, 212, 'X');
        doc.text(36, 212, 'X');   
        doc.text(51, 212, 'X');
        doc.text(71, 212, 'X');
        doc.text(91, 212, 'X');
        doc.text(111, 212, 'X');
        doc.text(131, 212, 'X');
        doc.text(151, 212, 'X');
        doc.text(171, 212, 'X');
        doc.text(187, 212, 'X');
    doc.setFontSize(10);
    doc.text(14, 216, 'Recomendation for the current problem: ');
    doc.text(14, 245, 'Recomendation to prevent this problem for the current problem: ');

    doc.text(14, 275, 'Followup activities: ');
        
        doc.setFontSize(8);    
        doc.text(55, 272, 'Sample sent to lab: ');
        doc.rect(55,273,23,6);
        doc.text(60, 277, 'Yes');
        doc.text(71, 277, 'No');
        doc.rect(56,274,3,3);
        doc.rect(67,274,3,3);
        
      
        doc.text(90, 272, 'Factsheet given: ');
        doc.rect(90,273,23,6);
        doc.text(96, 277, 'Yes');
        doc.text(107, 277, 'No');
        doc.rect(92,274,3,3);
        doc.rect(103,274,3,3);
        

        doc.text(120, 272, 'Fiel visit arranged: ');
        doc.rect(120,273,23,6);
        doc.text(126, 277, 'Yes');
        doc.text(137, 277, 'No');
        doc.rect(122,274,3,3);
        doc.rect(133,274,3,3);
        doc.setFontSize(10);
       
        doc.rect(170,273,30,6);

        window.open(doc.output('bloburl'));
}
function to_pdf_farmer(farmer) {
    let doc = new jsPDF('p', 'mm', 'a4');

    doc.setFont('helvetica');
    doc.setFontType('bold');
    doc.text(25, 40, 'THE MINISTRY OF AGRICULTURE, FORESTRY & FISHERIES');
    doc.setFontType('bold');
    doc.setFontSize(12);
    doc.text(12, 60, 'FARMER REGISTRATION FORM');
    doc.setFontType('normal');
    doc.text(12, 75, 'Date: ');
    doc.text(23, 75, farmer['date_reg']);
    doc.setFontType('bold');
    doc.setFontSize(14);
    doc.text(12, 95, 'CONFIDENTIAL');
    doc.line(12, 96, 47, 96);
    doc.text(12, 105, 'I....PERSONSAL');
    doc.setFontSize(12);
    doc.setFontType('normal');
    doc.text(18, 115, '1. NAME: ' + farmer['name'] + " " + farmer['last_name'] + " " + farmer['mo_last_name']);
    doc.text(110, 115, "AKA: " + farmer['AKA']);
    doc.text(18, 125, '2. DATE OF BIRTH: ' + farmer['birthdate']);
    doc.text(18, 135, '3. HOME ADDRES: ' + farmer['address']);
    doc.text(18, 145, '4. TELEPHONE NUMBER: ' + farmer['phone_num']);
    if (farmer['sex'] == 1) {
        doc.text(18, 155, '5. SEX: Female');
    } else {
        doc.text(18, 155, '5. SEX: Male');
    }
    doc.text(18, 165, '6. NAME(S) OF OTHERS IN HOUSEHOLD/GROUP INVOLVED IN THE FARMING BUSINESS');

    let header = ["Name", "Last Name"];
    let width = get_length(header);

    let headerConfig = header.map(key => ({
        'name': key,
        'prompt': key,
        'width': width,
        'height': 10,
        'align': 'center',
        'padding': 0
    }));

    // doc.table(18, 175, rows, headerConfig);
    var res = doc.autoTableHtmlToJson(document.getElementById("t-other"));
    doc.autoTable(res.columns, res.data, { margin: { top: 180 } });
    // doc.text(18, "Hol como estas");



















    window.open(doc.output('bloburl'));



}
function get_length(arr) {
    var aux = 0;
    arr.forEach(element => {
        // console.log(element.length);
        if (element.length >= aux) {
            aux = element.length;
        }

    });
    return aux + 50;
}
function get_otherinvolved(id_farm) {
    $('#tb_other').empty();
    rows.length = 0;
    $.ajax({
        method: "POST",
        url: "get/otherinvolved",
        data: { "id_farm": id_farm },
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        dataType: 'json',
        success: function (result) {

            for (const key in result) {
                if (Object.hasOwnProperty.call(result, key)) {
                    const element = result[key];
                    var item = {
                        "Name": element['name'],
                        "Last Name": element['last_name']
                    };
                    // console.log(item);
                    rows.push(item);
                    $('#tb_other').append("<tr>" +
                        "<td>" + element['name'] + "</td>" +
                        "<td>" + element['last_name'] + "</td>" +
                        "</tr>")

                }
            }





        }
    });



}