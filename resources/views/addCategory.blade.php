<div class="container1"> 
    @include('partials.menuAdm')
    <link rel="stylesheet" href="./css/addCategory.css">
    <h3 class="addProduct">category</h3>

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

       

    <form action="{{ route('adm.addCategory') }}" enctype="multipart/form-data" method="post">
        @csrf
        <span> nome da categoria</span>
    <input name="name" required type="text">
    


  

    
    
    <button type="submit">cadastrar</button>
    </form>


    
    </div>
    </body>
    </html>