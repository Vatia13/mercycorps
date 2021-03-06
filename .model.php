<?php
/**
 * Created by IT-SOLUTIONS.
 * IS CMS
 * User: Vati Child
 * Date: 3/7/15
 * Time: 11:09 PM
 */
defined('_JEXEC') or die();
add_script(component_url() . 'js/statistics.js',array("type='text/javascript'"));
$registry['statistics'] = $DB->getAll("SELECT * FROM is_statistics");

if($_GET['component'] == 'statistics'){

    if(intval($_GET['active']) > 0){
        $id = intval($_GET['active']);
        $status = intval($_GET['status']);
        if($DB->execute("UPDATE is_statistics SET status='{$status}' WHERE id='{$id}'")){
            header('location:?component=statistics');
        }

    }
}

if($_GET['component'] == 'statistics' && $_GET['section'] == 'edit'){
    $id = intval($_GET['id']);
    $registry['statistics'] = $DB->getAll("SELECT * FROM is_statistics WHERE id='{$id}'");
    $registry['images'] = unserialize($registry['statistics'][0]['img']);
    if($_POST['save']){
        //print_r($_FILES); print_r($_POST['img']);
        if(count($_FILES['img']) > 0){
            $img = array();

            $types = array("", "gif", "jpeg", "png","jpg");

             for($i=0;$i<count($_FILES['img']['name']);$i++):
                 $img[$i] = date('Y-m').'/'.time().$i.'.jpg';
              if($_FILES['img']['size'][$i] > 0){
                $type = getimagesize($_FILES['img']['tmp_name'][$i]);

                $ext= $types[$type[2]];

                if($ext){
                    move_uploaded_file($_FILES['img']['tmp_name'][$i],'../'.$theme.'uploads/'.$img[$i]);
                }else{
                    $message[0] = 'btn-danger';
                    $message[1] = 'unknown format';
                }
              }
            endfor;

        }else{
            $message[0] = 'btn-danger';
            $message[1] = 'Chose images for statistics';
        }

        for($i=0;$i<count($_FILES['img']['name']);$i++){
            if(!empty($_FILES['img']['name'][$i])){
                $_POST['img'][$i] = $img[$i];
            }
        }

        if(empty($message[0])){
            $img_sql = serialize($_POST['img']);
            $DB->execute("UPDATE is_statistics SET img='$img_sql' WHERE id='$id'");
            header('location:?component=statistics&section=edit&id='.$id);
        }
    }
}