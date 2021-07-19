<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/product.css">
     <title>Document</title>
    
</head>
<body>
    <div class="container1">
<header>


<a href="{{ route('app.index') }}">
<img src="../img/logo.png" class="logo" width="100px" alt="logo">
</a>

<span >
<div><a href="">contato</a> <a href="">sobre nos</a></div>
<input class="search" type="text" placeholder="pesquisar">
</span>
<div class="rigth">
    
@if ($ranking == 1 || $ranking == 2)
<a href="{{route('adm.index')}}" class="adm">administrador</a>
@endif
<div class="profile">
    
@if ($name != null)
<h5>{{$name}}</h5>
<a href="{{ route('app.logout') }}">sair</a>
@else

    <a href="{{route('app.login')}}">
<h4>seja bem vindo</h4>
<p>entre ou cadastre-se</p>
</a>
@endif
</div>
<img class="cart" src="../img/cart.png" alt="">
<img class="favorites" src="../img/favorites.png" alt="">

</div>




<ul class="categories">
<li>categoria</li>
<li>categoria</li>
<li>categoria</li>
<li>categoria</li>
<li>categoria</li>
<li>categoria</li>
<li>categoria</li>
<li>categoria</li>
<li>categoria</li>
<li>categoria</li>


</ul>
</header>
</div>
 
    <br><br>

    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
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



    </div>

<h3>{{$product[0]->product_name}}</h3>
<h6>{{$product[0]->value}}</h6>
<p class="description" >{{$product[0]->product_description}}</p>


<h2>comentários</h2>
<br>
<br>
<br>
<form action="" method="post">

  
<span class="commet">escreva seu comentário</span>
<textarea name="commet" placeholder="digite aqui" type="text"></textarea>


<select class="star" name="star" >
    <option selected value="1">
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
  </select>
<button class="comment" type="submit">comentar</button>
</form>
<br><br><br><br><br><br><br>





    <script src="../bootstrap/js/bootstrap.min.js"></script>
    

    
    </body>

    </html>