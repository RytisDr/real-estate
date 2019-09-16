$("#btnAddProperty").click(function(e) {
  e.preventDefault();

  var sNewPropertyTitle = $("form>#propertyTitleInput").val();
  var sNewPropertyPrice = $("form>#priceInput").val();
  var sNewPropertyLongitude = $("form>#propertyLongitudeInput").val();
  var sNewPropertyLatitude = $("form>#propertyLatitudeInput").val();
  var sNewPropertyZip = $("form>#propertyZipInput").val();

  var formData = new FormData();
  var image = $("#inputFileCont #mainImg")[0].files[0];
  formData.append("file", image);
  formData.append("title", sNewPropertyTitle);
  formData.append("price", sNewPropertyPrice);
  formData.append("longitude", sNewPropertyLongitude);
  formData.append("latitude", sNewPropertyLatitude);
  formData.append("zip", sNewPropertyZip);

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
        <input data-update="long" name="longitude" type="number" step="any" placeholder="Longitude" value="${sNewPropertyLongitude}" id="">
        <input data-update="lat" name="latitude" type="number" step="any" placeholder="Latitude" value="${sNewPropertyLatitude}" id="">
        <input name="zipcode" type="number" maxlength="4" placeholder="ZIP" value="${sNewPropertyZip}">
        <button id="deletePropertyBtn">Remove This Property</button>
     </div>`
    );
  });
});
