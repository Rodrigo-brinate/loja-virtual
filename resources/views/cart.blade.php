@component('partials.head')
    <title>carrinho</title>
@endcomponent
@include('partials.header')
    


</div>
 <br> <h1 class="mx-auto d-block w-max">Carrinho</h1>
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

<div class="total float-right mt-8 mr-8">total: R$ {{$total}} 
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