function AfficherSousMenu() {
  if (document.querySelector("#sous-Admin").classList.contains("d-none")) {
    document.querySelector("#sous-Admin").classList.remove("d-none");
    document.querySelector("#sous-Admin").classList.add("d-block");
  } else {
    document.querySelector("#sous-Admin").classList.remove("d-block");
    document.querySelector("#sous-Admin").classList.add("d-none");
  }
}

function stopReservation() {
  document.location.href = "VCIResa.php";
}

window.addEventListener("load", function () {
  let btnAdmin = document.querySelector("#Admin");
  btnAdmin.addEventListener("click", AfficherSousMenu);

  let btnStopResa = document.querySelector("#StopResa");
  if (btnStopResa !== null) {
    btnStopResa.addEventListener("click", stopReservation);
  }
});
