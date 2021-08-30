@component('partials.head')
    <title>produto</title>
@endcomponent
@include('partials.header')
    

 
    <br><br>

    
        <div>
                <img src="{{ url("storage/{$product[0]->photo_main}") }}" class="d-block w-2/5 float-right mr-8" alt="...">
              </div>
           
        
 



   
<h3 class="mx-8 w-2/4 text-base">{{$product[0]->product_name}}</h3>

<p class="description text-sm w-2/4 mx-8" >{{$product[0]->product_description}}</p>
<h6 class="ml-8 mt-2 text-green-600">R$&nbsp;{{$product[0]->value}}</h6>
<br>
<a class="cart-purshase bg-yellow-400 ml-8 rounded-lg no-underline text-black p-2" href="../cart/{{$product[0]->id}}">adicionar ao carrinho</a>
<a class="checkout bg-green-500 rounded-lg no-underline text-black p-2" href="">comprar</a>
<br><br><br>
<br><br><br>


<h2 class="mx-auto block mt-24 w-max">comentários</h2>
<br>

<form action="{{route('app.addComment')}}" method="post">
@csrf
  
<span class="commet mx-auto block font-bold text-lg w-max">escreva seu comentário</span>
<textarea name="comment" class="mx-auto p-4 mt-2 block rounded-2xl w-max" placeholder="digite aqui" type="text"></textarea>

<input type="hidden" name="id" value="{{$product[0]->id}}">
<select class="star rounded-lg p-2 mx-auto block w-max mt-4" name="clacification" >
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
<button class="comment px-8  mx-auto block w-32 mt-4 p-3 rounded-lg bg-green-400" type="submit">comentar</button>
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