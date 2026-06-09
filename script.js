const languageSelect =
  document.getElementById("languageSelect");

languageSelect.addEventListener("change", () => {

  const selectedLanguage =
    languageSelect.value;

  window.location.href =
    "index.php?lang=" + selectedLanguage;

});

const lightBg = "rgb(248, 248, 248)";
const body = document.getElementsByTagName("body")[0];
const themeButton = document.getElementById("theme-button");

themeButton.addEventListener("click", function () {
  const currentBodyBg = window.getComputedStyle(body).background;

  if (currentBodyBg.includes(lightBg)) {
    body.style.background = "#b49a74";

    themeButton.innerText = "✵";
  } else {
    body.style.background = lightBg;
    body.style.color = "#000";
    themeButton.innerText = "ִֶָ࣪☾.";
  }
});