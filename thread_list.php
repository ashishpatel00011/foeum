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
        #ques{
            background-color: blanchedalmond;

        }
        .common-style {
            padding: 30px 100px;
            border: 1px solid black;
            border-radius: 5px;
            margin: 20px 0;
            width: 85%;
        }

        .media {
            display: flex;
        }

        a {
            text-decoration: none;
        }
        #cont {
            min-height: 390px;
        }

        .notlogin {
            color: red;
            font-weight: 700;
        }

        .no-question-message {
            background-color: gray;
            padding: 10px;
            border-radius: 5px;
            width: 500px;
        }

        .no-question-message p {
            font-size: 25px;
        }

        @media (max-width: 640px) {

            .common-style {
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
    <!-- header -->
    <?php include 'header.php'; ?>
    <?php
    $id = $_GET['catid'];
    $query = "SELECT * FROM `category` WHERE category_id=$id";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $noresult = true;
        $catname = $row['category_name'];
        $catdesc = $row['category_desc'];
    }
    ?>
    <?php
    $showalert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $query = "INSERT INTO `thread` (`title`, `desc`, `cate_id`, `user_id`) VALUES ('$th_title',  '$th_desc', '$id', '0')";
        $result = mysqli_query($conn, $query);
        $showalert = true;
        if ($showalert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> your thread has been submitted. Please wait for the community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>
    <div class="contt">
        <!-- Category container starts here -->
        <div class="container my-4 common-style" id="ques">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to <?php echo $catname ?> forums!</h1>
                <p class="lead"><?php echo $catdesc ?></p>
                <hr class="my-4">
                <p>This is a peer-to-peer forum for sharing knowledge with each other. Participate in online forums as
                    you would in constructive, face-to-face discussions. Do not post “I agree,” or similar, statements.
                    ... Stay on the topic of the thread.</p>
            </div>
        </div>

        <!-- Form for starting a discussion -->
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '
            <div class="container common-style" id="deitels">
                <h1 class="py-2">Start a Discussion</h1>
                <form action=' . $_SERVER['REQUEST_URI'] . ' method="post">
                    <div class="mb-3">
                        <label for="uname" class="form-label">Problem Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label>Elaborate Your Problem</label>
                        <textarea class="form-control" id="desc" name="desc"></textarea>
                    </div>
                    <div class="py-2">
                        <button type="submit" name="userlogin" class="bttn btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>';
        } else {
            echo '
            <div class="container common-style">
                <h1 class="py-2">Start a Discussion</h1>
                <h5 class="py-2 notlogin">You are not logged in! PLEASE login to be able to start a Discussion</h5>
            </div>';
        }
        ?>

        <div class="container" id="cont">
            <h1 class='py-2'>Browse Questions</h1>
            <?php
            $id = $_GET['catid'];
            $query = "SELECT * FROM `thread` WHERE cate_id=$id";
            $result = mysqli_query($conn, $query);
            $noresult = true;
            while ($row = mysqli_fetch_assoc($result)) {
                $noresult = false;
                $title = $row['title'];
                $desc = $row['desc'];
                $id = $row['id'];
                echo ' <div class="media my-3">
                         <img src="img/u2.png" width="37px" height="34px" class="mr-3" alt="...">
                       <div class="media-body mx-2">
                         <h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id . '">' . $title . '</a></h5>
                         <p>' . $desc . '</p>
                       </div>
                       </div>';
            }
            if ($noresult) {
                echo '
                <div class="no-question-message">
                    <b><p>No Threads found</p></b>
                    Be the first person to ask a question!
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