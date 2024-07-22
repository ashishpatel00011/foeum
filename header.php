<?php
session_start();
include 'connection.php';

// Fetch all categories from the database
$query = "SELECT * FROM `category` LIMIT 3";
$result = mysqli_query($conn, $query);

// Create an array to store category information
$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand ids" href="index.php">iDiscuss</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Top Categories
                            </a>
                            <ul class="dropdown-menu">';
    // Generate dropdown items dynamically
    foreach ($categories as $category) {
        echo '<li><a class="dropdown-item" href="thread_list.php?catid=' . $category['category_id'] . '">' . htmlspecialchars($category['category_name']) . '</a></li>';
    }
    echo '            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contect.php">Contect</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="GET" action="search.php">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                        <button class="btn btn-success mx-2" type="submit">Search</button>
                    </form>
                    <div class="d-flex">
                        <p class="text-light my-2 mx-2">Welcome ' . htmlspecialchars($_SESSION['email']) . ' </p>
                        <a href="logout.php" class="btn btn-outline-success ml-2">Logout</a>
                    </div>
                </div>
            </div>
        </nav>';
} else {
    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand ids" href="index.php">iDiscuss</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Top Categories
                            </a>
                            <ul class="dropdown-menu">';
    // Generate dropdown items dynamically
    foreach ($categories as $category) {
        echo '<li><a class="dropdown-item" href="thread_list.php?catid=' . $category['category_id'] . '">' . htmlspecialchars($category['category_name']) . '</a></li>';
    }
    echo '            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contect.php">Contect</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="GET" action="search.php">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
                        <button class="btn btn-success mx-2" type="submit">Search</button>
                    </form>
                    <button type="button" class="btn btn-outline-success ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal" type="button">Signup</button>
                </div>
            </div>
        </nav>';
}

// Include login and signup modals
include 'login.php';
include 'signup.php';

// Check if signup was successful and display an alert
if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success! </strong> You can now login
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
?>
