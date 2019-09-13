$(document).on("blur", ".profileEditInputs input", function() {
  updateValue(this);
});
function updateValue(input) {
  var sUpdateKey = $(input).attr("name");
  var sNewValue = $(input).val();
  $.ajax({
    url: "API/api-update-profile.php",
    method: "POST",
    data: {
      key: sUpdateKey,
      value: sNewValue
    }
  }).done(function(response) {
    console.log(response);
  });
}
