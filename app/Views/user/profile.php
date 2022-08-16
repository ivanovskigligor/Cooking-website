<section class="h-100 gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                            <h5><?= $users['name']; ?></h5>
                            <p></p>
                        </div>
                    </div>
                    <div class="p-4 text-black" style="background-color: #f8f9fa;">
                        <a class="btn btn-dark" href="<?php echo base_url(); ?>/user/editprofile" ?>Edit Profile</a>
                    </div>
                    <div class="card-body p-4 text-black">
                        <div class="mb-5">
                            <p class="lead fw-normal mb-1">About</p>
                            <p><?= $users['aboutme']; ?></p>
                        </div>
                        <div class="justify-content-between mb-4">

                            <p class="lead fw-normal mb-0">Recent posts</p>
                            <?php if (!empty($posts)) : ?>
                                <?php foreach ($posts as $posted_item) : ?>


                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <h3 class="card-header"><?= esc($posted_item['title']) ?></h3>
                                            </h4>
                                            <p class="card-text"><strong><?= esc($posted_item['description']) ?></strong></p>
                                            <p><a class="btn btn-dark " href="posts/<?= esc($posted_item['slug'], 'url') ?>">View article</a></p>

                                        </div>
                                    </div>


                                    <br>
                                <?php endforeach ?>
                            <?php else : ?>
                                <p>No posts</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>