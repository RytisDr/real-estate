$(document).on("blur", ".profileEditInputs input", function() {
  updateValue(this);
});
function updateValue(input) {
  var accType = $(input)
    .parent()
    .attr("data-account-type");
  var sProfileID = $(input)
    .parent()
    .attr("data-id");
  var sUpdateKey = $(input).attr("name");
  var sNewValue = $(input).val();
  $.ajax({
    url: "API/api-update-profile.php",
    method: "POST",
    data: {
      accType: accType,
      id: sProfileID,
      key: sUpdateKey,
      value: sNewValue
    }
  }).done(function(response) {
    return response;
  });
}
