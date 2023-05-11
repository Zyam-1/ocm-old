@foreach($data['Order'] as $key=>$d)
<tr id="<?php echo md5($d); ?>" class="coagtable">
  
        <td class="coaghaem">{{$d}}</td>

      <td>
        {{$data['Analyser'][0]}}
      </td>
<td>
 <button  type="button"class="btn btn-danger btn-xs" id="delrow2">
<i class=" fa fa-trash" aria-hidden="true"></i>
</button>
 </td>
    </tr>
    @endforeach

