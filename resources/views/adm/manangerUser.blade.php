@component('partials.head')
    <title>perfil</title>
@endcomponent

@include('partials.header')
    

<main class="flex">

        @include('partials.menuAdm')

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    

    <table class="table mx-4">
        <thead>
          <tr>
            <th scope="col">nome</th>
            <th scope="col">descrição</th>
            <th scope="col">valor</th>
            <th scope="col">editar</th>
            <th scope="col">deletar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($user as $item)
            <tr>
              <th scope="row">{{substr($item->name,0,40)}}</th>
              <td>{{substr($item->email,0,120)}}</td>
              @switch($item->ranking)
                  @case(1)
                  <td>gerente</td>
                      @break
                  @case(2)
                  <td>adm</td>
                      @break
                      @case(3)
                  <td>usuário</td>
                      @break
                  @default
                      
              @endswitch
              
  
              
              <td>
                <a href="/edit/user/{{$item->id}}">
                  <button class="btn-warning px-2 py-1"> editar</button>
                </a> 
              </td>
             
  
              
              <td>
                <a href="/delete/user/{{$item->id}}">
                  <button class="btn-danger px-2 py-1"> excluir</button> 
                </a> 
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

</div>
 </main>
</body>
</html>