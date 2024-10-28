<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Page</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            line-height: 1.6;
            color: #ffffff;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ffafbd, #ffc3a0);
        }

        .header {
            background: black;
            color: #fff;
            padding: 1.5rem;
            text-align: right;
        }

        .nav {
            margin-top: 20px;
        }

        .nav a {
            padding: 10px;
            margin-right: 20px;
            text-decoration: none;
            color: #ffffff;
            font-size: 12px;
        }

        .responsive-img {
            max-width: 200px;
            height: 200px;
            margin-right: 90%;
            margin-top: -125px;
            display: flex;
            margin-bottom: -80px;
        }

        .container {
            padding: 40px;
            margin: 0 auto;
            max-width: 1200px;
        }

        .slider {
            position: relative;
            margin-bottom: 40px;
        }

        .slides {
            display: flex;
            overflow: hidden;
            border-radius: 8px;
        }

        .slides img {
            width: 100%;
            height: auto;
        }

        .slide {
            min-width: 100%;
            transition:  0.5s ease-in-out;
            position: relative;
        }

        .caption {
            position: absolute;
            bottom: 20px;
            left: 10px;
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 4px;
            font-size: 24px;
            font-style: italic;
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            padding: 10px;
            cursor: pointer;
        }

        .arrow-left {
            left: 10px;
        }

        .arrow-right {
            right: 10px;
        }

        .course-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .course {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
            margin-bottom: 20px;
            padding: 20px;
            box-sizing: border-box;
        }

        .course img {
            width: 100%;
            height: 200px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .course h3 {
            margin: 0 0 10px;
            color: #333;
        }

        .course p {
            margin: 0 0 10px;
            color: #666;
        }

        .buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .buttons button {
            padding: 10px;
            border: none;
            border-radius: 4px;
            background: black;
            color: white;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            max-width: 200px; /* Optional: Limit the max width of the button */
            margin-top: 10px; /* Optional: Space between buttons */
        }

        footer {
            background: black;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header class="header">
        <section class="nav">
            <a href="home.php"><i class="fas fa-home"></i> HOME</a>
            <a href="about.html"><i class="fas fa-info-circle"></i> ABOUT US</a>
            <a href="Course.php"><i class="fas fa-book"></i> COURSES</a>
            <a href="contact.html"><i class="fas fa-envelope"></i> CONTACT</a>
            <a href="Account.php"><i class="fas fa-user"></i> ACCOUNT</a>
            <div class="search">
                <img src="logo/logo2.png" alt="Welcome Image" class="responsive-img">
            </div>
        </section>
    </header>
    <div class="container">
        <div class="slider">
            <div class="slides">
                <div class="slide">
                    <img src="images/slide1.jpeg" alt="Slide 1" loading="lazy">
                    <div class="caption">IT is the future!</div>
                </div>
                <div class="slide">
                    <img src="images/slide2.jpeg" alt="Slide 2">
                    <div class="caption">Embrace technology!</div>
                </div>
                <div class="slide">
                    <img src="images/slide3.jpeg" alt="Slide 3">
                    <div class="caption">Learn and grow!</div>
                </div>
                <div class="slide">
                    <img src="images/slide4.jpeg" alt="Slide 4">
                    <div class="caption">Innovate and Inspire!</div>
                </div>
                <div class="slide">
                    <img src="images/slide5.jpeg" alt="Slide 5">
                    <div class="caption">Transform your skills!</div>
                </div>
            </div>
            <div class="arrow arrow-left" onclick="prevSlide()">&#10094;</div>
            <div class="arrow arrow-right" onclick="nextSlide()">&#10095;</div>
        </div>
        <div class="course-list">
            <?php
            // Assuming you have a database connection file called db.php
            include 'db.php';

            $sql = "SELECT * FROM courses";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="course">';
                    echo '<img src="admin/uploads/' . $row["uploaded_file"] . '" alt="' . $row["course_name"] . '">';
                    echo '<h3>' . $row["course_name"] . '</h3>';
                    echo '<p>Year: ' . $row["time_period"] . '</p>';
                    echo '<p>Cost: $' . $row["cost"] . '</p>';
                    echo '<div class="buttons">';
                    echo '<button>Buy</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>

    <script>
        const slides = document.querySelectorAll('.slide');
        let currentSlide = 0;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.transform = `translateX(${(i - index) * 100}%)`;
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function prevSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        setInterval(nextSlide, 3000);
    </script>
</body>
</html>
