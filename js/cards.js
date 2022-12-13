function toggleIcon(icon, itemId) {
  if (icon.classList.contains("bi-heart")) {
    icon.classList.remove("bi-heart");
    icon.classList.add("bi-heart-fill");
    icon.style.color = "red";
  } else {
    icon.classList.remove("bi-heart-fill");
    icon.classList.add("bi-heart");
    icon.style.color = "#333";
  }

  const xhttpLike = new XMLHttpRequest();
  xhttpLike.onload = function () {};
  xhttp.open("POST", "storeLikesApi.php", false);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("itemId=" + itemId);
}
