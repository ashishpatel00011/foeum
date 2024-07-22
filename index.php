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
            min-height: 433px;
        }

        .card-img-top {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <?php include 'connection.php'; ?>
    <!-- header -->
    <?php include 'header.php'; ?>

    <!-- slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" id='image-frame'>
            <div class="carousel-item active">
                <img src="img/i7.jpg
" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/i6.jpg
" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/i8.jpg
" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Category container starts here -->
    <div class="container my-4" id="ques">
        <h2 class="text-center my-4">iDiscuss - Browse Categories</h2>
        <div class="row my-4">
            <?php
            $query = "SELECT * FROM `category`";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_desc'];
            
                // Directory containing images
                $imageDir = 'img/forum/'; // Make sure to include the trailing slash
            
                // Get all image files from the directory
                $images = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            
                // Pick a random image
                $randomImage = $images[array_rand($images)];
            
                echo '
                <div class="col-md-4 my-2">
                    <div id="card" class="card">
                        <img src="' . $randomImage . '" class="card-img-top" alt="Random image">
                        <div class="card-body">
                            <h5 class="card-title">' . htmlspecialchars($cat) . '</h5>
                            <p class="card-text">' . htmlspecialchars(substr($desc, 0, 90)) . '...</p>
                            <a href="thread_list.php?catid=' . htmlspecialchars($id) . '" class="btn btn-primary">View Threads</a>
                        </div>
                    </div>
                </div>';
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