<h2><?= $title; ?></h2>


<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="create" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title"></label>
        <input  class="form-control"type="input" placeholder="Enter Title" name="title" /><br />
    </div>
    <div class="form-group">
        <label for="description"></label>
        <textarea class="form-control" name="description" cols="45" rows="4" placeholder = "Enter Discription"></textarea><br />
    </div>
    <div class="form-group">
        <label for="body"></label>
        <textarea class="form-control" id="editor" name="body" cols="45" rows="4"></textarea><br />
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label mt-4">Upload Image</label>
      <input class="form-control" type="file" name="image">
    </div>
    <div class="form-group">
        <label for="formFile" class="form-label mt-4">Upload Video</label>
      <input class="form-control" type="file" name="video">
    </div>
    <br>
    <button class="btn btn-dark btn-lg" type="submit" name="submit" value="Create news item">Post</button>
</form>