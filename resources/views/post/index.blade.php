<table class="table">
  <thead>
    <tr>
      <th scope="col">Active</th>
      <th scope="col">Title</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cartas as $carta )
        
    <tr>
      
      <td>{{$carta->active}}</td>
      <td>{{$carta->title}}</td>
      
    </tr>
    @endforeach
    
</table>