$(document).on("click", "#deletePropertyBtn", function() {
  var propertyId = $(this)
    .parent()
    .attr("id");
  $.ajax({
    url: "API/api-delete-property.php",
    method: "POST",
    data: {
      propId: propertyId
    }
  }).done(function(response) {
    var response = JSON.parse(response);
    if (response.status == 1) {
      $(`#${propertyId}`).remove();
    }
  });
});
