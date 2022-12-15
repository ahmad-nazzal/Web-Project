function toggleInput() {
  const input = document.getElementById("doneBtn");
  if (input.classList.contains("activ")) {
    input.classList.remove("activ");
    input.style.color = "#f7f7f7";
    input.style.background = "#333";
    input.setAttribute("value", "تم التسليم");
  } else {
    input.style.color = "#333";
    input.style.background = "#f7f7f7";
    input.setAttribute("value", "تسليم");
    input.classList.add("activ");
  }
}
