<p><a class="btn btn-dark btn-lg" href="posts/create">add</a></p>


<?php if (!empty($post) && is_array($post)): ?>

    <?php foreach ($post as $posted_item): ?>

        <h3><?= esc($posted_item['title']) ?></h3>
        <small>Posted: <?php echo $posted_item['timestamp']; ?></small>
        <div class="main">
            <?= esc($posted_item['description']) ?>
        </div>
        <br>
        <p><a class="btn btn-dark" href="posts/<?= esc($posted_item['slug'], 'url') ?>">View article</a></p>
    <?php endforeach ?>
    


<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>