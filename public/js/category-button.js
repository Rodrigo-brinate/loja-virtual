
  function category(){
    var category = document.getElementById('category')
      if (category.classList == 'category-mobile ml-10 mt-4 hidden'){
        category.classList.remove('hidden')
      }else{
        category.classList.add('hidden')
      } 
  }