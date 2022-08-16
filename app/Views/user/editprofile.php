<section class="h-100 gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
                <div class="card">
                    <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px; height: 150px;">

                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">

                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                            <h5><?= $users['name']; ?></h5>
                            <p></p>

                        </div>
                    </div>
                    <div id="greski" class="card-body p-4 text-black">
                        <form enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <console class="log"><?php echo session()->get('id') ?></console>
                            <label for="name">Name</label>
                            <textarea name="name" cols="45" rows="4" value=""><?php echo $users['name'] ?></textarea><br />

                            <label for="aboutme">About me</label>
                            <textarea name="aboutme" cols="45" rows="8" value=""><?php echo $users['aboutme'] ?></textarea><br />

                            <div class="form-group">
                                <label for="formFile" class="form-label mt-4">Default file input example</label>
                                <input class="form-control" type="file" name="image">
                            </div>
                            <input type="submit" name="submit" value="Edit profile">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/update/<?php echo session()->get('id') ?>',
                dataType: "html",
                data: $('form').serialize(),
                success: function(response) {
                    if (response === "ok") {
                        alert("Edit Successful!");
                        window.location = "/profile"
                    } else {
                        document.getElementById("greski").hidden = false;
                        $('#greski').html(response);
                    }
                },
                error: function(result) {
                    $('body').html("err");
                },
            });
        });
    });
</script>