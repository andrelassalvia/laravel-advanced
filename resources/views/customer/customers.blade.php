<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">user_id</th>
      <th scope="col">name</th>
      <th scope="col">active</th>
      <th scope="col">user name</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($customers as $customer)
        
    <tr>
      <th scope="row">{{$customer->id}}</th>
      <td>{{$customer->user_id}}</td>
      <td>{{$customer->name}}</td>
      <td>{{$customer->active}}</td>
      <td>{{$customer->user->name}}</td>
    </tr>
    
    @endforeach
  </tbody>
</table>