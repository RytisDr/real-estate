$(document).on("blur", ".property input", function() {
  updateValue(this);
});
function updateValue(input) {
  var sPostOwnerId = $(input)
    .parent()
    .parent()
    .attr("data-owner");
  var sUpdateKey = $(input).attr("name");
  var sNewValue = $(input).val();
  $.ajax({
    url: "API/api-update-property.php",
    method: "POST",
    data: {
      accId: sPostOwnerId,
      key: sUpdateKey,
      value: sNewValue
    }
  }).done(function(response) {
    console.log(response);
  });
}
