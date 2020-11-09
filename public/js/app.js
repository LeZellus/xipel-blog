document.addEventListener('DOMContentLoaded', function () {
  let articleContent = document.getElementsByClassName('article-content-input')
  let menu = document.getElementById('nav-burger')
  let navLinks = document.getElementById('nav-link-items')

  window.onload = function () {
    this.addEventListener('mousemove', mouseMonitor)
    menu.addEventListener('click', toggleMenu)
  }

  /*******************************************************/
  /**********************TinyCME**************************/
  /*******************************************************/

  //Init TinyCME only if class exist on the DOM to block error
  if (articleContent.length > 0) {
    tinymce.init({
      selector: '.article-content-input',
      plugins: 'link',
    })
  }

  /*******************************************************/
  /********************CURSOR TRAIL***********************/
  /*******************************************************/

  //Color array for cursor trail
  let colorArray = [
    '#31e2c2',
    '#68e8cc',
    '#8dedd6',
    '#adf2e0',
    '#caf7ea',
    '#e5fbf5',
    '#282828',
    '#474747',
    '#686868',
    '#8c8c8b',
    '#b1b1b1',
    '#d7d7d7',
  ]

  //Calculs and properties for cursor trail style
  let mouseMonitor = function (e) {
    let item = document.createElement('span')
    item.classList.add('trail')

    //letiable color for trail
    let curColor = colorArray[Math.floor(Math.random() * colorArray.length)]

    console.log(curColor)

    //Calcul cursor dimensions
    let width = (height = Math.random() * (8 - 4) + 4)

    //Calcul cursor position
    let curX = e.pageX + Math.round(Math.random() * 10)
    let curY = e.pageY + Math.round(Math.random() * 10)
    let left = curX.toString()
    let top = curY.toString()

    //Add css properties defined by position
    item.style.left = left + 'px'
    item.style.top = top + 'px'
    item.style.width = width + 'px'
    item.style.height = height + 'px'
    item.style.backgroundColor = curColor

    document.body.appendChild(item)
    setTimeout(function () {
      fadeOut(item)
      item.remove()
    }, 300)

  }

  //This function is like jQuery fadeOut
  function fadeOut(item) {
    let fadeEffect = setInterval(function () {
      if (!item.style.opacity) {
        item.style.opacity = 1
      }
      if (item.style.opacity > 0) {
        item.style.opacity -= 0.1
      } else {
        clearInterval(fadeEffect)
      }
    }, 300)
  }

  /*******************************************************/
  /*********************BURGER MENU***********************/
  /*******************************************************/

  //Toggle menu function
  let toggleMenu = function () {
    navLinks.classList.toggle('show')
    menu.classList.toggle('clicked')
  }
})