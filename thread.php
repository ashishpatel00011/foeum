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

        .contt {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #ques,
        #thread,
        #details {
            padding: 30px 100px;
            border: 1px solid black;
            border-radius: 5px;
            margin: 20px 0;
            width: 85%;
        }

        .ques {
            background-color: violet;

        }

        .notlogin {
            color: red;
            font-weight: 700;
        }

        #cont {
            min-height: 400px;
        }

        .no-question-message {
            background-color: powderblue;
            padding: 10px;
            border-radius: 5px;
            width: 800px;
        }

        .no-question-message p {
            font-size: 25px;
        }

        @media (max-width: 640px) {

            #ques,
            #thread,
            #details {
                padding: 10px 30px;
                margin: 0 20px;
                width: 90%;
            }

            .container {
                margin: 20px;
                padding: 20px;
                width: 90%;
                border: 1px solid blueviolet;
                border-radius: 5px;
            }

            .no-question-message {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <?php include 'connection.php'; ?>
    <?php include 'header.php'; ?>
    <?php
    if (isset($_GET['threadid'])) {
        $id = $_GET['threadid'];
        $query = "SELECT * FROM `thread` WHERE id=$id";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $desc = $row['desc'];
            $id = $row['id'];
        }
    }
    ?>
    <?php
    $showalert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $com_desc = $_POST['com_content'];
        $query = "INSERT INTO `comment` (`com_content`, `thread_id`) VALUES ( '$com_desc', '$id')";
        $result = mysqli_query($conn, $query);
        $showalert = true;
        if ($showalert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> your comment has been posted. Please wait for the community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>
    <!-- slider -->

    <!-- Category container starts here -->
    <div class="contt">
        <div class="container my-4 ques" id="ques">
            <div class="jumbotron">
                <h1 class="display-4">
                    <?php echo $title ?>
                </h1>
                <p class="lead">
                    <?php echo $desc ?>
                </p>
                <hr class="my-4">
                <p><b> Posted by: ASHISH</b></p>
            </div>
        </div>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '
    <div id="thread">
    <h1 class="py-2">Post A Comment</h1>
    <form action=' . $_SERVER['REQUEST_URI'] . ' method="post">
            <div class="mb-3">
                <label>Type Your Comment</label>
                <textarea class="form-control" id="com_content" name="com_content"></textarea>
            </div>
            <div class="py-2">
                <button type="submit" name="post" class="bttn btn btn-primary">Post Comment</button>
            </div>
        </form>
    </div>';
        } else {
            echo '
         <div id="details" class="container">
         <h1 class="py-2">Post A Comment</h1>
         <h5 class="py-2 notlogin">You are not logged in! Please login to post a comment.
         </h5>
        </div>';
        }
        ?>

        <div class="container" id="cont">
            <h1 class='py-2'>Discussion</h1>
            <?php
            $id = $_GET['threadid'];
            $query = "SELECT * FROM `comment` WHERE thread_id=$id";
            $result = mysqli_query($conn, $query);
            $noresult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noresult = false;
                $desc = $row['com_content'];
                $comm_time = $row['com_time'];
                $id = $row['com_id'];
                echo '<div class="media my-3 d-flex align-items-start">
                <img src="img/u2.png" width="37px" height="34px" class="me-3" alt="...">
              <div class="media-body">
              <b><p class="my-0">Anonymous user || ' . $comm_time . '</p></b> 
              <p>' . $desc . '</p>
              </div>
              </div>';
            }
            if ($noresult) {
                echo '
            <div class="no-question-message">
                <b>
                    <p>No comments found</p>
                </b>
                Be the first person to post a comment!
            </div>
        ';
            }
            ?>

        </div>
    </div>
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