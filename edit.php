<?php defined('_JEXEC') or die(); ?>
<h3>Edit <?php echo $registry['statistics'][0]['title'];?></h3>
<?php if(!empty($message[0])){?>
    <p class="msg <?php echo $message[0];?>"><?php echo $message[1];?></p>
<?php }?>
<form action="" method="post" enctype="multipart/form-data">
    <table class="table table-hover">
        <tr>
            <th>
                <?if(count($registry['images']) > 0):?>
                <img src="http://<?=$_SERVER['SERVER_NAME'].'/'.$theme.'uploads/'.$registry['images'][0];?>" height="60"/>
                <?endif;?>
            </th><td><input type="file" name="img[]"/></td><td><a onclick="addField(this);" class="btn btn-success">+ Add More</a></td>
        </tr>
        <?if(count($registry['images']) > 1): ?>
            <?php for($i=1;$i<count($registry['images']);$i++):?>
              <tr><th><img src="http://<?=$_SERVER['SERVER_NAME'].'/'.$theme.'uploads/'.$registry['images'][$i];?>" height="60"/></th><td><input type="file" name="img[]"/></td><td><a onclick="deleteField(this);" class="btn btn-danger">Remove</a></td></tr>
            <?endfor;?>
        <?endif;?>
    </table>
    <input type="submit" name="save" value="Update Statistics" class="btn btn-primary"/>
</form>