function changePass(email) {
  const oldPass = document.getElementById("floatingPassword").value;
  const newPass = document.getElementById("floatingPassword11").value;
  const confirmPass = document.getElementById("floatingPassword22").value;
  const httpr = new XMLHttpRequest();
  httpr.onload = function () {
    console.log(this.responseText);
    if (parseInt(this.responseText) === 0) {
      document.getElementById("incorrect-passwordw").style.display = "block";
      document.getElementById("correct-passwordw").style.display = "none";
    } else {
      document.getElementById("correct-passwordw").style.display = "block";
      document.getElementById("incorrect-passwordw").style.display = "none";
    }
  };
  httpr.open("POST", "changePass.php", false);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  httpr.send(
    "oldPass=" +
      oldPass +
      "&passNew=" +
      newPass +
      "&confirmPass=" +
      confirmPass +
      "&email=" +
      email
  );
}
