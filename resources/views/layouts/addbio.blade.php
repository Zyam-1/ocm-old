<?php  foreach($data as $values) { ?>
<tr id="<?php echo md5($values['Order'])?>" class="biotable">
        
             <td class="biovalue" id="bioval2"><?=$values['Order']?></td>
             <td><?=$values['Analyser']?></td>
             <td>
             <button  type="button"class="btn btn-danger btn-xs" id="delrow">
            <i class=" fa fa-trash" aria-hidden="true"></i>
            </button>
                      
             </td>

 </tr>
    <?php 
}

?>
   