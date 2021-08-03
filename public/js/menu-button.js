
function menu(){
    var menu = document.querySelector('#menu')
    if (menu.classList == 'bg-gray-200 h-100 p-4 menu' || menu.classList == 'bg-gray-200 h-100 w-5/12 p-4 menu'){
  menu.classList.remove('menu')
    }else{
        menu.classList.add('menu')
    }
 }
 