function toggleInput(id) {
  const input = document.getElementById("doneBtn");
  if (input.classList.contains("activ")) {
    input.classList.remove("activ");
  }
  document.getElementById("id-hiedden-modal").innerHTML = id;
}
function calculateRating(star) {
  if (star.classList.contains("star1")) {
    document.getElementById("star1").classList.remove("bi-star-fill");
    document.getElementById("star2").classList.remove("bi-star-fill");
    document.getElementById("star3").classList.remove("bi-star-fill");
    document.getElementById("star4").classList.remove("bi-star-fill");
    document.getElementById("star5").classList.remove("bi-star-fill");
    document.getElementById("star1").classList.remove("bi-star");
    document.getElementById("star2").classList.remove("bi-star");
    document.getElementById("star3").classList.remove("bi-star");
    document.getElementById("star4").classList.remove("bi-star");
    document.getElementById("star5").classList.remove("bi-star");
    document.getElementById("star1").classList.add("bi-star-fill");
    document.getElementById("star2").classList.add("bi-star");
    document.getElementById("star3").classList.add("bi-star");
    document.getElementById("star4").classList.add("bi-star");
    document.getElementById("star5").classList.add("bi-star");
  }
  if (star.classList.contains("star2")) {
    document.getElementById("star1").classList.remove("bi-star-fill");
    document.getElementById("star2").classList.remove("bi-star-fill");
    document.getElementById("star3").classList.remove("bi-star-fill");
    document.getElementById("star4").classList.remove("bi-star-fill");
    document.getElementById("star5").classList.remove("bi-star-fill");
    document.getElementById("star1").classList.remove("bi-star");
    document.getElementById("star2").classList.remove("bi-star");
    document.getElementById("star3").classList.remove("bi-star");
    document.getElementById("star4").classList.remove("bi-star");
    document.getElementById("star5").classList.remove("bi-star");
    document.getElementById("star1").classList.add("bi-star-fill");
    document.getElementById("star2").classList.add("bi-star-fill");
    document.getElementById("star3").classList.add("bi-star");
    document.getElementById("star4").classList.add("bi-star");
    document.getElementById("star5").classList.add("bi-star");
  }
  if (star.classList.contains("star3")) {
    document.getElementById("star1").classList.remove("bi-star-fill");
    document.getElementById("star2").classList.remove("bi-star-fill");
    document.getElementById("star3").classList.remove("bi-star-fill");
    document.getElementById("star4").classList.remove("bi-star-fill");
    document.getElementById("star5").classList.remove("bi-star-fill");
    document.getElementById("star1").classList.remove("bi-star");
    document.getElementById("star2").classList.remove("bi-star");
    document.getElementById("star3").classList.remove("bi-star");
    document.getElementById("star4").classList.remove("bi-star");
    document.getElementById("star5").classList.remove("bi-star");
    document.getElementById("star1").classList.add("bi-star-fill");
    document.getElementById("star2").classList.add("bi-star-fill");
    document.getElementById("star3").classList.add("bi-star-fill");
    document.getElementById("star4").classList.add("bi-star");
    document.getElementById("star5").classList.add("bi-star");
  }
  if (star.classList.contains("star4")) {
    document.getElementById("star1").classList.remove("bi-star-fill");
    document.getElementById("star2").classList.remove("bi-star-fill");
    document.getElementById("star3").classList.remove("bi-star-fill");
    document.getElementById("star4").classList.remove("bi-star-fill");
    document.getElementById("star5").classList.remove("bi-star-fill");
    document.getElementById("star1").classList.remove("bi-star");
    document.getElementById("star2").classList.remove("bi-star");
    document.getElementById("star3").classList.remove("bi-star");
    document.getElementById("star4").classList.remove("bi-star");
    document.getElementById("star5").classList.remove("bi-star");
    document.getElementById("star1").classList.add("bi-star-fill");
    document.getElementById("star2").classList.add("bi-star-fill");
    document.getElementById("star3").classList.add("bi-star-fill");
    document.getElementById("star4").classList.add("bi-star-fill");
    document.getElementById("star5").classList.add("bi-star");
  }
  if (star.classList.contains("star5")) {
    document.getElementById("star1").classList.remove("bi-star-fill");
    document.getElementById("star2").classList.remove("bi-star-fill");
    document.getElementById("star3").classList.remove("bi-star-fill");
    document.getElementById("star4").classList.remove("bi-star-fill");
    document.getElementById("star5").classList.remove("bi-star-fill");
    document.getElementById("star1").classList.remove("bi-star");
    document.getElementById("star2").classList.remove("bi-star");
    document.getElementById("star3").classList.remove("bi-star");
    document.getElementById("star4").classList.remove("bi-star");
    document.getElementById("star5").classList.remove("bi-star");
    document.getElementById("star1").classList.add("bi-star-fill");
    document.getElementById("star2").classList.add("bi-star-fill");
    document.getElementById("star3").classList.add("bi-star-fill");
    document.getElementById("star4").classList.add("bi-star-fill");
    document.getElementById("star5").classList.add("bi-star-fill");
  }
}
function userRating(email) {
  const input = document.getElementById("doneBtn");
  input.style.color = "#f7f7f7";
  input.style.background = "#333";
  input.setAttribute("value", "تم التسليم");
  input.setAttribute("disabled", "");
  const comment = document.getElementById("w3review").value;
  const id = document.getElementById("id-hiedden-modal").innerText;
  let rating = 0;

  if (document.getElementById("star5").classList.contains("bi-star-fill")) {
    rating = 5;
  } else if (
    document.getElementById("star4").classList.contains("bi-star-fill")
  ) {
    rating = 4;
  } else if (
    document.getElementById("star3").classList.contains("bi-star-fill")
  ) {
    rating = 3;
  } else if (
    document.getElementById("star2").classList.contains("bi-star-fill")
  ) {
    rating = 2;
  } else if (
    document.getElementById("star1").classList.contains("bi-star-fill")
  ) {
    rating = 1;
  }

  const httpr = new XMLHttpRequest();
  httpr.onload = function () {
    console.log(this.responseText);
  };
  httpr.open("POST", "ratingItemAPI.php", false);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  httpr.send(
    "comment=" + comment + "&rating=" + rating + "&id=" + id + "&email=" + email
  );
}
function recivedItem(button, email, itemId) {
  const httpp = new XMLHttpRequest();
  httpp.onload = function () {
    button.setAttribute("disabled", "");
    button.innerHTML = "&#9745";
    button.style.fontSize = "1rem";
  };
  httpp.open("POST", "recivedItemApi.php", false);
  httpp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  httpp.send("itemId=" + itemId + "&email=" + email);
}
