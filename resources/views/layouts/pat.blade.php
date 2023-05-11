<style>
    th{
        width:10rem;
    }
</style>
<div>
    
<table class="table table-striped">
    <thead>
        <tr>
        <th>Sample ID</th>
        <th>Run Date</th>
        <th>Sample Date</th>
        <th>Sample Details</th>
        <th>Hospital</th>
        </tr>
    </thead>

    <tbody>
   
    @foreach($data as $dat)
    @foreach($dat as $key=>$d)
    <tr> 
  
   <td>{{$d}}
    </td>

    <td>
        -
    </td>

    <td>
    {{$key}}
    </td>
  <td>
    -
  </td>
  <td>
    {{$hospital[0]->name}}
  </td>
   
      </tr>
      @endforeach
      @endforeach

    </tbody>
</table>

</div>