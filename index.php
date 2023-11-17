<?php 
include('functions/userfunctions.php');
include('includes/header.php'); ?>

    <?php
    if (isset($_SESSION['message'])) {
        ?>
        <div class="alert-container">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php
        unset($_SESSION['message']);
    }
    ?>
    <?php
    if (isset($registrationFormVisible) && $registrationFormVisible) {
        $overlayClass = "overlay-visible";
        $indexClass = "index-blur";
    } else {
        $overlayClass = "";
        $indexClass = "";
    }
    ?>
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['auth']) && $_SESSION['auth']) {
        // User is logged in, display the "categories.php" link
        echo '<!-- Banner -->
        <div class="banner">
            <div class="banner-content">
                <h1 class="animated-heading">Eurasian Paradise Resort</h1>
                <p class="animated-subtext">Your Ultimate Destination for Relaxation and Luxury</p>
                <a href="categories.php" class="btn btn-primary animated-button">Book Now</a>
            </div>
        </div>';
    } else {
        // User is not logged in, display the "login.php" link
        echo '<!-- Banner -->
        <div class="banner">
            <div class="banner-content">
                <h1 class="animated-heading">Eurasian Paradise Resort</h1>
                <p class="animated-subtext">Your Ultimate Destination for Relaxation and Luxury</p>
                <a href="login.php" class="btn btn-primary animated-button">Book Now</a>
            </div>
        </div>';
    }
    ?>
    <!-- Our Rooms -->
    <div class="container">
        <form class="checking-form">
            <label for="check-in">Check-in Date</label>
            <input type="date" id="check-in" name="check-in" required>
            
            <label for="check-out">Check-out Date</label>
            <input type="date" id="check-out" name="check-out" required>
            
            <label for="guest">Guest</label>
            <select id="guest" name="guest">
                <option value="one">One</option>
                <option value="two">Two</option>
                <option value="three">Three</option>
                <option value="four">Four</option>
                <option value="five">More</option>
            </select>   
            <button type="submit">Check Availability</button>
        </form>  
    </div>  
    <div class="room-options" id="our-rooms-section">
        <h2>Rooms</h2>
        <div class="row">
            <?php
            // Fetch room data from the database
            $categories = getAllActive("categories");

            if(mysqli_num_rows($categories) > 0)
            {
                while ($room = mysqli_fetch_assoc($categories)) {
                    ?>
                    <div class="col-md-3 room-option">
                        <img src="Images/<?= $room['image']; ?>" alt="<?= $room['name']; ?>" class="room-image">
                        <h3><?= $room['name']; ?></h3>
                        <p><?= $room['description']; ?></p>
                        <a href="rooms.php?categories=<?= $room['slug']; ?>" class="btn btn-outline-primary">Select</a>                    </div>
                    <?php
                }
            }
            else
            {
                echo "No rooms available";
            }
            ?>
        </div>
    </div>
    <!-- Services -->
    <section class="amenities" id="our-amenities-list">
        <h2>Services</h2>
        <div class="amenities-list">        
            <div class="amenity large">
                <img src="Images/icons8-balcony-96.png" alt="Sea View Balcony" class="icon">
                <h3>Sea View Balcony</h3>
                <p>Enjoy breathtaking ocean views from your private balcony.</p>
            </div>
            <div class="amenity medium">
                <img src="Images/icons8-bedroom-96.png" alt="Master Bedrooms" class="icon">
                <h3>Master Bedrooms</h3>
                <p>Luxurious master bedrooms for ultimate relaxation.</p>
            </div>
            <div class="amenity smaller">
                <img src="Images/icons8-cafe-96.png" alt="Large Cafe" class="icon">
                <h3>Large Cafe</h3>
                <p>Indulge in delicious meals and beverages at our spacious cafe.</p>
            </div>
            <div class="amenity small">
                <img src="Images/icons8-wifi-96.png" alt="WiFi Coverage" class="icon">
                <h3>WiFi Coverage</h3>
                <p>Stay connected with high-speed WiFi coverage throughout the property.</p>
            </div>
        </div>
    </section>
    <!-- About Us -->
    <section class="about-us" id="our-about-us-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 about-us-content">
                    <h2>About Us</h2>
                    <p>Welcome to Eurasian Paradise Resort, where luxury meets tranquility. Nestled amidst the pristine beauty of nature, our resort offers you an unforgettable escape from the hustle and bustle of everyday life.</p>
                    <p>With a legacy of hospitality excellence spanning decades, we take pride in delivering a remarkable experience to our esteemed guests. Our commitment to providing top-notch services and creating cherished memories has earned us a special place in the hearts of travelers from around the world.</p>
                    <p>At Eurasian Paradise Resort, we believe in the power of relaxation and rejuvenation. Our meticulously designed rooms, each with its unique charm, offer a perfect blend of comfort and elegance. From breathtaking sea view balconies to luxurious master bedrooms, we cater to your every desire.</p>
                </div>
                <div class="col-md-6 about-us-image">
                    <div class="about-image-container">
                        <img src="Images/image (28).jpg" alt="About Us Image">
                        <div class="image-overlay">
                            <?php
                            // Check if the user is logged in
                            if (isset($_SESSION['auth']) && $_SESSION['auth']) {
                                // User is logged in, display the "categories.php" link
                                echo '<a href="categories.php" class="book-now-button">Book Now!</a>';
                            } else {
                                // User is not logged in, display the "login.php" link
                                echo '<a href="login.php" class="book-now-button">Book Now!</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Testimonial Section -->
    <section class="testimonials">
        <div class="testimonial-container">
            <h2>Testimonials</h2>
            <div class="testimonial-carousel owl-carousel">
                <div class="testimonial-item">
                    <img src="Images/icons8-user-96.png" alt="User 1" class="testimonial-image">
                    <div class="testimonial-text">
                        <p>"Absolutely loved my stay at Eurasian Paradise Resort. The room was luxurious, the services were top-notch, and the view was breathtaking."</p>
                        <div class="testimonial-author">
                            <span class="author-name">John Doe</span>
                            <div class="rating">
                                <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img src="Images/icons8-user-96.png" alt="User 2" class="testimonial-image">
                    <div class="testimonial-text">
                        <p>"A perfect escape from the city's chaos. The serene environment and comfortable rooms made my vacation truly relaxing."</p>
                        <div class="testimonial-author">
                            <span class="author-name">Jane Smith</span>
                            <div class="rating">
                                <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img src="Images/icons8-user-96.png" alt="User 3" class="testimonial-image">
                    <div class="testimonial-text">
                        <p>"I was impressed by the attention to detail and the warm hospitality. The resort exceeded my expectations in every way."</p>
                        <div class="testimonial-author">
                            <span class="author-name">Michael Johnson</span>
                            <div class="rating">
                                <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add two more testimonial items here -->
                <div class="testimonial-item">
                    <img src="Images/icons8-user-96.png" alt="User 4" class="testimonial-image">
                    <div class="testimonial-text">
                        <p>"Eurasian Paradise Resort exceeded my expectations. The breathtaking views and excellent service made my vacation truly memorable."</p>
                        <div class="testimonial-author">
                            <span class="author-name">Emily Brown</span>
                            <div class="rating">
                                <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item">
                    <img src="Images/icons8-user-96.png" alt="User 5" class="testimonial-image">
                    <div class="testimonial-text">
                        <p>"Such a peaceful retreat! The accommodations were superb, and the staff's hospitality made me feel right at home."</p>
                        <div class="testimonial-author">
                            <span class="author-name">David Wilson</span>
                            <div class="rating">
                                <span class="stars">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-owl-nav">
                <button class="custom-owl-prev">
                    <img src="Images/icons8-arrow-48 (1).png" alt="Previous">
                </button>
                <button class="custom-owl-next">
                    <img src="Images/icons8-arrow-48.png" alt="Next">
                </button>
            </div>
        </div>
    </section>
<!-- Contact Us Section -->
<section class="contact" id="our-contact-section">
    <h2>Contact</h2>
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h3>Get in Touch</h3>
                    <p>If you have any questions or inquiries, feel free to contact us. We're here to assist you!</p>
                    <ul class="contact-details">
                        <li><i class="material-icons">location_on</i>Zone 2 Balogo, Pasacao, Camarines Sur</li>
                        <li><i class="material-icons">phone</i>(054) 513 9707</li>
                        <li><i class="material-icons">email</i>eurasian32@gmail.com</li>
                    </ul>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/pages/Eurasian-Paradise-Resort-Pasacao/741242442587025" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3879.574505775955!2d123.05820497414655!3d13.50029630306865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a227f0784f7627%3A0x9ef70d9eb284bc92!2sEuresian%20Paradise%20Resort!5e0!3m2!1sfil!2sph!4v1692522498375!5m2!1sfil!2sph"  width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                    
                    </div>
                </div>
                <div class="col-md-6 contact-form">
                    <h3>Contact Form</h3>
                    <form>
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <textarea name="message" placeholder="Your Message" required></textarea>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>
