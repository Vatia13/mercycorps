<?php defined('_JEXEC') or die(); ?>
<table class="table table-hover">
    <tr>
        <th>#</th><th>Title</th><th></th><th></th>
    </tr>
    <?php foreach($registry['statistics'] as $item):?>
    <tr>
        <td><?php echo $item['id'];?></td><td><?php echo $item['title'];?></td>
        <td>
            <?php echo ($item['status'] == 0) ? '<a href="?component=statistics&status=1&active='.$item['id'].'" class="btn btn-primary">Active</a>' : '<a href="?component=statistics&status=0&active='.$item['id'].'" class="btn btn-info">Inactive</a>';?>
        </td>
        <td><a href="?component=statistics&section=edit&id=<?php echo $item['id'];?>" class="btn btn-default">Edit</a></td>
    </tr>
    <?php endforeach;?>
</table>