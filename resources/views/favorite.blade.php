@component('partials.head')
    <title>favoritos</title>
@endcomponent
@include('partials.header')
    


</div>


<main>
 <br><br>
 <h1 class="mx-auto d-block w-max">seus produtos favoritos</h1>
  <ul>
    @foreach ($product as $item)
   
  
    <li class="flex justify-between">
      <div class="flex">
      <img width="100px" class="inline" src="{{ url("storage/{$item->photo_main}") }}" alt="">
      <a class="ml-8 no-underline text-black" href="product/{{$item->id}}">
        <h6>{{$item->product_name}}</h6>
      </a> 
      <p class="cart-img ml-8 ">valor: &nbsp; R$ {{$item->value}}</p></div>
      <a href="deleteFavorite/{{$item->id}}">
      <img src="./img/excluir.png" class="w-5 h-5 mr-16" alt=""></a>
    </li>
    <br>
    @endforeach
  </ul>
</main>



    <script src="../bootstrap/js/bootstrap.min.js"></script>
    

    
    </body>

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
    </html>