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
          <th scope="col">nome</th>
          <th scope="col">descrição</th>
          <th scope="col">valor</th>
          <th scope="col">editar</th>
          <th scope="col">deletar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($product as $item)
          <tr>
            <th scope="row">{{substr($item->product_name,0,40)}}</th>
            <td>{{substr($item->product_description,0,120)}}</td>
            <td>{{$item->value}}</td>

            
            <td>
              <a href="/edit/{{$item->product_name}}">
                <button class="btn-warning px-2 py-1"> editar</button>
              </a> 
            </td>
           

            
            <td>
              <a href="/delete/{{$item->product_name}}">
                <button class="btn-danger px-2 py-1"> excluir</button> 
              </a> 
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    










    <!--
  <table class="table table-striped table-hover mx-4" >
      <thead>
          <tr>
            <th scope="col">nome do produto</th>
            <th scope="col">descrição do produto</th>
            <th scope="col">valor do produto</th>
            <th>usuario</th>
            <th scope="col">editar</th>
            <th scope="col">excluir</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($product as $item)
                
          
          <tr>
            <th class="font-normal">{{substr($item->product_name,0,40)}}</th>
            <td>{{substr($item->product_description,0,120)}}</td>
            <td>{{$item->value}}</td>
            <td style="overflow: unset">{{$item->name}}</td>
            <td><a class="edit no-underline  bg-yellow-500 p-2 rounded-lg text-black" href="/edit/{{$item->product_name}}">editar</a></td>
            <td><a class="delete no-underline  bg-red-500 p-2 rounded-lg text-black" href="/delete/{{$item->product_name}}">excluir</a></td>
          </tr> 
          @endforeach
        </tbody>
      
  </table>
-->
</div>
</main>

<script>
  function category(){
  var category = document.getElementById('category')
  if (category.classList == 'category-mobile ml-10 mt-4 hidden'){
    category.classList.remove('hidden')
  }else{
    category.classList.add('hidden')
  } 
}



function menu(){
   var menu = document.querySelector('#menu')
   if (menu.classList == 'bg-gray-200 h-100 p-4 menu'){
 menu.classList.remove('menu')
   
    
       
   }else{
     
       menu.classList.add('menu')
       
   }
}

</script>
</body>
</html>