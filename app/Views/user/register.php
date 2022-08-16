
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-5">
                <h2>Register User</h2>
                <div id="greski" hidden class="alert alert-warning">
                </div>
                <form>
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Full Name"  class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: '/store',
                dataType: "html",
                data: $('form').serialize(),
                success: function(response) {
                    if (response === "ok") {
                        alert("Register Successful!");
                        window.location = "/signin"
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