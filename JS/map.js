let ajProperties = JSON.parse(sjProperties); //from php link in index
var currentMarkers = [];
//set up el for global functions
mapboxgl.accessToken =
  "pk.eyJ1IjoicmVldGlzIiwiYSI6ImNrMGM1Z3JidzB5azQzcG1xdm55ejB5ODEifQ.1xpo1Ejg9b1sJSg9EW9ZAw";
var map = new mapboxgl.Map({
  container: "indexMapContainer",
  style: "mapbox://styles/reetis/ck0c6iblr28dm1cse63r4tnhv",
  center: [12.581173, 55.680855], // starting position
  zoom: 10 // starting zoom
});
map.addControl(new mapboxgl.NavigationControl());

$(document).ready(placeMarkersAddEventListeners);

function placeMarkersAddEventListeners() {
  for (let jProperty of ajProperties) {
    var el = document.createElement("a");
    el.href = "#";
    el.className = "marker";
    el.style.backgroundImage = "url(/impereal-estate/images/marker.png)";
    el.style.width = "50px";
    el.style.height = "50px";
    el.id = jProperty.id;
    el.addEventListener("click", function() {
      //remove hashtag received from href
      $(window).on("hashchange", function(e) {
        history.replaceState("", document.title, e.originalEvent.oldURL);
      });
      removeActiveClassFromProperty();
      document.getElementById(this.id).classList.add("active"); // left
      document.getElementById("Right" + this.id).classList.add("active"); // right
    });
    // add marker to map
    let marker = new mapboxgl.Marker(el)
      .setLngLat(jProperty.geometry.coordinates)
      .addTo(map);
    currentMarkers.push(marker);
  }
}
function addMarkersToMap(jProperty) {
  var el = document.createElement("a");
  el.href = "#";
  el.className = "marker";
  el.style.backgroundImage = "url(/impereal-estate/images/marker.png)";
  el.style.width = "50px";
  el.style.height = "50px";
  el.id = jProperty.id;
  el.id = jProperty.id;

  el.addEventListener("click", function() {
    //remove hashtag received from href
    $(window).on("hashchange", function(e) {
      history.replaceState("", document.title, e.originalEvent.oldURL);
    });
    removeActiveClassFromProperty();
    document.getElementById(this.id).classList.add("active"); // left
    document.getElementById("Right" + this.id).classList.add("active"); // right
  });
  let marker = new mapboxgl.Marker(el)
    .setLngLat(jProperty.geometry.coordinates)
    .addTo(map);
  currentMarkers.push(marker);
}
function removeMapMarkers() {
  // remove markers
  if (currentMarkers !== null) {
    for (var i = currentMarkers.length - 1; i >= 0; i--) {
      currentMarkers[i].remove();
    }
  }
}

function removeActiveClassFromProperty() {
  let properties = document.querySelectorAll(".active");
  properties.forEach(function(oPropertyDiv) {
    oPropertyDiv.classList.remove("active");
  });
}
