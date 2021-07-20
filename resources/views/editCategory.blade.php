
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../../css/menuAdm.css">
        <title>Home</title>
    </head>
    <body>
        <div class="container1"> 
        <div class="menu1">
            <a href="{{route('adm.index')}}"><h2 class="menu1">Dashbord</h2></a>
            <ul class="menu1">
                <a href="{{route('adm.addProduct')}}"><li>adicionar produto</li></a>
                <a href="{{route('adm.viewProduct')}}"><li>ver produto</li></a>
                <a href="{{route('app.index')}}"><li>voltar a loja</li></a>
                <a href="{{route('adm.addCategory')}}"><li>adicionar categirias</li></a>
               
                
            </ul>
        </div>
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <table class="table table-striped table-hover" >
        <thead>
            <tr>
              <th scope="col">nome do produto</th>
              <th scope="col">descrição do produto</th>
              <th scope="col">valor do produto</th>
              <th scope="col"><a class="editar" href="">editar</a></th>
              <th scope="col"><a class="excluir" href="">excluir</a></th>
    
              
            </tr>
          </thead>
          <tbody>
           
                  
             <form action="" method="post">
            <tr>
                @csrf
              <th scope="row"> <input type="text" name="name" value="{{$category->category_name}}"></th>
              
              <td ><button style="border: none" class="edit" type="submit">salvar</button></td>
            </tr> 
        </form>
           
           </tbody>
        
    </table>
    
    </div>