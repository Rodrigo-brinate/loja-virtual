@component('partials.head')
    <title>perfil</title>
@endcomponent

@include('partials.header')
    

<main class="flex">

        @include('partials.menuAdm')
        

      

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">




    <table class="table mx-4">
      <thead>
        <tr>
          <th scope="col">categoria</th>
          <th scope="col">editar</th>
          <th scope="col">excluir</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($category_view as $item)
        <tr>
          <th scope="row">{{$item->category_name}}</th>
          
          <td>
            <a href="/edit/category/{{$item->id}}">
              <button class="btn-warning px-2 py-1">editar</button>
            </a>
          </td>
         
          <td>
            <a href="/delete/category/{{$item->id}}">
              <button class="btn-danger px-2 py-1">excluir</button>
            </a>
          </td>
          
         
        </tr>
        
        @endforeach
      </tbody>
    </table>
    
    </main>

</body>
</html>