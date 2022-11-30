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
