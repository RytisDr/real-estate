$("#btnAddProperty").click(function(e) {
  e.preventDefault();
  var sNewPropertyTitle = $("form>#propertyTitleInput").val();
  var sNewPropertyPrice = $("form>#price").val();
  var sNewPropertyImage = $("form>#mainImage").val();
  $.ajax({
    url: "API/api-create-property.php",
    method: "POST",
    data: $("form").serialize(), // create the form to be passed (name tag values as keys)
    // automated version of
    /*  data: {
        nameValue: sNewPropertyTitle,
        emailValue: sNewPropertyPrice
      }, */
    datatype: "JSON"
  }).done(function(data) {
    $("#agents").append(
      `<div class="property" id="${data}">
          <img src="images/default-property-image.jpg" alt="">
          <input data-update="title" name="txtTitle" type="text" value="${sNewPropertyTitle}">
          <input data-update="price" name="iPrice" type="number" value="${sNewPropertyPrice}">
        </div>`
    );
    /*     $(".agent input").blur(function() {
        updateValue(this);
      }); */
  });
});
