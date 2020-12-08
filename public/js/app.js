document.addEventListener("DOMContentLoaded", function () {
  let articleContent = document.getElementsByClassName("article-content-input");
  let menu = document.getElementById("nav-burger");
  let navLinks = document.getElementById("nav-link-items");

  let cvWrapper = document.getElementById("cv-wrapper");
  let cvImg = document.getElementById("cv-img");

  window.onload = function () {
    this.addEventListener("mousemove", mouseMonitor);
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
  /********************CURSOR TRAIL***********************/
  /*******************************************************/

  //Color array for cursor trail
  let colorArray = [
    "rgba(49,226,194,1)",
    "rgba(49,226,194,0.7)",
    "rgba(49,226,194,0.5)",
    "rgba(49,226,194,0.3)",
    "rgba(49,226,194,0.1)",
    "rgba(40,40,40,1)",
    "rgba(40,40,40,0,7)",
    "rgba(40,40,40,0,5)",
    "rgba(40,40,40,0.3)",
    "rgba(40,40,40,0.1)",
  ];

  //Calculs and properties for cursor trail style
  let mouseMonitor = function (e) {
    let item = document.createElement("span");
    item.classList.add("trail");

    //letiable color for trail
    let curColor = colorArray[Math.floor(Math.random() * colorArray.length)];

    console.log(curColor);

    //Calcul cursor dimensions
    let width = (height = Math.random() * (8 - 4) + 4);

    //Calcul cursor position
    let curX = e.pageX + Math.round(Math.random() * 10);
    let curY = e.pageY + Math.round(Math.random() * 10);
    let left = curX.toString();
    let top = curY.toString();

    //Add css properties defined by position
    item.style.left = left + "px";
    item.style.top = top + "px";
    item.style.width = width + "px";
    item.style.height = height + "px";
    item.style.backgroundColor = curColor;

    document.body.appendChild(item);
    setTimeout(function () {
      fadeOut(item);
      item.remove();
    }, 300);
  };

  //This function is like jQuery fadeOut
  function fadeOut(item) {
    let fadeEffect = setInterval(function () {
      if (!item.style.opacity) {
        item.style.opacity = 1;
      }
      if (item.style.opacity > 0) {
        item.style.opacity -= 0.1;
      } else {
        clearInterval(fadeEffect);
      }
    }, 300);
  }

  /*******************************************************/
  /*********************BURGER MENU***********************/
  /*******************************************************/

  //Toggle menu function
  let toggle = function () {
    navLinks.classList.toggle("show");
    menu.classList.toggle("clicked");
  };
});
