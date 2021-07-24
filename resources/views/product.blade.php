

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
<style>

.search {
    background-image: url(/img/search.png);
    background-repeat: no-repeat;
    background-position: right;
}

.card {
    display: inline-block;
}

.card-title {
    height: 24vh;
}
 
@media only screen and (max-width: 940px){
  .category{
    display: none;
  }
}
@media only screen and (max-width: 620px){
 #header {
   display: block;
   margin-left: auto;
   margin-right: auto;
   width: max-content;
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

            <img class="p-4 w-16 h-16" src="../img/favorite.png" alt="">
<a href="{{route('app.cart')}}">
            <img class="p-4 w-16 h-16" src="../img/cart.png" alt="">
</a>
<a href="{{route('app.profile')}}">
            <img class="p-4 w-16 h-16" src="../img/profile.png" alt="">
</a>
          </div>
       </div>

        <ul class="category flex ml-10 mt-4">
          @foreach ($category as $item)
            <li class="ml-8">{{$item->category_name}}</li>
             @endforeach
        </ul>

<button class="mt-2 p-2 bg-gray-100 border-gray border-2" onclick="category()">categorias <sub>﹀</sub></button>
        <ul id="category" class="category-mobile  ml-10 mt-4 hidden">
          @foreach ($category as $item)
            <li class="ml-8">{{$item->category_name}}</li>
             @endforeach
        </ul>
        
    </header>
</div>
 
    <br><br>

    <div id="carouselExampleInterval" class="carousel slide mx-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="1000">
                <img src="{{ url("storage/{$product[0]->photo_main}") }}" class="d-block w-25" alt="...">
              </div>
            @foreach ($product as $item)
            
          <div class="carousel-item " data-bs-interval="10000">
            <img src="{{ url("storage/{$item->image}") }}" class="d-block w-25" alt="...">
          </div>
       @endforeach
        
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

<h3 class="mx-8">{{$product[0]->product_name}}</h3>
<h6 class="ml-8 mt-2 text-green-600">{{$product[0]->value}}</h6>
<br><br><br>
<a class="cart-purshase bg-yellow-400 ml-8 rounded-lg no-underline text-black p-2" href="../cart/{{$product[0]->product_id}}">adicionar ao carrinho</a>
<a class="checkout bg-green-500 rounded-lg no-underline text-black p-2" href="">comprar</a>
<br><br><br>
<p class="description mx-8" >{{$product[0]->product_description}}</p>


<h2 class="mx-auto block mt-10 w-max">comentários</h2>
<br>
<br>
<br>
<form action="{{route('app.addComment')}}" method="post">
@csrf
  
<span class="commet mx-auto block font-bold text-lg w-max">escreva seu comentário</span>
<textarea name="comment" class="mx-auto p-4 mt-2 block border-black border-b-2 w-max" placeholder="digite aqui" type="text"></textarea>

<input type="hidden" name="id" value="{{$product[0]->product_id}}">
<select class="star mx-auto block w-max mt-4" name="clacification" >
    <option aria-required="true" selected value="1">
       selecione uma classificação para esse produto
    </option>
    <option  value="1">
        ★
    </option>
    <option  value="2">
        ★★
    </option>

    <option  value="3">
        ★★★
    </option>
    <option  value="4">
      ★★★★
  </option>
  <option  value="5">
    ★★★★★
</option>

  </select>
<button class="comment mx-auto block w-max mt-4 p-3 rounded-lg bg-green-400" type="submit">comentar</button>
</form>
<br><br><br><br><br><br><br>


@foreach ($comment as $item)
    

<div class=" mx-16">
  <p class="flex"><img class="ml-4" src="../img/profile.png" alt="">{{$item->name}}</p>
  <p >{{$item->comment}}</p>

  @switch($item->clacification)
      @case(1)
      <p class="flex">
      <img src="../img/star-selected.png" alt="">
      <img src="../img/star-unselect.png" alt="">
     <img src="../img/star-unselect.png" alt="">
     <img src="../img/star-unselect.png" alt="">
     <img src="../img/star-unselect.png" alt="">
    </p>
          @break
      @case(2)
      <p class="flex">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
       <img src="../img/star-unselect.png" alt="">
       <img src="../img/star-unselect.png" alt="">
       <img src="../img/star-unselect.png" alt="">
      </p>
          @break
          @case(3)
      <p class="flex">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
       <img src="../img/star-unselect.png" alt="">
       <img src="../img/star-unselect.png" alt="">
      </p>
          @break
          @case(4)  <img src="" alt="">
      <p class="flex">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-unselect.png" alt="">
      </p>
          @break
          @case(5)
      <p class="flex">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
        <img src="../img/star-selected.png" alt="">
      </p>
          @break
      @default
          
  @endswitch
  
</div>
<br><br><br>
@endforeach
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    

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
    </body>

    </html>