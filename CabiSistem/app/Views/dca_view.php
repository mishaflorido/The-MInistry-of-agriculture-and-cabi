<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1 class="m-0">DCA holaForm</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a role="button" class="nav-link" data-bs-toggle="collapse" data-bs-target="#start_page" aria-expanded="false" aria-controls="start_page" style="padding-top: 0; padding-right:0">Home</a></li>
                    <li class="breadcrumb-item active">DCA Form</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<form id="dca_reg_form">
    <div style="text-align: center" class="mb-3">
        <label for="FarmRegisterForm" class="form-label">Grenada and Ministry of agricultural, lands and forestry</label>
        <label for="FarmRegisterForm" class="form-label">DCA Form</label>
    </div>
    <style>
        .coordinates {
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 5px 10px;
            margin-top: -8%;
            margin-right: 50%;
            margin-left: 20%;
            font-size: 11px;
            line-height: 18px;
            border-radius: 3px;
            display: none;
        }
    </style>

    <div class="container">
        <div class="border border-secondary border-3 rounded mb-4" style="padding: 1em; border: 6px solid #dee2e6 !important;">
            <!-- start input section -->
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <!-- Alert -->
                    <div class="alert alert-success d-none alert_dca" role="alert" id="alert_dca">

                    </div>
                    <!-- ///////// -->
                </div>
            </div>

            <!-- esta parte debemos obtener de la tabla doctores de plantas -->
            <input type="hidden" name="id_dca_form" id="id_dca_form">
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Select or enter plant doctor name: </span>
                    <input list="plant_doctor_list" placeholder="Select plant doctor" class="form-control" name="id_plant_doc" id="id_plant_doc" autocomplete="off">
                    <datalist id="plant_doctor_list">

                    </datalist>

                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Clinic details </span>
                    <select class="form-select" aria-label="Default select example" name="cli_det" id="cli_det">
                        <option value="default" selected>Open this select menu</option>
                        <option value="GDCAR1">GDCAR1 Carriacou and Petit Martinic</option>
                        <option value="GDCARF">GDCARF Carriacou field visit</option>
                        <option value="GDEAE1">GDEAE1 Eastern Agricultural District</option>
                        <option value="GDEAEF">GDEAEF Eastern Agricultural District Field Visit</option>
                        <option value="GDNAD1">GDNAD1 (Northern Agricultural District)</option>
                        <option value="GDNADF">GDNADF (Northern Agricultural District Field Visit)</option>
                        <option value="GDSAD1">GDSAD1 Southern Agricultural District</option>
                        <option value="GDSADF">GDSADF Southern Agricultural District Field Visit</option>
                        <option value="GDWAD1">GDWAD1 Western Agricultural District</option>
                        <option value="GDWADF">GDWADF Western Agricultural District Field Visit</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>FARMER ABOUT THE FARMER</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-4">
                    <span class="input-group-text">Enter famer name: </span>
                    <input type="text" class="form-control" placeholder="Farmer name" name="farm_name_dca" id="farm_name_dca">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Phone number: </span>
                    <input type="text" class="form-control" placeholder="Phone number" name="phone_n_dca" id="phone_n_dca">
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Farmer ID: </span>
                    <input type="text" class="form-control" placeholder="Farmer id" name="f_id_dca" id="f_id_dca">
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Farmer sex: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex_dca" value="Male" id="f_sex_dca_male">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_sex_dca" value="Female" id="f_sex_dca_fem" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Farmer age: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age_dca" value="Adult" id="adult_inp" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Adult
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age_dca" value="Senior" id="senior_inp">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Senior
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="f_age_dca" value="Youth" id="youth_inp">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Youth
                        </label>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-4">
                    <span class="input-group-text"> Parish: </span>
                    <select name="f_county" id="county_list_id" class="form-control county_list">
                        <option value="0" selected readonly>County Select</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <span class="input-group-text"> Village </span>
                    <select name="f_subcounty" id="sub_county_list_id" class="form-control subcounty_list">
                        <option value="0" selected readonly>Sub County Select (First Select County)</option>
                    </select>

                </div>
                <div class="col-md-4">
                    <span class="input-group-text"> Complement/adress: </span>
                    <div class="input-group mb-3">
                        <input list="list_comp" class="form-control" name="f_village" id="village_id" autocomplete="off" placeholder="Click To select">
                        <datalist id="list_comp">

                        </datalist>
                        <!-- <input type="text" class="form-control" placeholder="Complement/adress" aria-label="Complement/adress" aria-describedby="basic-addon1"> -->
                        <button class="input-group-text btn-info save_btn_scompl" type='button' id="btn_scompl"><i class="far fa-save"></i></button>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>SAMPLE INFORMATION - VARIETY</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Select crop: </span>
                    <!-- sacar de tabla crop y relacionar con variedad en la siguiente lista -->
                    <input type="hidden" name="id_crop_dca">
                    <input list="crop_dca" name="id_crop" class="form-control" placeholder="Select Crop" id="crop_dca_list" autocomplete="off">
                    <datalist id="crop_dca">
                    </datalist>

                </div>
                <div class="col-md-6">
                    <!-- sacar de tabla variedady relacionar con crop de la tabla anterior -->
                    <span class="input-group-text">Select Variety: </span>
                    <input list="list_dca_variety" class="form-select" placeholder="Select First Crop" name="id_variety" id="variety_dca" autocomplete="off">
                    <datalist id="list_dca_variety">

                    </datalist>


                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>SAMPLE INFORMATION - SAMPLE</h4>
            </div>

            <div class="row my-2">
                <div class="col-md-12">
                    <span class="input-group-text">Sample brought: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sb_dca" value="1" id="sb_dca_yes">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sb_dca" value="0" id="sb_dca_no">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>DEVELOPMENT STAGE</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Development stage: </span>
                    <div class="row">
                        <div class="col-md-6" id="development_stage1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Flowering" name="dev_stage" id="id-Flowering">
                                <label class="form-check-label" for="dev_stage">
                                    Flowering
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fruiting" name="dev_stage" id="id-Fruiting">
                                <label class="form-check-label" for="dev_stage">
                                    Fruiting
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Intermediate" name="dev_stage" id="id-Intermediate">
                                <label class="form-check-label" for="dev_stage">
                                    Intermediate
                                </label>
                            </div>

                        </div>
                        <div class="col-md-6" id="development_stage2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mature" name="dev_stage" id="id-Mature">
                                <label class="form-check-label" for="dev_stage">
                                    Mature
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Post harvest" name="dev_stage" id="id-Postharvest">
                                <label class="form-check-label" for="dev_stage">
                                    Post harvest
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Seeding" name="dev_stage" id="id-Seeding">
                                <label class="form-check-label" for="dev_stage">
                                    Seeding
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <span class="input-group-text"> Plant Part Afected: </span>
                    <div class="row">
                        <div class="col-md-6" id="plant_afect1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Flower" name="pp_afected" id="id-Flower">
                                <label class="form-check-label" for="pln_afected">
                                    Flower
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fruit/grain" name="pp_afected" id="id-FruitGrain">
                                <label class="form-check-label" for="pln_afected">
                                    Fruit/Grain
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Leaf" name="pp_afected" id="id-Leaf">
                                <label class="form-check-label" for="pln_afected">
                                    Leaf
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Root/tuber" name="pp_afected" id="id-Roottuber">
                                <label class="form-check-label" for="pln_afected">
                                    Root/tuber
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" id="plant_afect2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Seed" name="pp_afected" id="id-Seed">
                                <label class="form-check-label" for="pln_afected">
                                    Seed
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Stem/shoot" name="pp_afected" id="id-Stemshot">
                                <label class="form-check-label" for="pln_afected">
                                    Stem/shot
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Twig/branch" name="pp_afected" id="id-Twigbranch">
                                <label class="form-check-label" for="pln_afected">
                                    Twig/branch
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Whole plant" name="pp_afected" id="id-Whole_plant">
                                <label class="form-check-label" for="pln_afected">
                                    Whole plant
                                </label>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4> AREA AFECTED</h4>
            </div>

            <div class="row my-2">
                <div class="col-md-3">
                    <span class="input-group-text">Year first seen </span>
                    <input type="number" min="1980" max="2030" step="1" value="2021" class="form-control" name="yfs_dca" />
                </div>
                <div class="col-md-3">
                    <span class="input-group-text">Area planted: </span>
                    <input type="number" class="form-control" placeholder="area planted" name="area_planted" step="any">
                </div>
                <div class="col-md-3">

                    <span class="input-group-text">Unit </span>
                    <select class="form-select" aria-label="Default select example" name="unit_ap" id="unit_apselect">
                        <option value="default" selected>Open this select menu</option>
                        <option value="Acres">Acres</option>
                        <option value="Hectares">Hectares</option>
                        <option value="m2">m2</option>
                        <option value="Plants">Plants</option>
                    </select>

                </div>
                <div class="col-md-3">

                    <span class="input-group-text">Percent of crop afeted </span>
                    <select class="form-select" aria-label="Default select example" name="per_cafected" id="per_cafectedSelect">
                        <option value="default" selected>Open this select menu</option>
                        <option value="100%">100%</option>
                        <option value="75%">75%</option>
                        <option value="50%">50%</option>
                        <option value="25%">25%</option>
                        <option value="<25%">&lt;25% </option>
                    </select>

                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4>SYMPTOMS</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Describe only the major symptoms </span>
                    <div class="row">
                        <div class="col-md-6" id="symtoms_checkboxes1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Blistered" name="symtoms" id="id-Blistered">
                                <label class="form-check-label" for="pln_afected">
                                    Blistered
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Bore holes" name="symtoms" id="id-Boreholes">
                                <label class="form-check-label" for="pln_afected">
                                    Bore holes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Chewed" name="symtoms" id="id-Chewed">
                                <label class="form-check-label" for="pln_afected">
                                    Chewed
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Dieback" name="symtoms" id="id-Dieback">
                                <label class="form-check-label" for="pln_afected">
                                    Dieback
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Leaf fall" name="symtoms" id="id-Leaffall">
                                <label class="form-check-label" for="pln_afected">
                                    Leaf fall
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Leaf spot" name="symtoms" id="id-Leafspot">
                                <label class="form-check-label" for="pln_afected">
                                    Leaf spot
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="No response" name="symtoms" id="id-Noresponse">
                                <label class="form-check-label" for="pln_afected">
                                    No response
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Pustule" name="symtoms" id="id-Pustule">
                                <label class="form-check-label" for="pln_afected">
                                    Pustule
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" id="symtoms_checkboxes2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Distorted" name="symtoms" id="id-Distorted">
                                <label class="form-check-label" for="pln_afected">
                                    Distorted
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Drying" name="symtoms" id="id-Drying">
                                <label class="form-check-label" for="pln_afected">
                                    Drying
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Frass" name="symtoms" id="id-Frass">
                                <label class="form-check-label" for="pln_afected">
                                    Frass
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Galls/sweellings" name="symtoms" id="id-Gallssweellings">
                                <label class="form-check-label" for="pln_afected">
                                    Galls/sweellings
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Insect seen" name="symtoms" id="id-Insectseen">
                                <label class="form-check-label" for="pln_afected">
                                    Insect seen
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mite seen" name="symtoms" id="id-Miteseen">
                                <label class="form-check-label" for="pln_afected">
                                    Mite seen
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mosaic" name="symtoms" id="id-Mosaic">
                                <label class="form-check-label" for="pln_afected">
                                    Mosaic
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Red" name="symtoms" id="id-Red">
                                <label class="form-check-label" for="pln_afected">
                                    Red
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Symptom distribution </span>
                    <div class="row">
                        <div class="col-md-6" id="sym_dist_checkboxes1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Certain varieties" name="sym_dist" id="id-Certainvarieties">
                                <label class="form-check-label" for="pln_afected">
                                    Certain varieties
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Even" name="sym_dist" id="id-Even">
                                <label class="form-check-label" for="pln_afected">
                                    Even
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Field margin" name="sym_dist" id="id-Fieldmargin">
                                <label class="form-check-label" for="pln_afected">
                                    Field margin
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="High areas" name="sym_dist" id="id-Highareas">
                                <label class="form-check-label" for="pln_afected">
                                    High areas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Scattered" name="sym_dist" id="id-Scattered">
                                <label class="form-check-label" for="pln_afected">
                                    Scattered
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" id="sym_dist_checkboxes2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Individual plants" name="sym_dist" id="id-Individualplants">
                                <label class="form-check-label" for="pln_afected">
                                    Individual plants
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Linear" name="sym_dist" id="id-Linear">
                                <label class="form-check-label" for="pln_afected">
                                    Linear
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Localised" name="sym_dist" id="id-Localised">
                                <label class="form-check-label" for="pln_afected">
                                    Localised
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Low areas" name="sym_dist" id="id-Lowareas">
                                <label class="form-check-label" for="pln_afected">
                                    Low areas
                                </label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4> SYMPTOMS - DESCRIBE PROBLEM</h4>
            </div>

            <!-- sintomas -->
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Describe the problem </span>
                    <textarea name="desc_problem" rows="6" cols="50" placeholder="Describe problem" class="form-control"></textarea>
                    <!-- <input type="text" class="form-control" placeholder="Describe problem" name="desc_problem"> -->
                </div>

                <div class="col-md-6">
                    <span class="input-group-text">Type of problem: </span>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Bacterium" id="id-Bacterium">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bacterium
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Bird" id="id-Bird">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Bird
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Fungus" id="id-Fungus">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Fungus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Insect" id="id-Insect">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Insect
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Mammal" id="id-Mammal">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mammal
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Mite" id="id-Mite">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mite
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Mollusc" id="id-BacteMolluscrium">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Mollusc
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Nematode" id="id-Nematode">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nematode
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Nutrient deficiency" id="id-Nutrientdeficiency">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nutrient deficiency
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Unknow" id="id-Unknow">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Unknow
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Virus" id="id-Virus">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Virus
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Water mould" id="id-Watermould">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Water mould
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Weed" id="id-Weed">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Weed
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="t_prob" value="Other" id="id-Other">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Other
                                </label>
                            </div>
                            <input type="text" class="form-control" style="border: 0; border-bottom: 1px solid; width: 180%; height:20%;" placeholder="type here another problem" name="prob_type_other" id="id_prob_type_other">
                        </div>
                    </div>



                </div>
            </div>
            <!-- sintomas -->
            <hr>
            <div class="row my-2">
                <h4> DIAGNOSIS</h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Diagnosis on: </span>
                    <input type="text" class="form-control" placeholder="Diagnosis on" name="diagnosis">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Current control: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Cur_cnt" value="1" id="id_Cur_cnt_yes">
                        <label class="form-check-label" for="cur_control">
                            Yes
                        </label>

                    </div>
                    <input type="text" class="form-control d-none" style="border: 0; border-bottom: 1px solid; width: 60%; height:20%;" placeholder="type here another current control" name="curr_yes_option" id="id_curr_yes_option">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Cur_cnt" value="0" id="id_Cur_cnt_no">
                        <label class="form-check-label" for="cur_control ">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row my-2">
                <h4> RECOMMENDATION / TYPE </h4>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Recommendation type </span>
                    <div class="row">
                        <div class="col-md-6" id="recomendationType_checkboxes1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Biological" name="rec_type" id="id-Biological">
                                <label class="form-check-label" for="pln_afected">
                                    Biological
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Cultural" name="rec_type" id="id-Cultural">
                                <label class="form-check-label" for="pln_afected">
                                    Cultural
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fertilizer" name="rec_type" id="id-Fertilizer">
                                <label class="form-check-label" for="pln_afected">
                                    Fertilizer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fungicide" name="rec_type" id="id-Fungicide">
                                <label class="form-check-label" for="pln_afected">
                                    Fungicide
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Resistant varieties" name="rec_type" id="id-Resistantvarieties">
                                <label class="form-check-label" for="pln_afected">
                                    Resistant varieties
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6" id="recomendationType_checkboxes2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Herbicide" name="rec_type" id="id-Herbicide">
                                <label class="form-check-label" for="pln_afected">
                                    Herbicide
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Insecticide/acaricide" name="rec_type" id="id-Insecticideacaricide">
                                <label class="form-check-label" for="pln_afected">
                                    Insecticide/acaricide
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Monitoring" name="rec_type" id="id-Monitoring">
                                <label class="form-check-label" for="pln_afected">
                                    Monitoring
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Other" name="rec_type" id="id-Other">
                                <label class="form-check-label" for="pln_afected">
                                    Other
                                </label>
                            </div>
                            <input type="text" class="form-control" style="border: 0; border-bottom: 1px solid; width: 83%; height:20%;" placeholder="type here another recommendation" name="rec_type_other" id="id_rec_type_other">

                        </div>
                    </div>

                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-6">
                    <span class="input-group-text">Recommendation to manage the current problem </span>
                    <input type="text" class="form-control" placeholder="Manage current problem" name="rec_curp">
                </div>
                <div class="col-md-6">
                    <span class="input-group-text">Recommendation to prevent this problem in future </span>
                    <input type="text" class="form-control" placeholder="Prevent this problem in future" name="rec_prevp">
                </div>
            </div>

            <div class="row my-2">
                <div class="col-md-4">
                    <span class="input-group-text">Sample sent to lab: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="s_tolab" value="1" id="id_stlb_yes">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="s_tolab" value="0" checked id="id_stlb_no">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Fact sheet given: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sheet_giv" value="1" id="sheet_giv_yes">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sheet_giv" value="0" checked id="sheet_giv_no">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <span class="input-group-text">Field visit arranged: </span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="field_v" value="1" id="field_v_yes">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="field_v" value="0" checked id="field_v_no">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                </div>
            </div>
            <!-- boton submit -->
            <div class="row">
                <div class="offset-lg-1 col-lg-10">
                    <!-- Alert -->
                    <div class="alert alert-success d-none alert_dca" role="alert">

                    </div>
                    <!-- ///////// -->
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3">

                    <div id='map' style='width: 400px; height: 300px;'> </div>
                    <div class="row">
                        <div class="col-md-8">
                            <pre id="coordinates" class="coordinates"></pre>
                            <input type="hidden" name="coordinates_lat">
                            <input type="hidden" name="coordinates_lng">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="d-grid gap-2 col-md-6 mx-auto">
                    <button type="submit" class="btn btn-success" id="btn_dca_form">
                        <span class="spinner-border spinner-border-sm d-none spin_dca" role="status" aria-hidden="true"></span>
                        <span class="d-none spin_dca">Loading...<br></span>
                        <span class="d-none spin_dca"> Please Wait</span>
                        <span class="not_spin_dca"> Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</form>