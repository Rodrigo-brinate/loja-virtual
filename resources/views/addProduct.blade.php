<div class="container1"> 
    @include('partials.menuAdm')
    <link rel="stylesheet" href="./css/addProduct.css">
    <h3 class="addProduct">adicionar produtos</h3>

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

       

    <form action="{{ route('adm.addProduct') }}" enctype="multipart/form-data" method="post">
        @csrf
        <span> nome do produto</span>
    <input name="name" required type="text">
    
    <span>decrição do produto</span>
    <input name="description" required type="text">
    
        <label for="main" >imagem principal / miniatura</label>
        <input id="main"  type="file" required name="main" >

    <label for="image">imagens do produto (utilize a tecla Ctrl para selecionar vários)</label>
    <input id="image" name="image[]" required type="file" multiple="multiple" id="">

    <span>valor do produto (use ponto ao invéis de virgula)</span>
    <input name="value" required placeholder="Ex: 99.99" type="number" step=".01" name="" id="">
    
    <button type="submit">cadastrar</button>
    </form>


    
    </div>
    </body>
    </html>