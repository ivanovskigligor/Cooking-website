<h2><?php echo $posts['title']; ?></h2>
<small>Posted: <?php echo $posts['timestamp']; ?></small>
<div class="post-description">
    <?php echo $posts['description']; ?>

    <div>
        <img src="../<?php echo "uploads/" . $posts['image']; ?>" alt="Image">
    </div>


    <div class="post-body">
        <video controls class="card-img-top mb-5 mb-md-0">
            <source src="../<?php echo "uploads/" . $posts['video']; ?>">
        </video>
    </div>



    <div class="post-body">
        <?php echo $posts['body']; ?>
    </div>
</div>

<hr>
<?php if ($posts['user_id'] == session()->get('id')) : ?>
    <div class="btn-group ">
        <p><a class="btn btn-dark mx-4" href="<?php echo base_url(); ?>/posts/delete/<?php echo $posts['id']; ?>">Delete</a></p>
        <br>
        <p><a class="btn btn-info" href="<?php echo base_url(); ?>/posts/edit/<?php echo $posts['id']; ?>">Edit</a></p>
    </div>

<?php endif; ?>
<hr>

<div class="form-group mb-3">

    <?php if (!empty($comments)) : ?>

        <?php foreach ($comments as $comment) { ?>
            <div class="d-flex flex-column comment-section">
                <div class="bg-white p-2">
                    <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $comment['timestamp'] ?></span>
                    </div>
                    <div class="d-flex flex-row user-info">
                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $comment['name'] ?></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text"><?php echo $comment['body'] ?></p>
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

<script>
    $(function() {
        $('#postComment').click(function() {
            const text = $('#textarea').val();
            const id = <?php echo $posts['id'] ?>;
            console.log(id)
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