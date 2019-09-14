const txtSearch = document.querySelector("#txtSearch");
const divResults = document.getElementById("results");
const indexPropContainer = document.getElementById("indexPropertiesContainer");
txtSearch.addEventListener("input", function() {
  $.ajax({
    url: "API/api-search.php",
    data: $("#frmSearch").serialize(),
    dataType: "JSON"
  })
    .done(function(propertiesFound) {
      $("#results").empty();
      if (propertiesFound.length) {
        propertiesFound.forEach(property => {
          let divProperty = `<div class="property"  id="Right${property.id}" data-agent-email="${property.agentEmail}">
                                <img class="propertyMainImg" src="images/${property.image}" alt="">
                                <h1  id="propertyTitleh1">${property.title}</h1>
                                <h1  id="propertyPriceh1">${property.price}</h1>
                            </div>`;
          $("#results").append(divProperty);
        });
      }
    })
    .fail(function() {
      console.log("Error");
    });

  if (txtSearch.value.length == 0) {
    divResults.style.display = "none";
    indexPropContainer.style.display = "initial";
  } else {
    divResults.style.display = "block";
    indexPropContainer.style.display = "none";
  }
});
