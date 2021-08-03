@component('partials.head')
    <title>perfil</title>
@endcomponent
@include('partials.header')
    






    <main class="flex">
      
      @include('partials.menuAdm')

      <table class="table mx-16">
        <thead>
          <tr>
            <th scope="col">nome</th>
            <th scope="col">email</th>
            <th scope="col">editar</th>
            <th scope="col">alterar senha</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            
            <td>  {{$profile->name}}</td>
            <td> <a class=" no-underline  rounded-lg text-black " href="/edit/category/{{$profile->id}}">{{$profile->email}}</a></td>
            <td><a class="no-underline  bg-yellow-500 px-2 py-1 text-black " href="/edit/profile/{{$profile->id}}">editar</a></td>
          </tr>
        </tbody>
      </table>
    </main>
    
<script src="./js/category-button.js"></script>
</body>
</html>

<link rel="stylesheet" href="./css/index.css">
