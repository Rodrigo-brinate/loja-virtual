



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
    <title>home</title>
</head>
<body>
    <header class="pt-4 pb-4 pl-2 pr-2">
        <div class="flex justify-between items-center ">
          <a class="no-underline text-black" href="{{ route('app.index') }}">
        <h2 class="ml-2 text-2xl">logo</h2>
          </a>
        <input placeholder="pesquisar" class="border-b-2 border-black p-4 search" type="search"  name="" id="">
        <div class="flex mr-10">

            <img class="p-4 w-16 h-16" src="./img/favorite.png" alt="">
<a href="{{route('app.cart')}}">
            <img class="p-4 w-16 h-16" src="./img/cart.png" alt="">
</a>
<a href="{{route('app.profile')}}">
            <img class="p-4 w-16 h-16" src="./img/profile.png" alt="">
</a>
          </div>
       </div>

        <ul class="flex ml-10 mt-4">
          @foreach ($category as $item)
            <li class="ml-8">{{$item->category_name}}</li>
             @endforeach
        </ul>

        <ul class="categories">
          
              
          
      <li></li>
     
      
      
      </ul>
    </header>


<link rel="stylesheet" href="./css/login.css">

<form class="login" method="post" action="{{route('app.register')}}" >
@csrf
        <h3 class="block mx-auto login block mx-auto  w-max">cadastro</h3>

        <span class="login block mx-auto login block mt-2 mx-auto  w-max" >digite seu nome</span>
        <input class="login block mx-auto p-2 border-b-2 border-black bg-gray-100" name="name" type="text">

        <span class="login block mx-auto w-max mt-2" >digite seu e-mail</span>
        <input class="login block mx-auto p-2 border-b-2 border-black bg-gray-100" name="email" type="email">


    <span class="block mx-auto mt-2 w-max">digite sua senha</span>
    <input class="login block mx-auto p-2 border-b-2 border-black bg-gray-100" name="password" type="password">


        <button class="login block mx-auto mt-2 w-max" type="submit">Cadastre-se</button>
    <br/>

    <p class="block mx-auto login block mx-auto  w-max">Ja possui possui uma conta?
        <br/>
        <a class="block mx-auto login block mx-auto  w-max" href="{{route('app.login')}}">Entre</a>
    </p>

</form>
</body>
</html>