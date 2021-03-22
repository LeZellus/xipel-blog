document.addEventListener("DOMContentLoaded", function () {
  let articleContent = document.getElementsByClassName("article-content-input");
  let menu = document.getElementById("nav-burger");
  let navLinks = document.getElementById("nav-link-items");

  let cvWrapper = document.getElementById("cv-wrapper");
  let cvImg = document.getElementById("cv-img");

  window.onload = function () {
    menu.addEventListener("click", toggle);
    cvWrapper.addEventListener("click", popupManage);
    cvImg.addEventListener("click", popupManage);
  };

  /*******************************************************/
  /**********************TinyCME**************************/
  /*******************************************************/

  //Init TinyCME only if class exist on the DOM to block error
  if (articleContent.length > 0) {
    tinymce.init({
      selector: ".article-content-input",
      plugins: "link",
    });
  }

  /*******************************************************/
  /**********************Popup Img************************/
  /*******************************************************/

  //Start event on click
  let popupManage = function popup() {
    cvImg.classList.toggle("opened");
  };

  /*******************************************************/
  /*********************BURGER MENU***********************/
  /*******************************************************/

  //Toggle menu function
  let toggle = function () {
    navLinks.classList.toggle("show");
    menu.classList.toggle("clicked");
  };
});
