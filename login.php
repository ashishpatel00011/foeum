<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to iDiscuss</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="handlelogin.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">email address</label>
                        <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control my-2" id="password" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary" id="loggedin" name="loggedin">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>