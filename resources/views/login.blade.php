@component('partials.head')
    <title>login</title>
@endcomponent
@include('partials.header')
    


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
      <button class="login block mx-auto mt-4 bg-yellow-500 px-3 py-2 rounded-md" type="submit">Entrar</button>
    <br/>

    <p class="block mx-auto w-max">Ainda não possui uma conta?
        <br/>
        <a class="block mx-auto w-max" href="{{route('app.register')}}">Cadastre-se</a>
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