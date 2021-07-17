<div class="container"> 
    @include('partials.menuAdm')
    <link rel="stylesheet" href="./css/addProduct.css">
    <h3 class="addProduct">adicionar produtos</h3>


    <form action="{{route('adm.addProduct')}}" enctype="multipart/form-data" method="post">
        @csrf
        <span> nome do produto</span>
    <input name="name" type="text">
    
    <span>decrição do produto</span>
    <input name="description" type="text">
    
    <span>imagens do produto</span>
    <input name="image[]" type="file" multiple="multiple" id="">

    <span>valor do produto </span>
    <input name="value" type="number" name="" id="">
    
    <button type="submit">cadastrar</button>
    </form>


    
    </div>
    </body>
    </html>