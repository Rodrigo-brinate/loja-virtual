@component('partials.head')
    <title>perfil</title>
@endcomponent

@include('partials.header')
    
  <main class="flex">
        
      @include('partials.menuAdm')
    
      @if ($sucess != null)
        <div class="alert alert-success" role="alert">
          produto adicionado com successo
        </div>
      @endif

      @if ($erro != null)
      <div class="alert alert-danger" role="alert">
        {{$erro}}
      </div>
      @endif
      <br>
       
      <form class="block mx-auto" action="{{ route('adm.addCategory') }}" enctype="multipart/form-data" method="post">
          @csrf
          <h3 class="addProduct block w-max mx-auto">adicionar categoria</h3>
      
          <input name="name" placeholder="digite o nome da categoria" class="p-2 block mx-auto border-b-2 border-black"  required type="text">
    
          <button class="mx-auto block mt-2 p-2" type="submit">cadastrar</button>

        </form>
    </main>
</body>
</html>