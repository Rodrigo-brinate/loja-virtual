 
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

    <style>@media only screen and (max-width: 940px){
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
       
        <div id="header" class="flex justify-between items-center ">  
            <!-- logo -->
          <a class="no-underline text-black" href="{{ route('app.index') }}">
        <h2 class="ml-2 text-2xl">logo</h2>
          </a>
          <!-- barra de pesquisa -->
        <input placeholder="pesquisar" class="border-b-2 border-black p-4 search" type="search"  name="" id="">

        <div class="flex mr-10">
    <!-- icone favoritos -->
    <a href="{{route('app.favorite')}}">
                     <img class="p-4 w-16 h-16" src="./img/favorite.png" alt="">
    </a>
    <!-- carrinho -->
            <a href="{{route('app.cart')}}">
                     <img class="p-4 w-16 h-16" src="./img/cart.png" alt="">
            </a>

    <!-- perfil -->
            <a href="{{route('app.profile')}}">
                    <img class="p-4 w-16 h-16" src="./img/profile.png" alt="">
            </a>
        </div>


       </div>

        <ul class="flex ml-10 mt-4">
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
</div>
 <br><br>
  <ul>
    
    @foreach ($products as $item)
   
  
      
  
    <li class="flex justify-between">
      <div class="flex">
      <img width="100px" class="inline" src="{{ url("storage/{$item->photo_main}") }}" alt="">
      <a class="ml-8 no-underline text-black" href="product/{{$item->id}}">
        <h6>{{$item->product_name}}</h6>
      </a> 
      <p class="cart-img ml-8 ">valor: &nbsp; R$ {{$item->value}}</p></div>
      <a href="deleteCart/{{$item->id}}">
      <img src="./img/excluir.png" class="w-5 h-5 mr-16" alt=""></a>
    </li>
    <br>
    
    @endforeach
     
  </ul>

<div class="total float-right mr-8">total: R$ {{$total}} 
  <a class="no-underline text-black p-3 bg-green-400 ">finalizar</a></div>


    <script src="../bootstrap/js/bootstrap.min.js"></script>
    

    
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