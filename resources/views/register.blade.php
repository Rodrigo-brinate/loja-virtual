@component('partials.head')
    <title>cadastro</title>
@endcomponent
@include('partials.header')
    


<link rel="stylesheet" href="./css/login.css">

<form class="login border-2 border-gray-300 shadow-md w-80 mx-auto" method="post" action="{{route('app.register')}}" >
@csrf
        <h3 class="block mx-auto login block mx-auto  w-max">cadastro</h3>

        <span class="login block mx-auto login block mt-2 mx-auto  w-max" >digite seu nome</span>
        <input class="login block mx-auto p-2 border-2 border-gray-500 rounded-lg bg-gray-100" name="name" type="text">

        <span class="login block mx-auto w-max mt-2" >digite seu e-mail</span>
        <input class="login block mx-auto p-2 border-2 border-gray-500 rounded-lg bg-gray-100" name="email" type="email">


    <span class="block mx-auto mt-2 w-max">digite sua senha</span>
    <input class="login block mx-auto p-2 border-2 border-gray-500 rounded-lg bg-gray-100" name="password" type="password">


        <button class="login block mx-auto mt-4 bg-yellow-500 px-3 py-2 rounded-md" type="submit">Cadastre-se</button>
    <br/>

    <p class="block mx-auto login block mx-auto  w-max">Ja possui possui uma conta?
        <br/>
        <a class="block mx-auto login block mx-auto  w-max" href="{{route('app.login')}}">Entre</a>
    </p>

</form>
</body>
</html>