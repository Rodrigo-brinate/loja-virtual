<div class="container1"> 
    @include('partials.menuAdm')
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<table class="table table-striped table-hover" >
    <thead>
        <tr>
          <th scope="col">nome do produto</th>
          <th scope="col">descrição do produto</th>
          <th scope="col">valor do produto</th>
          <th scope="col"><a class="editar" href="">editar</a></th>
          <th scope="col"><a class="excluir" href="">excluir</a></th>
          
        </tr>
      </thead>
      <tbody>
          @foreach ($product as $item)
              
         
        <tr>
          <th scope="row">{{$item->product_name}}</th>
          <td>{{$item->product_description}}</td>
          <td>{{$item->value}}</td>
          <td><a class="edit" href="/edit/{{$item->id}}">editar</a></td>
          <td><a class="delete" href="/delete/{{$item->id}}">excluir</a></td>
        </tr> 
        @endforeach
       </tbody>
    
</table>

</div>