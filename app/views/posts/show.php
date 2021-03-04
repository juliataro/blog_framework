<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <h1><?php echo $data['post']->title ?></h1>

<!--autor of post-->
    <div class="bg-secondary text-white p-2 mb-3">
        Created by <?php echo $data['post']->user_id; ?> at <?php echo $data['post']->created_at; ?>
    </div>

<!--TAGGGGGS view-->
    <div class="row d-flex ">
<?php foreach ($data['tags'] as $tag): ?>
    <button type="button" class="btn btn-outline-info ml-3 mb-3"><a href="<?php echo URLROOT ?>/tags/show/<?php echo $tag->id; ?>" class=""><?php echo $tag->name; ?></a></button>
<?php endforeach; ?>
</div>

<!--content of post-->
    <p><?php echo $data['post']->content; ?></p>

<!--Button Bäck-->
    <a href="<?php echo URLROOT ?>/posts" class="btn btn-info">Back</a>
    <hr>
<?php if ($data['post']->user_id == $_SESSION['user_id']): ?>
    <div class="row justify-content-around">
        <div class="col-8">
            <a href="<?php echo URLROOT ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-success">Edit</a>
        </div>
        <div class="col-4">
            <form action="<?php echo URLROOT ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>
    </div>
<?php endif; ?>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>