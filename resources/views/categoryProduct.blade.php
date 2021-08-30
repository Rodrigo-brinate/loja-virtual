@component('partials.head')
    <title>pagina inicial</title>
@endcomponent
@include('partials.header')

    <main class="d-block">
      <br><br>
      





        <div class=" w-4/5 mx-auto flex">

          <div class="rounded-full ml-2 pt-3 bg-white img-category ">
            <img class=" w-3/5  mx-auto" src="../../img/watch.jpg" alt="">
          </div>
            
            <div class="rounded-full ml-2 pt-7  bg-white img-category ">
              <img class="w-3/5  mx-auto " src="../../img/phone.jpg" alt="">
            </div>
            <div class="rounded-full ml-2 pt-7  bg-white img-category ">
              <img class="w-3/5  mx-auto " src="../../img/fone.jpg" alt="">
            </div>
            <div class="rounded-full ml-2 pt-7  bg-white img-category ">
              <img class="w-3/5  mx-auto " src="../../img/tv-box.webp" alt="">
            </div>
            <div class="rounded-full ml-2 pt-7  bg-white img-category ">
              <img class="w-3/5  mx-auto " src="../../img/carregador.webp" alt="">
            </div>
            <div class="rounded-full ml-2 pt-7  bg-white img-category ">
              <img class="w-3/5  mx-auto " src="../../img/tv-box.webp" alt="">
            </div>

        </div>

      <br>
      <div id="product " class=" inline-block mx-8"> 
      @foreach ($product as $item)
      <div class="card w-40  ml-6  mt-4  p-2 inline-block" >
        
          <img  src="{{ url("storage/{$item->photo_main}") }}" class=" img-card mx-auto w-32 "  alt="...">
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
          
            <p class="card-text text-green-600">{{$item->value}}</p>
            <a href="product/{{$item->id}}" class="btn font-normal mx-auto text-sm btn-primary">ver mais</a>
        
          </div>
         

        </div>
       @endforeach
       
      
      
      </div>
      
</div>
 
<br><br>




</div>
      
          </main>











<link rel="stylesheet" href="../../css/index.css">
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