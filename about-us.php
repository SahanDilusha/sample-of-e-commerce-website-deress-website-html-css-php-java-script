<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Krist Dress Shop</title>
    <link rel="icon" href="resources/image/Logo.png" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php include "navbar.php"; ?>

    <main class="main-content">
        <div class="container">

            <section class="about-us-section my-5">
                <div class="row">
                    <div class="col-md-6 about-us-content">
                        <h2>About Us</h2>
                        <p>Welcome to Krist Dress Shop! We are a passionate team dedicated to bringing you the latest and most stylish dresses for every occasion. Our journey began in 1998 with a simple mission: to make every woman feel beautiful and confident in what she wears.</p>
                        <p>At Krist, we believe in quality, creativity, and customer satisfaction. We handpick each piece in our collection to ensure it meets our high standards. Whether you're looking for a casual day dress, a chic office outfit, or a stunning evening gown, we have something for everyone.</p>
                        <p>Thank you for being a part of our story. We invite you to explore our collection and experience the elegance and style that Krist has to offer. Stay connected with us on social media for updates and exclusive offers!</p>
                        <div class="social-links mt-3">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 about-us-img">
                        <img src="https://abeautifulmess.typepad.com/.a/6a00d8358081ff69e2016301db4217970d-800wi" alt="About Us Image" class="img-fluid rounded">
                    </div>
                </div>
            </section>

            <section class="our-story-section my-5">
                <h2 class="text-center mb-4">Our Story</h2>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">The Beginning</h3>
                            <p>Krist started as a small boutique in Kandy, founded by Kamal Rathnayaka in 1998. With a passion for fashion and a vision to empower women, Krist quickly grew into a beloved local shop.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Expanding Horizons</h3>
                            <p>As our reputation for quality and style spread, we expanded our collection and began to attract customers from beyond our local community. This success inspired us to take Krist online in 2024, reaching fashion lovers everywhere.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">A New Chapter</h3>
                            <p>Today, Krist continues to grow and evolve. We have launched new collections, collaborated with designers, and stayed true to our core values of quality and customer satisfaction. Our journey is a testament to the support of our wonderful customers.</p>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="timeline-content">
                            <h3 class="timeline-title">Looking Ahead</h3>
                            <p>We are excited about the future and what it holds. Our commitment to excellence drives us to continually innovate and provide our customers with the best shopping experience. Thank you for being a part of Krist's journey.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="team-section my-5">
                <h2 class="text-center mb-4">Meet Our Team</h2>
                <div class="row">
                    <!-- Team Member 1 -->
                    <div class="col-md-4 team-member text-center">
                        <img src="https://imgproxy.ra.co/_/quality:66/aHR0cHM6Ly9zdGF0aWMucmEuY28vaW1hZ2VzL3Byb2ZpbGVzL3NxdWFyZS9hc29hc2luLmpwZz9kYXRlVXBkYXRlZD0xNjQzMTEzMDcwMDAw" width="200px"  alt="Team Member Photo" class="img-fluid rounded-circle mb-3">
                        <h4>Kamal Rathnayaka</h4>
                        <p>Founder & CEO</p>
                    </div>
                    <!-- Team Member 2 -->
                    <div class="col-md-4 team-member text-center">
                        <img src="https://www.befunky.com/images/wp/wp-2021-01-linkedin-profile-picture-after.jpg?auto=avif,webp&format=jpg&width=200" alt="Team Member Photo" class="img-fluid rounded-circle mb-3">
                        <h4>Ravina Rathnayaka</h4>
                        <p>Head of Design</p>
                    </div>
                    <!-- Team Member 3 -->
                    <div class="col-md-4 team-member text-center">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhAu72pB24JrKJpqABtlUUqV02c4W-BaPyBQ&s" alt="Team Member Photo" width="200px" class="img-fluid rounded-circle mb-3">
                        <h4>Mike Pranando</h4>
                        <p>Marketing Director</p>
                    </div>
                    <!-- Add more team members as needed -->
                </div>
            </section>

            <section class="contact-section my-5">
                <h2 class="text-center mb-4">Get in Touch</h2>
                <p class="text-center">We love hearing from our customers and community. Whether you have a question, feedback, or just want to say hello, feel free to reach out to us!</p>
                <div class="text-center mt-3">
                    <a href="contact_us.php" class="btn btn-dark">Contact Us</a>
                </div>
            </section>

        </div>
    </main>

    <?php include "footer.php"; ?>

    <!-- External JavaScript file -->
    <script src="scripts.js"></script>
</body>

</html>
