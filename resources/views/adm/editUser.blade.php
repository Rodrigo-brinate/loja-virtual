@component('partials.head')
    <title>perfil</title>
@endcomponent

@include('partials.header')
    

<main class="flex">

        @include('partials.menuAdm')

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

<form action="{{route('app.updateUser')}}" method="post" >
    @csrf
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
       
              
         
        <tr>
            
            <input type="hidden" name="id" value="{{$user->id}}">
            <th scope="row">
                <textarea class="p-2" name="name" >{{$user->name}}</textarea>
            </th>
            <td>
                <textarea class="p-2" name="email" >{{$user->email}}</textarea>
            </td>
            <td>
              @switch($user->ranking)
                  @case(1)
                      <span class="d-block">gerente</span>
                      @break
                  @case(2)
                  <span class="d-block">adm</span>
                      @break
                  @case(3)
                  <span class="d-block">usuário</span>
                      @break
                  @default
              @endswitch
            
              <select name="ranking" id="">
                <option value="3">usuário</option>
                <option value="2">adm</option>
                <option value="1">gerente</option>
              </select>
          </td>

          <td >
            <button style="border:none" class="edit btn-primary px-2 py-1" type="submit">salvar</button>
          </td>
        </tr> 
   
       </tbody>
    
</table>
 </form>
</div>
 </main>
</body>
</html>