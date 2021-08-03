@component('partials.head')
    <title>perfil</title>
@endcomponent

@include('partials.header')
    

<main class="flex">

        @include('partials.menuAdm')

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<table class="table mx-4 bg-gray-300" >
    <thead>
        <tr>
          <th scope="col">nome do produto</th>
          <th scope="col">descrição do produto</th>
          <th scope="col">valor do produto</th>
          <th scope="col">salvar</th>
          
          
        </tr>
      </thead>
      <tbody>
       
              
         <form action="" method="post">
        <tr>
            @csrf
          <th scope="row">
            
            <textarea class="p-2" name="product_name" >{{$product->product_name}}</textarea>
          </th>

          <td>
            <textarea class="p-2" name="product_description" >{{$product->product_description}}</textarea>
          </td>

          <td>
            <input type="text" class="p-2" name="value" value="{{$product->value}}">
          </td>

          <td >
            <button style="border: none" class="edit btn-primary px-2 py-1" type="submit">salvar</button>
          </td>
          
        </tr> 
    </form>
       
       </tbody>
    
</table>

</div>
 </main>
</body>
</html>