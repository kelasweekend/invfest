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

$("#username").on("change", function (e) {
  $("#enteredUsername").text(e.target.value);
});

$("#phoneNumber").on("change", function (e) {
  $("#enteredPhoneNumber").text(e.target.value);
});

$("#cardNumber").on("change", function (e) {
  let str = e.target.value;
  let value = new Array(str.length - 4 + 1).join("x") + str.slice(-4);
  $("#enteredCard").text(value);
});

$("#expiration").on("change", function (e) {
  $("#cardExpiration").text(e.target.value);
});
