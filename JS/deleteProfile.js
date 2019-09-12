$("#deleteProfileBtn").click(function() {
  document.querySelector("#deleteMessage").style.display = "inherit";
  $("#yes").click(function() {
    document.querySelector("#deleteMessage").style.display = "none";
    location.href = "global-php-functions/delete-profile.php";
  });
  $("#no").click(function() {
    document.querySelector("#deleteMessage").style.display = "none";
  });
});
