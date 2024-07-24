// Add Rows Each Table
function add_produce_supply() {
    $("#tbody_produce_supply").append('<tr>' +
        '<td><input type="text" name="prod_sup_name" placeholder="" class="form-control prod_sup_name"></td>' +
        '<td><input type="text" name="prod_address" placeholder="" class="form-control prod_address"></td>' +
        '<td><input type="number" name="prod_numh" placeholder="" class="form-control prod_numh"></td>' +
        '<td><input type="number" name="prod_numc" placeholder="" class="form-control prod_numc"></td>' +
        '<td class="align-middle text-center"><a role="button"><i class="fa fa-trash delete_button" aria-hidden="true"></i></a></td>' +
        '</tr>');
}