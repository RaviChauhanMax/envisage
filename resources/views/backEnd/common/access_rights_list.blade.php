<?php foreach($access_rights as $management){ ?>
<div class="form-body">
    <label class="label-name-title">{{ ucfirst($management['name']) }}</label>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <ul class="users-ul">
            <?php foreach($management['module_list'] as $module){ ?>
                <li>
                    <div class="checkbox checkbox-value"> 
                    <!-- name="module_code[]" value="{{ $module['module_code'] }}" -->
                        <?php
                        $chekd_checkbx = 0;
                        $total_checkbx = 0;
                        foreach($module['sub_modules'] as $sub_modules){
                            if(in_array($sub_modules['id'],$available_rights)){
                                $chekd_checkbx++; 
                            }
                            $total_checkbx++;
                        }
                    
                        if($total_checkbx == $chekd_checkbx){
                            $selected = 'y';
                        } else{
                            $selected = 'n';
                        }
                        ?>

                    <label class="inner-name-title"><input type="checkbox" class="acc_heading_chkbox ok_select" {{ ($selected == 'y') ? 'checked':'' }} > {{ ucfirst($module['module_name']) }}</label>
                    <ul type="none" class="sub-checkbox">
                        <?php  foreach($module['sub_modules'] as $sub_modules){ ?>

                        <li><label><input type="checkbox" name="access_id[]" value="{{ $sub_modules['id'] }}" class="ok_select" {{ (in_array($sub_modules['id'],$available_rights)) ? 'checked':'' }} >{{ ucfirst($sub_modules['submodule_name']) }}</label></li>
                        
                        <?php } ?>
                    </ul>
                  </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>           

<script type="text/javascript">
$(document).ready(function() {
    $('.acc_heading_chkbox').click(function(){
        
        if($(this).is(':checked')) { 
            $(this).parent().siblings('ul').find('input').prop('checked',true);
        } else{ 
            $(this).parent().siblings('ul').find('input').prop('checked',false);
        }
    });
});
</script>
