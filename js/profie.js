function changePass(email) {
  const oldPass = document.getElementById("floatingPassword").value;
  const newPass = document.getElementById("floatingPassword11").value;
  const confirmPass = document.getElementById("floatingPassword22").value;
  const httpr = new XMLHttpRequest();
  httpr.onload = function () {
    if (parseInt(this.responseText) === 0) {
      document.getElementById("incorrect-passwordw").style.display = "block";
      document.getElementById("correct-passwordw").style.display = "none";
    } else {
      document.getElementById("correct-passwordw").style.display = "block";
      document.getElementById("incorrect-passwordw").style.display = "none";
      document.getElementById("floatingPassword").value = "";
      document.getElementById("floatingPassword11").value = "";
      document.getElementById("floatingPassword22").value = "";
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
function changeBank(email) {
  const bankName = document.getElementById("bankName").value;
  const bankNumber = document.getElementById("bankNumber").value;
  const httpr = new XMLHttpRequest();
  httpr.onload = function () {
    if (parseInt(this.responseText) !== 0) {
      document.getElementById("correct-edit").style.display = "block";
    }
  };
  httpr.open("POST", "updateBankapi.php", false);
  httpr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  httpr.send(
    "bankName=" + bankName + "&bankNumber=" + bankNumber + "&email=" + email
  );
}
