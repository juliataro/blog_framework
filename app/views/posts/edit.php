<?php require_once APPROOT . '/views/inc/header.php'; ?>
    <!--button for back-->
    <a href="<?php echo URLROOT ?>/posts" class="btn btn-info">Back</a>
<div class="card card-body bg-light mt-5">
    <h2>edit Post</h2>
    <p>Edit post with this form</p>
    <form action="<?php echo URLROOT ?>/posts/edit/<?php echo $data['id'];?>"method="post">
        <div class="form-group">
            <!--post name-->
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title'];?>">
            <!--error feedback-->
            <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
        </div>

    <!--post content-->
        <div class="form-group">
            <label for="title">Content: <sup>*</sup></label>
            <textarea name="content" class="form-control form-control-lg <?php echo (!empty($data['content_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['content'];?></textarea>
            <!--error feedback-->
            <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>
        </div>
        <!--button-->
    <input type="submit" class="btn btn-success" value="submit">
    </form>

</div>
<?php require_once APPROOT . '/views/inc/footer.php'; ?>