@component('partials.head')
    <title>perfil</title>
@endcomponent

@include('partials.header')
    




<main class="flex">
      
      @include('partials.menuAdm')

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
          
          <button  class="mx-auto block mt-4 bg-blue-500 p-3 rounded-lg w-max" type="submit">cadastrar</button>
        </form>
        <br>
        <br>
        <br>
        <br>
    </div>
    
  </div>
</main>

    <script>
     
    </script>
</body>
</html>