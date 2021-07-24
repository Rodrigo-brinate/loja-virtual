<div class="container1"> 
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link rel="stylesheet" href="./index.css">
      <title>home</title>
      <style>

        @media only screen and (max-width: 940px){
          .category{
            display: none;
          }
        }
        #categoryes {
          display: none;
        }
        @media only screen and (max-width: 620px){
         #header {
           display: block;
           margin-left: auto;
           margin-right: auto;
           width: max-content;
         }
         .card {
          display: flex;
          height: 35vh;
          width: 30vw
         }
         #categoryes {
           display: inline;
         }
         #product {
          margin-left: auto !important;
          margin-right: auto !important;
          display: block !important;
         }
         .card-title {
           font-size: 12pt;
           margin-bottom: -195px !important
         }
         .img-card {
           width: 15vw
         }
        }


@media only screen and (max-width:790px){

.menu{
    display:none !important;
}

.menu-button {
    background-image: url(./img/menu.png);
}

}
            </style>
  </head>
  <body>
      <header class="pt-4 pb-4 pl-2 pr-2">
         
          <div id="header"  class="flex justify-between items-center ">  
            <a class="no-underline text-black" href="{{ route('app.index') }}">
              <h2 class="ml-2 text-2xl">logo</h2>
            </a>
          <input placeholder="pesquisar" class="border-b-2 border-black p-4 search" type="search"  name="" id="">
          <div class="flex mr-10">
             <img class="p-4 w-16 h-16" src="./img/favorite.png" alt="">
              <a href="{{route('app.cart')}}">
                <img class="p-4 w-16 h-16" src="./img/cart.png" alt="">
              </a>
              <a href="{{route('app.profile')}}">
                <img class="p-4 w-16 h-16" src="./img/profile.png" alt="">
              </a>
          </div>
  
  
         </div>
  
          <ul class="flex category ml-10 mt-4">
            @foreach ($category as $item)
              <li class="ml-8">{{$item->category_name}}</li>
               @endforeach
          </ul>
  
          <button id="categoryes" class="mt-2 p-2 bg-gray-100 border-gray border-2" onclick="category()">categorias <sub>﹀</sub></button>
          <ul id="category" class="category-mobile  ml-10 mt-4 hidden">
            @foreach ($category as $item)
              <li class="ml-8">{{$item->category_name}}</li>
            @endforeach
          </ul>
      </header>
  
      <button onclick="menu()" class="menu-button w-10 h-10 mb-8 bg-no-repeat "></button>

      <main class="flex">
        
        <div id="menu" class="bg-gray-200 h-100 p-4 menu">
            <ul>
              <a class="no-underline text-black" href="{{route('app.index')}}">
                <li class=" mt-4"> 
                  <img class=" inline" src="./img/home.png" alt=""> 
                  &nbsp;  home
                </li>
              </a>
  
                <a class="no-underline text-black" href="{{route('adm.addProduct')}}">
                   <li class=" mt-4"> <img class=" inline" src="./img/add.png" alt=""> 
                   &nbsp; adicionar produto
                  </li>
                </a>
  
                <a class="no-underline text-black" href="{{route('adm.viewProduct')}}">
                <li class="mt-4" >
                   <img class=" inline" src="./img/altere.png" alt=""> 
                   &nbsp; gerenciar produtos
                  </li>
                </a>
  
                  <a class="no-underline text-black" href="{{route('adm.addCategory')}}">
                <li class="mt-4">
                   <img class=" inline" src="./img/add-category.png" alt=""> 
                   &nbsp; adicionar categoria
                  </li>
                  </a>
  
                  <a class="no-underline text-black" href="{{route('adm.categoryView')}}">
                <li class="mt-4">
                   <img class=" inline" src="./img/edit-category.png" alt=""> 
                   &nbsp; gerenciar categorias
                  </li>
                  </a>
            </ul>
        </div>
  


  
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<table class="table table-striped table-hover mx-4" >
    <thead>
        <tr>
          <th scope="col">nome do produto</th>
          <th scope="col">descrição do produto</th>
          <th scope="col">valor do produto</th>
          <th>usuario</th>
          <th scope="col">editar</th>
          <th scope="col">excluir</th>
          
        </tr>
      </thead>
      <tbody>
          @foreach ($product as $item)
              
         
        <tr>
          <th class="font-normal">{{substr($item->product_name,0,40)}}</th>
          <td>{{substr($item->product_description,0,120)}}</td>
          <td>{{$item->value}}</td>
          <td style="overflow: unset">{{$item->name}}</td>
          <td><a class="edit no-underline  bg-yellow-500 p-2 rounded-lg text-black" href="/edit/{{$item->product_name}}">editar</a></td>
          <td><a class="delete no-underline  bg-red-500 p-2 rounded-lg text-black" href="/delete/{{$item->product_name}}">excluir</a></td>
        </tr> 
        @endforeach
       </tbody>
    
</table>

</div>
</main>

<script>
  function category(){
  var category = document.getElementById('category')
  if (category.classList == 'category-mobile ml-10 mt-4 hidden'){
    category.classList.remove('hidden')
  }else{
    category.classList.add('hidden')
  } 
}



function menu(){
   var menu = document.querySelector('#menu')
   if (menu.classList == 'bg-gray-200 h-100 p-4 menu'){
 menu.classList.remove('menu')
   
    
       
   }else{
     
       menu.classList.add('menu')
       
   }
}

</script>
</body>
</html>