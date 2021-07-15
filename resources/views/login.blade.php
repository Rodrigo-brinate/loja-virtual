


@include('partials.header')

<link rel="stylesheet"  href="./css/login.css">

    <form class="login" method="post" action="{{route('app.login')}}" >
@csrf
        <h3>Login</h3>

    <span class="login" >digite seu e-mail</span>

    @if ($email)
    <input class="login" value="{{$email}}" name="email" type="email">

    @else
    <input class="login" value="{{old('email')}}" name="email" type="email">

    @endif
    <span class="login">digite sua senha</span>
    
    @if ($password)
    <input class="login" value="{{$password}}" name="password" type="password">
    @else
    <input class="login" value="{{old('password')}}" name="password" type="password">
    @endif

    <button class="login" type="submit">Entrar</button>
    <br/>

    <p>Ainda não possui uma conta?
        <br/>
        <a href="{{route('app.register')}}">Cadastre-se</a>
    </p>

</form>
</body>
</html>