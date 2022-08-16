<h2><?= $title; ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="<?php echo base_url(); ?>/posts/update/<?php echo $posts['id']; ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $posts['title'] ?>"/><br />

    <label for="description">discription</label>
    <textarea name="description" cols="45" rows="4" value=""><?php echo $posts['description'] ?></textarea><br />

    <label for="body">Body</label>
    <textarea id = "editor" name="body" cols="45" rows="4" value="<?php echo $posts['body'] ?>"><?php echo $posts['body'] ?></textarea><br />

    <div class="form-group">
        <label for="formFile" class="form-label mt-4">Image</label>
      <input class="form-control" type="file" name="image">
    </div>
    <br><hr>
    <div class="form-group">
        <label for="formFile" class="form-label mt-4">Video</label>
      <input class="form-control" type="file" name="video">
    </div>

    <input type="submit" name="submit" value="Edit news item" />
</form>