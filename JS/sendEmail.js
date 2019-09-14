$(document).on("click", "#interestedBtn", function() {
  var agentEmail = $(this)
    .parent()
    .attr("data-agent-email");
  var propertyTitle = $(this)
    .parent()
    .find("#propertyTitleh1")
    .text();
  var propertyPrice = $(this)
    .siblings("#propertyPriceh1")
    .text();
  var propertyImg = $(this)
    .siblings(".propertyMainImg")
    .attr("src");
  $.ajax({
    url: "API/api-send-email.php",
    method: "POST",
    data: {
      propImg: propertyImg,
      propTitle: propertyTitle,
      propPrice: propertyPrice,
      agentEmail: agentEmail
    }
  }).done(function(data) {
    console.log(data);
  });
});
