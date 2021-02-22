<?php require_once APPROOT.'/views/inc/header.php';?>
<h1><?php echo $data['post']->title?></h1>
<div class="bg-secondary text-white p-2 mb-3">
     Created by <?php echo $data['post']->user_id?> at <?php echo $data['post']->created_at;?>
    </div>
´<p><?php echo $data['post']->content;?></p>
<a href="<?php echo URLROOT?>/posts" class="btn btn-info">Back<a/>
<hr>
<?php if ($data['post']->user_id == $_SESSION['user_id']): ?>
    <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-success">Edit</a>
    <a href="<?php echo URLROOT?>/posts/delete/<?php echo $data['post']->id;?>" class="btn btn-danger">Delete<a/>
<?php endif;?>
<?php require_once APPROOT.'/views/inc/footer.php';?>