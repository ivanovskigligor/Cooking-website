<h2><?= $title; ?></h2>


<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="create" method="post">
    <?= csrf_field() ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="description">discription</label>
    <textarea name="description" cols="45" rows="4"></textarea><br />

    <label for="body">Body</label>
    <textarea name="body" cols="45" rows="4"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />
</form>