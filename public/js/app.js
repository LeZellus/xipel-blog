document.addEventListener('DOMContentLoaded', function () {
  var articleContent = document.getElementsByClassName('article-content-input')

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
  window.onload = function () {
    this.addEventListener('mousemove', mouse_monitor)
  }

  //Color array for cursor trail
  var colorArray = [
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
  var mouse_monitor = function (e) {
    var item = document.createElement('span')
    item.classList.add('trail')
    console.log(item)

    //Variable color for trail
    var curColor = colorArray[Math.floor(Math.random() * colorArray.length)]

    //Calcul cursor dimensions
    var width = (height = Math.random() * (8 - 4) + 4)

    //Calcul cursor position
    var curX = e.pageX
    var curY = e.pageY
    var left = curX.toString()
    var top = curY.toString()

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
    var fadeEffect = setInterval(function () {
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
})
