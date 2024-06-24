<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers | Dress Shop</title>
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
            <h1 class="page-title mt-3">Careers at Krist</h1>
            <section class="careers-section">
                <div class="intro">
                    <p>Welcome to Krist's Careers page! We're always looking for passionate, creative, and driven individuals to join our team. Explore our open positions and discover how you can be a part of our vibrant community.</p>
                </div>
                
                <div class="culture-section mt-4">
                    <h2>Our Culture</h2>
                    <p>At Krist, we believe that our people are our greatest asset. Our company culture is built on collaboration, innovation, and a commitment to excellence. We foster an environment where creativity thrives, and every team member has the opportunity to contribute and grow.</p>
                    <p>We offer a dynamic workplace where you'll be encouraged to think outside the box and take ownership of your projects. Whether you're in design, marketing, or customer service, your contributions are valued and essential to our success.</p>
                </div>

                <div class="benefits-section mt-4">
                    <h2>Why Work With Us?</h2>
                    <ul class="benefits-list">
                        <li>Competitive salaries and comprehensive benefits package.</li>
                        <li>Flexible work hours and remote work options.</li>
                        <li>Opportunities for professional development and career advancement.</li>
                        <li>A supportive and inclusive work environment.</li>
                        <li>Employee discounts on our latest collections.</li>
                        <li>Regular team-building activities and social events.</li>
                    </ul>
                </div>

                <div class="open-positions-section mt-4">
                    <h2>Open Positions</h2>
                    <div class="job-listings">
                        <!-- Job Posting 1 -->
                        <div class="job-posting mb-3 p-3 border rounded">
                            <h3 class="job-title">Fashion Designer</h3>
                            <p class="job-location"><i class="bi bi-geo-alt-fill"></i> New York, NY</p>
                            <p class="job-description">We are looking for a talented Fashion Designer to create innovative designs for our upcoming collections. If you have a passion for fashion and a keen eye for detail, we'd love to hear from you.</p>
                            <a href="#" class="btn btn-primary">Apply Now</a>
                        </div>
                        <!-- Job Posting 2 -->
                        <div class="job-posting mb-3 p-3 border rounded">
                            <h3 class="job-title">Marketing Specialist</h3>
                            <p class="job-location"><i class="bi bi-geo-alt-fill"></i> Remote</p>
                            <p class="job-description">Join our marketing team and help us drive engagement and sales through creative campaigns and strategies. This role is perfect for someone with a strong background in digital marketing and social media.</p>
                            <a href="#" class="btn btn-primary">Apply Now</a>
                        </div>
                        <!-- Job Posting 3 -->
                        <div class="job-posting mb-3 p-3 border rounded">
                            <h3 class="job-title">Customer Service Representative</h3>
                            <p class="job-location"><i class="bi bi-geo-alt-fill"></i> Los Angeles, CA</p>
                            <p class="job-description">We're looking for friendly and motivated individuals to join our customer service team. If you have excellent communication skills and enjoy helping others, this role is for you.</p>
                            <a href="#" class="btn btn-primary">Apply Now</a>
                        </div>
                        <!-- Add more job postings as needed -->
                    </div>
                </div>

                <div class="apply-section mt-4">
                    <h2>How to Apply</h2>
                    <p>If you're interested in joining our team, please click on the "Apply Now" button next to the job listing you're interested in. You can also send your resume and cover letter to our HR department at <a href="mailto:hr@krist.com">hr@krist.com</a>.</p>
                    <p>We look forward to hearing from you and potentially welcoming you to the Krist family!</p>
                </div>
            </section>
        </div>
    </main>

    <?php
    include "footer.php";
    ?>
    <!-- External JavaScript file -->
    <script src="scripts.js"></script>
</body>

</html>
