<body id="body"  class="">
    <header class="pt-4 pb-4 pl-2 pr-2">
        <div id="header" class="flex justify-between items-center ">

            <a class="no-underline text-black" href="{{ route('app.index') }}">
                <h2 class="ml-2 text-2xl">logo</h2>
            </a>

            <input placeholder="pesquisar" class="border-b-2 border-black p-4 search" type="search"  name="" id="">

            <div class="flex mr-10">
                <a href="{{route('app.favorite')}}">
                    <img class="p-4 w-16 h-16" src="../../img/favorite.png" alt="">
                </a>

                <a href="{{route('app.cart')}}">
                    <img class="p-4 w-16 h-16" src="../../img/cart.png" alt="">
                </a>

                <a href="{{route('app.profile')}}">
                    <img class="p-4 w-16 h-16" src="../../img/profile.png" alt="">
                </a>
            </div>
       </div>

        <ul class="category flex ml-10 mt-4">
          @foreach ($category as $item)
            <li class="ml-8">{{$item->category_name}}</li>
          @endforeach
        </ul>

        <button id="" class="mt-2 p-2 bg-gray-100 category-responsive border-gray border-2" onclick="category()">categorias <sub>﹀</sub></button>
        <ul id="category" class="category-mobile  ml-10 mt-4 hidden">
          @foreach ($category as $item)
            <li class="ml-8">{{$item->category_name}}</li>
          @endforeach
        </ul>
        
    </header>
    <button onclick="menu()" class="menu-button w-10 h-10 bg-no-repeat"></button>
    
    <script src="../../js/category-button.js"></script>