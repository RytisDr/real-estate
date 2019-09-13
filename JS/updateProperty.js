$(document).on("blur", ".property input", function() {
  updateValue(this);
});
function updateValue(input) {
  var propertyId = $(input)
    .parent()
    .attr("id");
  var sUpdateKey = $(input).attr("name");
  var sNewValue = $(input).val();
  $.ajax({
    url: "API/api-update-property.php",
    method: "POST",
    data: {
      propId: propertyId,
      key: sUpdateKey,
      value: sNewValue
    }
  }).done(function(response) {
    console.log(response);
  });
}
