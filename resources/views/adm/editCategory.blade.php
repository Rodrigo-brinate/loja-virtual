@component('partials.head')
    <title>perfil</title>
@endcomponent

@include('partials.header')
    

<main class="flex">

        @include('partials.menuAdm')
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

    <table class="table bg-gray-300 mx-4" >
        <thead>
            <tr>
              <th scope="col">categoria</th>
              <th scope="col">salvar</th>
            </tr>
        </thead>
          <tbody>
             <form action="" method="post">
              <tr>
                @csrf
              <th scope="row">
                 <input type="text" class="p-4" name="name" value="{{$category_edit->category_name}}">
              </th>

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