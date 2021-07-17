<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/header.css">
    <title>Document</title>
    
</head>
<body>
    
<header>

<a href="{{ route('app.index') }}">
<img src="./img/logo.png" class="logo" alt="logo">
</a>

<input class="search" type="text" placeholder="pesquisar">
<img class="cart" src="./img/cart.png" alt="">
<img class="favorites" src="./img/favorites.png" alt="">
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