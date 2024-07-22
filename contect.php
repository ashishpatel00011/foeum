<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome to iDiscuss - Coding Forum</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        .ids {
            color: yellow;
            font-size: 25px;
        }

        #ques {
            min-height: 710px;
        }

        body {
            background-color: papayawhip;

        }

        .continer {
            margin-top: 100px;
            padding: 20px;
            border: 1px solid blanchedalmond;
            border-radius: 10px;
            background-color: burlywood;
        }

        @media (max-width: 640px) {
            .continer {
                margin-top: 66px;
                margin-bottom: 67px;
            }

            #ques {
                min-height: 710px;
            }
        }
    </style>
</head>

<body>
    <?php include 'connection.php'; ?>
    <!-- header -->
    <?php include 'header.php'; ?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include 'connection.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $sql = "INSERT INTO `contect` (`name`, `email`, `message`) VALUES ('$name', '$email', '$message');
        ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> Your information submitted successfully 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
        }
    }

    ?>
    <div class="container" id="ques">
        <div class="continer">
            <h1 class="py-2">Leave A Message</h1>
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label>Message</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
                <div class="py-2">
                    <button type="submit" name="post" class="bttn btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
    <!-- slider -->

    <!-- footer -->
    <?php include 'footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+deI5Qooj4jRi1mv8w+0DaH3glaF+cIf6z24nf3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>