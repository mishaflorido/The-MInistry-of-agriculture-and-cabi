var valor_actual = "#" + $("#consolidation_table_select").val();
$("#consolidation_table_select").on("change", function () {
  console.log("Valor actual: " + valor_actual);
  var selector = "#" + $(this).val();
  switch ($(this).val()) {
    case "table_1":
      $(valor_actual).addClass("d-none");
      $("#table_1").removeClass("d-none");
      break;
    case "table_2":
      $(valor_actual).addClass("d-none");
      $("#table_2").removeClass("d-none");
      break;

    case "table_3":
      $(valor_actual).addClass("d-none");
      $("#table_3").removeClass("d-none");
      break;
  }
  valor_actual = "#" + $(this).val();
  console.log("Valor cambiado: " + valor_actual);
});
