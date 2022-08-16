<h2><?php echo $posts['title']; ?></h2>
<small>Posted: <?php echo $posts['timestamp']; ?></small>
<div class="post-description">
    <div>
        <img class="w-50 " src="../<?php echo "uploads/" . $posts['image']; ?>" alt="Image">
    </div>
    <br>
    <h2>Description</h2>
    <br>
    <?php echo $posts['description']; ?>
    <br> <br>

    <h2>Video</h2>
    <br>
    <div class="post-body">
        <video controls class=" w-75  d-flex justify-content-center">
            <source src="../<?php echo "uploads/" . $posts['video']; ?>">
        </video>
    </div>
    <br>
    <div class="post-body">
        <?php echo $posts['body']; ?>
    </div>
</div>


<?php if ($posts['user_id'] == session()->get('id')) : ?>
    <div class="btn-group d-flex justify-content-center">
        <p><a class="btn btn-dark mx-4 btn-lg" href="<?php echo base_url(); ?>/posts/delete/<?php echo $posts['id']; ?>">Delete</a></p>
        <br>
        <p><a class="btn btn-dark mx-4 btn-lg" href="<?php echo base_url(); ?>/posts/edit/<?php echo $posts['id']; ?>">Edit</a></p>
    </div>

<?php endif; ?>

<br>
<h2>Comments</h2>
<br><hr>
<div class="form-group mb-3">
    <?php if (!empty($comments)) : ?>
        <?php foreach ($comments as $comment) { ?>
            <div class="comment-widgets m-b-20">
                <div class="bg-white p-2">
                    <div class="d-flex flex-column justify-content-start ml-2"><span class="mt-1 d-block font-weight-bold name">Commented on: <?php echo $comment['timestamp'] ?></span>
                    </div>
                    <div class="d-flex flex-row user-info">
                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><h3>Name: <?php echo $comment['name'] ?></h3></span>
                        </div>
                    </div>
                    <div class="mt-1">
                        <h4><p class="comment-text"><?php echo $comment['body'] ?></p></h4>
                    </div>
                </div>
            </div>
            <hr>
        <?php } ?>
    <?php else : ?>
        <h3>No News</h3>
        <p>Unable to find any news for you.</p>

    <?php endif ?>
</div>

<h3>Add Comment</h3>
<form>
    <div class="form-group mb-3">

        <input id="textarea" type="text" name="name" placeholder="Enter Commen" class="form-control">
    </div>
    <div class="d-grid">
        <button type="button" class="btn btn-dark" id="postComment">post comment</button>
    </div>
</form>
</div>
<script>
    $(function() {
        $('#postComment').click(function() {
            const text = $('#textarea').val();
            const id = <?php echo $posts['id'] ?>;
            console.log(text)
            if (text === "") {
                alert("Comment empty");
            } else {
                $.ajax({
                    url: '/comment',
                    type: 'post',
                    data: {
                        post_id: id,
                        body: text,
                    },
                    success: function(response) {
                        if (response === "ok") {
                            location.reload();
                        }
                    }
                });
            }

        });
    });
</script>