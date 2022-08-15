<h2><?= $title; ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="<?php echo base_url(); ?>/posts/update/<?php echo $posts['id']; ?>" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" value="<?php echo $posts['title'] ?>"/><br />

    <label for="description">discription</label>
    <textarea name="description" cols="45" rows="4" value=""><?php echo $posts['description'] ?></textarea><br />

    <label for="body">Body</label>
    <textarea name="body" cols="45" rows="4" value="<?php echo $posts['body'] ?>"><?php echo $posts['body'] ?></textarea><br />

    <input type="submit" name="submit" value="Edit news item" />
</form>