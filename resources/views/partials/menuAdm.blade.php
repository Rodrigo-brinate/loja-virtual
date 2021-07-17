<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/menuAdm.css">
    <title>Home</title>
</head>
<body>
    <div class="menu">
        <a href="{{route('adm.index')}}"><h2 class="menu">Dashbord</h2></a>
        <ul class="menu">
            <a href="{{route('adm.addProduct')}}"><li>adicionar produto</li></a>
            <li>remover produto</li>
            <li>alterar produto</li>
        </ul>
    </div>