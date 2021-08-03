@component('partials.head')
    <title>pagina inicial</title>
@endcomponent
@include('partials.header')

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