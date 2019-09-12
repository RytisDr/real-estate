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
    $("#propertiesContainer").append(
      `<div class="property" id="${data}">
        <img src="images/default-property-image.jpg" alt="">
        <input data-update="title" name="title" type="text" value="${sNewPropertyTitle}" id="">
        <input data-update="price" name="price" type="number" value="${sNewPropertyPrice}" id="">
    </div>';`
    );
    /*     $(".agent input").blur(function() {
        updateValue(this);
      }); */
  });
});
