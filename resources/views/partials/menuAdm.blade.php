<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="./css/menuAdm.css">
    <title>Home</title>
</head>
<body>
    
    <div class="menu1">
        <a href="{{route('adm.index')}}"><h2 class="menu1">Dashbord</h2></a>
        <ul class="menu1">
            <a href="{{route('adm.addProduct')}}"><li>adicionar produto</li></a>
            <a href="{{route('adm.viewProduct')}}"><li>ver produto</li></a>
            <a href="{{route('app.index')}}"><li>voltar a loja</li></a>
            <li>mananger user</li>
            <a href="{{route('adm.addCategory')}}"><li>adicionar categirias</li></a>
            <a href="{{route('adm.categoryView')}}"><li>ver categirias</li></a>
           
        </ul>
    </div>