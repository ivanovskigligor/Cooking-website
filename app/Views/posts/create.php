<h2><?= $title; ?></h2>


<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="create" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="input" name="title" /><br />
    </div>
    <div class="form-group">
        <label for="description">discription</label>
        <textarea name="description" cols="45" rows="4"></textarea><br />
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea id="editor" name="body" cols="45" rows="4"></textarea><br />
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label mt-4">Upload Image</label>
      <input class="form-control" type="file" name="image">
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label mt-4">Upload Video</label>
      <input class="form-control" type="file" name="video">
    </div>
    <button type="submit" name="submit" value="Create news item">button </button>
</form>