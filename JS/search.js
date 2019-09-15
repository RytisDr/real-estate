const txtSearch = document.querySelector("#txtSearch");
const divResults = document.getElementById("results");
const indexPropContainer = document.getElementById("indexPropertiesContainer");
txtSearch.addEventListener("input", function() {
  removeMapMarkers();
  $.ajax({
    url: "API/api-search.php",
    data: $("#frmSearch").serialize(),
    dataType: "JSON"
  })
    .done(function(propertiesFound) {
      $("#results").empty();
      if (propertiesFound.length) {
        propertiesFound.forEach(property => {
          addMarkersToMap(property);
          let divProperty = `<div class="property"  id="Right${property.id}" data-agent-email="${property.agentEmail}">
                                <img class="propertyMainImg" src="images/${property.image}" alt="">
                                <h1  id="propertyTitle">${property.title}</h1>
                                <h1  id="propertyPrice">${property.price}</h1>
                            </div>`;
          $("#results").append(divProperty);
          $.ajax({
            url: "API/api-check-session.php"
          }).done(response => {
            $("#results .property").append(response);
            formatPrice();
          });
        });
      }
    })
    .fail(function() {
      console.log("Error");
    });

  if (txtSearch.value.length == 0) {
    divResults.style.display = "none";
    indexPropContainer.style.display = "grid";
    placeMarkersAddEventListeners();
  } else {
    divResults.style.display = "grid";
    indexPropContainer.style.display = "none";
    removeMapMarkers();
  }
});
function formatPrice() {
  document
    .querySelectorAll("#results .property #propertyPrice")
    .forEach(price => {
      let priceInt = parseInt(price.textContent);
      let priceFormatted = format1(priceInt, "$");
      price.textContent = priceFormatted;
    });

  function format1(n, currency) {
    return (
      currency +
      n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
      })
    );
  }
}
