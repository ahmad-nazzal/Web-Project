/*//to wait until the img uploded else it will be error because img not exist
const observer = new MutationObserver(callback);
function addObserverIfDesiredNodeAvailable() {
  var firstPage = document.getElementsByTagName("div");
  console.log(firstPage);
  if (!firstPage) {
    window.setTimeout(addObserverIfDesiredNodeAvailable, 500);
    return;
  }
  console.log("q");

  var options = {
    //subtree:true,
    attributes: true,
    attributeOldValue: true,
    attributeFilter: ["class"],
  };
  observer.observe(firstPage, options);
}
console.log("a");
addObserverIfDesiredNodeAvailable();

//listener to observe if the active class of the imgs changed

function callback(mutationList, observer) {
  console.log(mutationList);
  /*mutationList.forEach(function (mutation) {
    console.log("c");

    if (mutation.type === "attributes" && mutation.attributeName === "class") {
      console.log("b");
      if (!firstPage.classList.contains("active")) {
        img1.style.transform = "scale(0.5)";
        img1.style.transition = "transform 0s";
        console.log("a");
      }
    }
  }
  );
}*/
const firstPage = document.getElementById("first-page");
const img1 = document.getElementById("img1");
const secondPage = document.getElementById("second-page");
const img2 = document.getElementById("img2");
const thirdPage = document.getElementById("third-page");
const img3 = document.getElementById("img3");

var myCarousel = document.getElementById("demo");
myCarousel.addEventListener("slid.bs.carousel", function () {
  if (firstPage.classList.contains("active")) {
    img1.style.transform = "scale(1.1)";
    img1.style.transition = "transform 12s";
    img2.style.transform = "scale(1)";
    img3.style.transform = "scale(1)";
  } else if (secondPage.classList.contains("active")) {
    img2.style.transform = "scale(1.1)";
    img2.style.transition = "transform 12s";
    img1.style.transform = "scale(1)";
    img3.style.transform = "scale(1)";
  } else if (thirdPage.classList.contains("active")) {
    img3.style.transform = "scale(1.1)";
    img3.style.transition = "transform 12s";
    img1.style.transform = "scale(1)";
    img2.style.transform = "scale(1)";
  }
});

//////////////////////modal
document.getElementById("sign-up-form").style.display = "none";
document.getElementById("forgot-formm").style.display = "none";

function toSignIn() {
  document.getElementById("sign-in-form").style.display = "block";
  document.getElementById("sign-up-form").style.display = "none";
  document.getElementById("forgot-formm").style.display = "none";
}
function toSignUp() {
  document.getElementById("sign-in-form").style.display = "none";
  document.getElementById("sign-up-form").style.display = "block";
  document.getElementById("forgot-formm").style.display = "none";
}
function toSignForgot() {
  document.getElementById("sign-in-form").style.display = "none";
  document.getElementById("sign-up-form").style.display = "none";
  document.getElementById("forgot-formm").style.display = "block";
}

function validate() {
  const pass = document.getElementById("floatingPassword").value;
  const email = document.getElementById("floatingInput").value;
  const form = document.getElementById("form-sign");
  // && email.search(/\B@\B/) != -1
  if (pass != "" && email != "") {
    // api works and enter the if but it retrns true i dont know why
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      if (this.responseText.localeCompare("false")) {
        return false;
      } else {
        return true;
      }
    };
    // This is to call the api
    // First we define the request
    xhttp.open("POST", "api.php", false);
    // set the header
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // set the request bidy since it is a post request.
    xhttp.send("emailIn=" + email + "&passIn=" + pass + '"');
  } else {
    form.classList.add("was-validated");
    return false;
  }
}
function validateUp() {
  const pass = document.getElementById("floatingPassword1").value;
  const firstName = document.getElementById("floatingInput1").value;
  const lastName = document.getElementById("floatingInput2").value;
  const email = document.getElementById("floatingInput3").value;
  const phone = document.getElementById("floatingInput4").value;

  const form = document.getElementById("form-signUp");

  if (
    pass != "" &&
    email != "" &&
    firstName != "" &&
    lastName != "" &&
    phone != ""
  ) {
    return true;
  } else {
    form.classList.add("was-validated");
    return false;
  }
}
function validateForgot() {
  const email = document.getElementById("floatingInput11").value;
  const form = document.getElementById("form-forgot");

  if (email != "" && email.search(/\B@\B/) != -1) {
    return true;
  } else {
    form.classList.add("was-validated");
    return false;
  }
}

//sign out
function out_form() {
  document.getElementById("outForm").submit();
}
