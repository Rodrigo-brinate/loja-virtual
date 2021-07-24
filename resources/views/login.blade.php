

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
    <style>
       


@media only screen and (max-width: 940px){
  .category{
    display: none;
  }
}
#categoryes {
  display: none;
}
@media only screen and (max-width: 620px){
 #header {
   display: block;
   margin-left: auto;
   margin-right: auto;
   width: max-content;
 }
 .card {
  display: flex;
  height: 35vh;
  width: 30vw
 }
 #categoryes {
   display: inline;
 }
 #product {
  margin-left: auto !important;
  margin-right: auto !important;
  display: block !important;
 }
 .card-title {
   font-size: 12pt;
   margin-bottom: -195px !important
 }
 .img-card {
   width: 15vw
 }
}
    
    </style>
</head>
<body>
    <header class="pt-4 pb-4 pl-2 pr-2">
        <div id="header" class="flex justify-between items-center ">
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

        <ul class="flex category ml-10 mt-4">
          @foreach ($category as $item)
            <li class="ml-8">{{$item->category_name}}</li>
             @endforeach
        </ul>

        <button id="categoryes" class="mt-2 p-2 bg-gray-100 border-gray border-2" onclick="category()">categorias <sub>﹀</sub></button>
        <ul id="category" class="category-mobile  ml-10 mt-4 hidden">
          @foreach ($category as $item)
            <li class="ml-8">{{$item->category_name}}</li>
          @endforeach
        </ul>
    </header>

<main>
  <link rel="stylesheet"  href="./css/login.css">

  @if ($erro != null)
    <div class="alert alert-danger" width="80%" role="alert">
        email ou senha incorreta
    </div>
  @endif

    <form class="login" method="post" action="{{route('app.login')}}" >
@csrf
        <h3 class="block mx-auto w-max">Login</h3>

    <span class="login block mx-auto w-max mt-4" >digite seu e-mail</span>
    @if ($email)
      <input class="login block mx-auto p-2 border-b-2 border-black bg-gray-100" value="{{$email}}" name="email" type="email">
    @else
      <input class="login block mx-auto p-2 border-b-2 border-black bg-gray-100" value="{{old('email')}}" name="email" type="email">
    @endif
      <span class="login block mx-auto w-max mt-4">digite sua senha</span>
    @if ($password)
      <input class="login block mx-auto p-2 border-b-2 border-black bg-gray-100" value="{{$password}}" name="password" type="password">
    @else
      <input class="login block mx-auto p-2 border-b-2 border-black bg-gray-100" value="{{old('password')}}" name="password" type="password">
    @endif
      <button class="login block mx-auto mt-4" type="submit">Entrar</button>
    <br/>

    <p class="block mx-auto w-max">Ainda não possui uma conta?
        <br/>
        <a href="{{route('app.register')}}">Cadastre-se</a>
    </p>

</form>
</main>

<script>
  function category(){
  var category = document.getElementById('category')
  if (category.classList == 'category-mobile ml-10 mt-4 hidden'){
    category.classList.remove('hidden')
  }else{
    category.classList.add('hidden')
  } 
}
</script>

</body>
</html>