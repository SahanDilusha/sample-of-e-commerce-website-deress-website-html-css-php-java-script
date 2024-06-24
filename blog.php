<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dress Shop Blog</title>
    <title>My Profile</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    include "navbar.php";
    ?>

    <main class="main-content">
        <div class="container">

        
            <h1 class="page-title mt-3">Our Blog</h1>
            <div class="blog-grid">
                <!-- Blog Post Item -->
                <div class="blog-post">
                    <div class="blog-post-img">
                        <img src="https://www.lovehappensmag.com/blog/wp-content/uploads/2021/09/different-types-of-fashion-styles.jpeg" alt="Blog Post Image">
                    </div>
                    <div class="blog-post-content">
                        <h2 class="blog-post-title">Latest Summer Trends 2024</h2>
                        <p class="blog-post-date"><i class="fas fa-calendar-alt"></i> June 20, 2024</p>
                        <p class="blog-post-snippet">Discover the hottest summer trends for 2024. From vibrant colors to breezy silhouettes, stay stylish this season...</p>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- More blog posts... -->
                <div class="blog-post">
                    <div class="blog-post-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1M-5-DWqgPGygRIfjcTjoy77RP7JV3Uq9SQ&s" alt="Blog Post Image">
                    </div>
                    <div class="blog-post-content">
                        <h2 class="blog-post-title">How to Style Dresses for Every Occasion</h2>
                        <p class="blog-post-date"><i class="fas fa-calendar-alt"></i> June 15, 2024</p>
                        <p class="blog-post-snippet">Learn how to style your favorite dresses for any event, from casual brunches to formal evenings...</p>
                        <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <!-- Add more blog post entries as needed -->
            </div>
        </div>
    </main>

    <?php
    include "footer.php";
    ?>
    <!-- External JavaScript file -->
    <script src="scripts.js"></script>
</body>

</html>