<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for an iDiscuss Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                include 'connection.php';
                $u_email = $_POST['signupEmail'];
                $u_password = $_POST['signupPassword'];
                $c_password = $_POST['signupcPassword'];
                $existSql = "select * from `user` where email = '$u_email'";
                $result = mysqli_query($conn, $existSql);
                $numRows = mysqli_num_rows($result);
                if ($numRows > 0) {
                    $showError = "Email already in use";
                } else {
                    if ($u_password == $c_password) {
                        // $hash = password_hash($u_password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO `user` (`email`, `password`) VALUES ('$u_email', '$u_password')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            header("Location: /forum/index.php?signupsuccess=true");
                            exit();
                        }
                    } else {
                        echo "<script type='text/javascript'>
            alert('Please enter correct username or password...');
            window.location.href='index.php';
            </script>";
                    }
                }
                header("Location: /forum/index.php?signupsuccess=false&error=$showError");
            }
            ?>
            <form action="signup.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email Address</label>
                        <input type="text" class="form-control" id="signupEmail" name="signupEmail"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control my-2" id="signupcPassword" name="signupcPassword">
                    </div>

                    <button type="submit" class="btn btn-primary">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>