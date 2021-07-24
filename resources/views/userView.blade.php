<div class="container1"> 
    @include('partials.menuAdm')
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<table class="table table-striped table-hover" >
    <thead>
        <tr>
          <th scope="col">nome do usário</th>
          <th scope="col">emai do usuario</th>
          <th scope="col">ranking do usuario</th>
          <th scope="col"><a class="editar" href="">editar</a></th>
          <th scope="col"><a class="excluir" href="">excluir</a></th>
          
        </tr>
      </thead>
      <tbody>
          @foreach ($user as $item)
              
         
        <tr>
          
          <td>{{$item->name}}</td>
          <td>{{$item->email}}</td>
          <td>{{$item->ranking}}</td>
          <td><a class="edit" href="/edit/category/{{$item->id}}">editar</a></td>
          <td><a class="delete" href="/delete/category/{{$item->id}}">excluir</a></td>
        </tr> 
        @endforeach
       </tbody>
    
</table>

</div>