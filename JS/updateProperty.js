$(document).on("blur", ".property input", function() {
  updateValue(this);
});
function updateValue(input) {
  var sPostOwnerId = $(input)
    .parent()
    .parent()
    .attr("data-owner");
  var propertyId = $(input)
    .parent()
    .attr("id");
  var sUpdateKey = $(input).attr("name");
  var sNewValue = $(input).val();
  $.ajax({
    url: "API/api-update-property.php",
    method: "POST",
    data: {
      accId: sPostOwnerId,
      propId: propertyId,
      key: sUpdateKey,
      value: sNewValue
    }
  }).done(function(response) {
    console.log(response);
  });
}
