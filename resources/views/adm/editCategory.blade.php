
    
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <title>home</title>
</head>
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
<body>
    <header class="pt-4 pb-4 pl-2 pr-2">
        <div id="header" class="flex justify-between items-center ">
          <a class="no-underline text-black" href="{{ route('app.index') }}">
        <h2 class="ml-2 text-2xl">logo</h2>
          </a>
        <input placeholder="pesquisar" class="border-b-2 border-black p-4 search" type="search"  name="" id="">

        <div class="flex mr-10">
            <a href="{{route('app.favorite')}}">
            <img class="p-4 w-16 h-16" src="../img/favorite.png" alt="">
            </a>
<a href="{{route('app.cart')}}">
            <img class="p-4 w-16 h-16" src="../img/cart.png" alt="">
</a>
<a href="{{route('app.profile')}}">
            <img class="p-4 w-16 h-16" src="../img/profile.png" alt="">
</a>
          </div>
       </div>

        <ul class="category flex ml-10 mt-4">
          @foreach ($category_header as $item)
            <li class="ml-8">{{$item->category_name}}</li>
             @endforeach
        </ul>

<button class="mt-2 p-2 bg-gray-100 border-gray border-2" onclick="category()">categorias <sub>﹀</sub></button>
        <ul id="category" class="category-mobile  ml-10 mt-4 hidden">
          @foreach ($category_header as $item)
            <li class="ml-8">{{$item->category_name}}</li>
             @endforeach
        </ul>
        
    </header>
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <table class="table table-striped table-hover" >
        <thead>
            <tr>
              <th scope="col">nome do produto</th>
              <th scope="col">descrição do produto</th>
              <th scope="col">valor do produto</th>
              <th scope="col"><a class="editar" href="">editar</a></th>
              <th scope="col"><a class="excluir" href="">excluir</a></th>
    
              
            </tr>
          </thead>
         
              
          
          <tbody>
           
                  
             <form action="" method="post">
            <tr>
                @csrf
              <th scope="row">
                 <input type="text" name="name" value="{{$category->category_name}}">
                </th>
              
              <td >
                <button style="border: none" class="edit" type="submit">salvar</button>
              </td>
            </tr> 
        </form>
           
           </tbody>
        
    </table>
    
    </div>


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