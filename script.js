const languageSelect =
document.getElementById("languageSelect");

languageSelect.addEventListener("change", () => {

    const selectedLanguage =
    languageSelect.value;

    window.location.href =
    "index.php?lang=" + selectedLanguage;

});