$("#btnAddProperty").click(function(e) {
  e.preventDefault();

  var sNewPropertyTitle = $("form>#propertyTitleInput").val();
  var sNewPropertyPrice = $("form>#price").val();
  var formData = new FormData();
  var image = $("form>#mainImg")[0].files[0];
  formData.append("file", image);
  formData.append("title", sNewPropertyTitle);
  formData.append("price", sNewPropertyPrice);
  $.ajax({
    url: "API/api-create-property.php",
    method: "POST",
    data: formData,
    datatype: false,
    contentType: false,
    processData: false
  }).done(function(data) {
    var jData = JSON.parse(data);
    $("#propertiesContainer").append(
      `<div class="property" id="${jData.propertyId}">
        <img src="images/${jData.image}" alt="">
        <input data-update="title" name="title" type="text" value="${sNewPropertyTitle}" id="">
        <input data-update="price" name="price" type="number" value="${sNewPropertyPrice}" id="">
    </div>`
    );
  });
});
