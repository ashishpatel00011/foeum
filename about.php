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
    </style>
    <link rel="stylesheet" href="abouut.css">
</head>

<body>
    <?php include 'connection.php'; ?>
    <!-- header -->
    <?php include 'header.php'; ?>

    <div class="about">
        <div class="left">
            <img src="img/com.avif" class="pic">
        </div>
        <div class="text">
            <h2>About Us</h2>
            <h5>we are a forum <span>community</span></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing       elit.  Expedita natus ad sed harum itaque ullam
                enim quas, veniam accusantium, quia animi id eos adipisci iusto molestias asperiores explicabo cum
                vero atque amet corporis! Soluta illum facere consequuntur magni. Ullam dolorem repudiandae cumque
                voluptate consequatur consectetur, eos provident necessitatibus reiciendis corrupti!</p>
            <div class="data">
                <a href="contect.php" class="hire">contect us</a>
            </div>
        </div>
    </div>


    <!-- Category container starts here -->

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