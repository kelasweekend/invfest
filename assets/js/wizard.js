//Wizard Init

$("#wizard").steps({
  headerTag: "h3",
  bodyTag: "section",
  transitionEffect: "none",
  stepsOrientation: "vertical",
  titleTemplate: "#title#",
  forceMoveForward: true,
  labels: {
    next: "Next Step",
  },
  onFinished: function () {
    alert("Form successfully submitted!");
    location.reload();
  },
});

//Form control

$("#email").on("change", function (e) {
  $("#enteredEmail").text(e.target.value);
});

$("#asalInstitusi").on("change", function (e) {
  $("#enteredasalInstitusi").text(e.target.value);
});

$("#namaTim").on("change", function (e) {
  $("#enterednamaTim").text(e.target.value);
});

$("#anggota1").on("change", function (e) {
  $("#enteredanggota1").text(e.target.value);
});

$("#anggota2").on("change", function (e) {
  $("#enteredanggota2").text(e.target.value);
});

$("#anggota3").on("change", function (e) {
  $("#enteredanggota3").text(e.target.value);
});

$("#mobileApps").on("change", function (e) {
  $("#enteredKategori").text(e.target.value);
});

$("#webApps").on("change", function (e) {
  $("#enteredKategori").text(e.target.value);
});

$("#ui/ux").on("change", function (e) {
  $("#enteredKategori").text(e.target.value);
});
