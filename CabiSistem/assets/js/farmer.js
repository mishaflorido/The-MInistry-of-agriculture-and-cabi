// $(document).on('click','add_involved',function(){

//     var fila = document.createElement("tr");
//     var col1 = document.createElement("td");
//     var col2 = document.createElement("td");
//     fila.append(col1);
//     fila.append(col2);
//     $("#tbody_involved").append(fila);



// });
function add_involded() {
    $("#tbody_involved").append('<tr>' +
        '<td><input type="text" name="" id="" placeholder="Name" class="form-control"></td>' +
        '<td><input type="text" name="" id="" placeholder="LastName" class="form-control"></td>' +
        '<td><a role="button"><i class="fa fa-trash" aria-hidden="true"></i></a></td>' +
        '</tr>');
}
