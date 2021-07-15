


@include('partials.header')

<link rel="stylesheet" href="./css/login.css">

<form class="login" method="post" action="{{route('app.register')}}" >
@csrf
        <h3>cadastro</h3>

        <span class="login" >digite seu nome</span>
        <input class="login" name="name" type="text">

        <span class="login" >digite seu e-mail</span>
        <input class="login" name="email" type="email">


    <span class="login">digite sua senha</span>
    <input class="login" name="password" type="password">


        <button class="login" type="submit">Cadastre-se</button>
    <br/>

    <p>Ja possui possui uma conta?
        <br/>
        <a href="{{route('app.login')}}">Entre</a>
    </p>

</form>
</body>
</html>