


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
       
        <div id="header" class="flex justify-between  items-center ">  
            <!-- logo -->
          <a class="no-underline text-black" href="{{ route('app.index') }}">
        <h2 class="ml-2 text-2xl">logo</h2>
          </a>
          <!-- barra de pesquisa -->
        <input placeholder="pesquisar" class="border-b-2 border-black p-4 search" type="search"  name="" id="">

        <div class="flex mr-10">
    <!-- icone favoritos -->
                     <img class="p-4 w-16 h-16" src="./img/favorite.png" alt="">

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




<button onclick="menu()" class="menu-button w-10 h-10 bg-no-repeat"></button>

    <main class="flex">
      
       

        

      <div id="menu"  class="bg-gray-200 h-100 p-4 menu ">
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




    <link rel="stylesheet" href="./ccss/addProduct.css">
<div class="mx-auto">
    <h3 class="addProduct mx-auto block w-max h-max">adicionar produtos</h3>

    @if ($sucess != null)
    <div class="alert alert-success mx-auto block w-max" role="alert">
       produto adicionado com successo
      </div>
        @endif

        @if ($erro != null)
    <div class="alert alert-danger mx-auto block w-max" role="alert">
       {{$erro}}
      </div>
        @endif

       
<br>
<div>
    <form class="block" action="{{ route('adm.addProduct') }}" enctype="multipart/form-data" method="post">
        @csrf
        <span class="mx-auto block w-max"> nome do produto</span>
    <input name="name" class="mx-auto block w-max border-b-2 border-black" required type="text">
    
    <span class="mx-auto block w-max mt-4">decrição do produto</span>
    <input name="description" class="mx-auto block w-max border-b-2 border-black" required type="text">
    
        <select class="mx-auto block w-max mt-4 p-4" name="category" id="">
            <option selected  value="">selecione uma categoria</option>
            @foreach ($category as $item)
                
           
            <option  value="{{$item->id}}">{{$item->category_name}}</option>
             @endforeach
        </select>

        <label for="main" class="mx-auto block w-max mt-4 bg-blue-400 p-4 text-black" >imagem principal / miniatura</label>
        <input id="main" class="mx-auto block w-max hidden"  type="file" required name="main" >

    <label for="image" class="mx-auto block w-max bg-blue-400 mt-4 p-4 text-black">imagens do produto (utilize a tecla Ctrl para selecionar vários)</label>
    <input id="image" class="mx-auto block w-max hidden" name="image[]" required type="file" multiple="multiple" id="">

    <span class="mx-auto block mt-4 w-max">valor do produto (use ponto ao invéis de virgula)</span>
    <input class="mx-auto block w-max border-b-2 border-black p-4" name="value" required placeholder="Ex: 99.99" type="number" step=".01" name="" id="">
    
    <button class="mx-auto block mt-4 bg-blue-500 p-3 rounded-lg w-max" type="submit">cadastrar</button>
    </form>
<br><br><br><br>
</div>
    
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