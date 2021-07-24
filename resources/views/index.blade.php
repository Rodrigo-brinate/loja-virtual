
<!-- @include('partials.header') -->








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
    </style>
</head>
<body>


  <!-- ##########################     cabesalho    #####################################-->
    <header class="pt-4 pb-4 pl-2 pr-2">
        <div id="header" class="flex justify-between items-center ">
          <a class="no-underline text-black" href="{{ route('app.index') }}">
           <h2 class="ml-2 text-2xl">logo</h2>
          </a>
          <input placeholder="pesquisar" class="border-b-2 border-black p-4 search" type="search"  name="" id="">

          <div class="flex mr-10">
            <a href="{{route('app.favorite')}}">
              <img class="p-4 w-16 h-16" src="./img/favorite.png" alt="">
            </a>
            <a href="{{route('app.cart')}}">
              <img class="p-4 w-16 h-16" src="./img/cart.png" alt="">
            </a>
            <a href="{{route('app.profile')}}">
              <img class="p-4 w-16 h-16" src="./img/profile.png" alt="">
            </a>
          </div>
       </div>

       <ul class="category flex ml-10 mt-4">
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





    <main class="d-block">
      <br><br>
      <div class="d-block w-100 my-auto " >
              <div id="carouselExampleInterval" class="carousel w-75 mx-auto justify-center slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                      <img src="https://cdn.pixabay.com/photo/2016/12/03/01/35/black-friday-1878945_960_720.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                      <img src="https://cdn.pixabay.com/photo/2016/12/03/01/35/black-friday-1878945_960_720.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="https://cdn.pixabay.com/photo/2016/12/03/01/35/black-friday-1878945_960_720.png" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
      </div>
      <br>
      <div id="product " class=" inline-block mx-8"> 
      @foreach ($product as $item)
      <div class="card w-40  ml-6  mt-4  p-2 inline-block" >
        
          <img  src="{{ url("storage/{$item->photo_main}") }}" class=" img-card mx-auto w-24 "  alt="...">
          <form class="float-right mr-2 mb-4" action="{{route('app.addFavorite')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
         <button class="float-rigth">
           <img class="float-right "  src="./img/favorite.png" width="30px" alt=""> 
          </button>
        </form>
        <br><br>
          <div class="card-body">
          <h5 class="card-title font-normal -mb-8 text-sm" style="margin-bottom: -5rem">{{substr($item->product_name,0,20)}}</h5>
          <p class="text-gray-400 text-sm">{{substr($item->product_description,0,40)}}</p>
          
            <p class="card-text">{{$item->value}}</p>
            <a href="product/{{$item->id}}" class="btn font-normal mx-auto text-sm btn-primary">ver mais</a>
        
          </div>
         

        </div>
       @endforeach
       
      
      
      </div>
      
</div>
 
<br><br>




</div>
      
          </main>











<link rel="stylesheet" href="./css/index.css">
<script>
  function category(){
  var category = document.getElementById('category')
  console.log(category.classList)
  if (category.classList == 'category-mobile ml-10 mt-4 hidden'){
    category.classList.remove('hidden')
  }else{
    category.classList.add('hidden')
  }
  
  
  
  }
  
  
      </script>


<script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>