@component('partials.head')
    <title>produto</title>
@endcomponent
@include('partials.header')
    

 
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
  <div class="flex justify-between">
    <div>
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
          <div>
  @endswitch
</div>
  @if ($email == $item->email)
    <a href="../comment/delete/{{$item->identification}}"><img class="w-8 mt-8 h-8" src="../img/excluir.png" alt=""></a>
@endif
</div>
</div>
</div>


<br><br><br>
@endforeach
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    

  </div>
  </div>
  
    </body>

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


    </html>