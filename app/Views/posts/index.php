<div id="main">
  <?php
  if (session()->get('isLoggedIn')) : ?>
    <p><a class="btn btn-dark btn-lg" href="posts/create">Add new Post</a></p>
  <?php endif; ?>

  <?php if (!empty($post) && is_array($post)) : ?>

    <?php foreach ($post as $posted_item) : ?>
      <hr>
      <h3><?= esc($posted_item['title']) ?></h3>
      <small>Posted: <?php echo $posted_item['timestamp']; ?></small>
      <div>
        <img src="../<?php echo "uploads/" . $posted_item['image']; ?>" alt="Image" style="width: 150px; height: 150px" class=" img-thumbnail float-left">
        <?= esc($posted_item['description']) ?>
      </div>

      <br>
      <p><a class="btn btn-dark" href="posts/<?= esc($posted_item['slug'], 'url') ?>">View article</a></p>
    <?php endforeach ?>

  <?php else : ?>
    <h3>No Posts</h3>
  <?php endif ?>
</div>

<script>
  $(document).ready(function() {

    $('#searchButton').click(function(event, value, caption) {
      event.preventDefault();
      const text = $("#textarea2").val();
      console.log(text);
      if (text == '') {
        alert("Please review your search Dparameters");
      } else {
        $.ajax({
          url: 'search',
          type: 'post',
          dataType: "html",
          data: {
            text: text,
          },
          success: function(response) {
            $("#main").html(response);
          },
          error: function(result) {
            $('body').html("err");
          },
          beforeSend: function(d) {
            $('#main').html("Searching...");
          }
        });
      }
    })
  });
</script>