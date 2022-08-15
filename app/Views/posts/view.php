
<h2><?php echo $posts['title']; ?></h2>
<small>Posted: <?php echo $posts['timestamp']; ?></small>
<div class="post-description">
    <?php echo $posts['description']; ?>
    <div class="post-body">
        <?php echo $posts['body']; ?>
    </div>
</div>

<hr>

<div class="btn-group ">
<p><a class="btn btn-dark mx-4" href="<?php echo base_url(); ?>/posts/delete/<?php echo $posts['id']; ?>">Delete</a></p>
<br>
<p><a class="btn btn-info" href="<?php echo base_url(); ?>/posts/edit/<?php echo $posts['id']; ?>">Edit</a></p>
</div>

<hr>

<h3>Add Comment</h3>
<?php echo form_open('comments/create/'. $posts['id']);?>
<div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $posts["slug"]?>">
<input class="btn btn-dark" type="submit" value="Post Comment"/>
</form>