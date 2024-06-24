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

            <div class="about-us-section">
                <div class="about-us-content">
                    <h2>About Us</h2>
                    <p>Welcome to Krist! We are a passionate team dedicated to bringing you the latest and most stylish dresses for every occasion. Our journey began in [Year] with a simple mission: to make every woman feel beautiful and confident in what she wears.</p>
                    <p>At Krist, we believe in quality, creativity, and customer satisfaction. We handpick each piece in our collection to ensure it meets our high standards. Whether you're looking for a casual day dress, a chic office outfit, or a stunning evening gown, we have something for everyone.</p>
                    <p>Thank you for being a part of our story. We invite you to explore our blog for the latest fashion tips, trends, and inspirations. Stay connected with us on social media for updates and exclusive offers!</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                <div class="about-us-img">
                    <img src="https://abeautifulmess.typepad.com/.a/6a00d8358081ff69e2016301db4217970d-800wi" alt="About Us Image">
                </div>
            </div>

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