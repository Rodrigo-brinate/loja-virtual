<link rel="stylesheet" href="../../css/menuAdm.css">

<br>

<div id="menu" class="bg-gray-200 h-100  p-4 menu">
    <ul>
        <li class=" mt-4"> 
          <img class=" inline w-6" src="../../img/home.png" alt=""> 
          &nbsp;  home
        </li>
        @if ($ranking == 1 || $ranking == 2)
            
            <a class="no-underline text-black" href="{{route('adm.addProduct')}}">
                <li class=" mt-4"> <img class=" inline w-6" src="../../img/add.png" alt=""> 
                    &nbsp; adicionar produto
                </li>
            </a>

            <a class="no-underline text-black" href="{{route('adm.viewProduct')}}">
                <li class="mt-4" >
                    <img class=" inline w-6" src="../../img/altere.png" alt=""> 
                    &nbsp; gerenciar produtos
                </li>
            </a>

            <a class="no-underline text-black" href="{{route('adm.addCategory')}}">
                <li class="mt-4">
                    <img class=" inline w-6" src="../../img/add-category.png" alt=""> 
                    &nbsp; adicionar categoria
                </li>
            </a>

            <a class="no-underline text-black" href="{{route('adm.categoryView')}}">
                <li class="mt-4">
                    <img class=" inline w-6" src="../../img/edit-category.png" alt=""> 
                    &nbsp; gerenciar categorias
                </li>
            </a>
        @endif
        @if ($ranking == 1 )
        <a class="no-underline text-black" href="{{route('app.manangeUser')}}">
            <li class="mt-4">
                <img class=" inline w-6" src="../../img/manange-user.png" alt=""> 
                &nbsp; gerenciar usuários
            </li>
        </a>
        @endif

        <a class="no-underline text-black" href="{{route('app.logout')}}">
            <li class="mt-4">
               <img class=" inline w-6" src="../../img/logout.png" alt=""> 
               &nbsp; sair
            </li>
        </a>

    </ul>
</div>


<script src="../../js/menu-button.js"></script>