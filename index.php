<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Travel Experts</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Sarabun" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>

    <body class="index">
        <div class="HeroImg">
            <?php 
                    include_once("php/header.php"); 
            ?>

            <form action="" method="POST" class="travelForm">
                <div class="going-to">
                    <div class="dest-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <input type="text" placeholder="Where would you like to go?" >
                </div>
                <div class="leaving-from">
                    <input type="text" placeholder="Leaving from">
                </div>
                <div class="leaving-date">
                    <input type="date">
                </div>
                <div class="passengers-fields">
                    <div class="pass-icon">
                        <i class="far fa-user"></i>
                    </div>
                    <label for="passenger-number" class="passenger-info">Passengers</label>
                    <input readonly type="text" id="passenger-number" class="passenger-num" value>
                    <div class="passenger">
                        <div class="quantity-selector select-adult">
                            <label class="pass-label" for="quantity-selector-adult">0 Adults</label>
                            <input disabled type="number" min="0" class="quantity-selector__input" id="quantity-selector-adult" value="0" style="display:none;">
                            <button type="button" class="decrease-adult">-</button>
                            <button type="button" class="increase-adult">+</button>
                        </div>
                        <div class="quantity-selector select-children">
                            <label class="pass-label" for="quantity-selector-children">0 Children</label>
                            <input disabled type="number" min="0" class="quantity-selector__input" id="quantity-selector-children" value="0" style="display:none;">
                            <button type="button" class="decrease-child">-</button>
                            <button type="button" class="increase-child">+</button>
                        </div>
                        <button type="button" class="confirm-button">Done</button>
                    </div>
                </div>
                <button type="button">Search</button>

            </form>
            
        </div>

        <main>
            <!-- Carousel -->
            <div class="slide-container">
                <div class="slideshow">
                    <div class="slide fade">
                        <img src="imgs/slide1.jpg" alt="slide1">
                    </div>

                    <div class="slide fade">
                        <img src="imgs/slide2.jpg" alt="slide2">
                    </div>

                    <div class="slide fade">
                        <img src="imgs/slide3.jpg" alt="slide3">
                    </div>

                    <div class="slide fade">
                        <img src="imgs/slide4.jpg" alt="slide4">
                    </div>

                    <div class="slide fade">
                        <img src="imgs/slide5.jpg" alt="slide5">
                    </div>

                    <div class="slide fade">
                        <img src="imgs/slide6.jpg" alt="slide6">
                    </div>
                </div>

                <!-- Thumbnails -->
                <div class="thumbnail-show">
                    <div class="thumbnail">
                        <img src="imgs/slide1.jpg" alt="slide1">
                    </div>

                    <div class="thumbnail">
                        <img src="imgs/slide2.jpg" alt="slide2">
                    </div>

                    <div class="thumbnail">
                        <img src="imgs/slide3.jpg" alt="slide3">
                    </div>

                    <div class="thumbnail">
                        <img src="imgs/slide4.jpg" alt="slide4">
                    </div>

                    <div class="thumbnail">
                        <img src="imgs/slide5.jpg" alt="slide5">
                    </div>

                    <div class="thumbnail">
                        <img src="imgs/slide6.jpg" alt="slide6">
                    </div>
                </div>
            </div>

            <p class="destination-text">Destinations</p>

            <!-- Image Gallery -->
            <div class="gallery-wrapper">
                <div class="img-gallery">
                    <div class="gallery-box">
                        <a href="#" target="_blank"><img src="imgs/canada.jpg" alt="canada"></a>
                        <div class="desc">Canada</div>
                    </div>
                    <div class="gallery-box">
                        <a href="#" target="_blank"><img src="imgs/italy.jpg" alt="italy"></a>
                        <div class="desc">Italy</div>
                    </div>
                    <div class="gallery-box">
                        <a href="#" target="_blank"><img src="imgs/us.jpg" alt="us"></a>
                        <div class="desc">US</div>
                    </div>
                    <div class="gallery-box">
                        <a href="#" target="_blank"><img src="imgs/thailand.jpg" alt="thailand"></a>
                        <div class="desc">Thailand</div>
                    </div>
                    <div class="gallery-box">
                        <a href="#" target="_blank"><img src="imgs/singapore.jpg" alt="singapore"></a>
                        <div class="desc">Singapore</div>
                    </div>
                    <div class="gallery-box">
                        <a href="#" target="_blank"><img src="imgs/france.jpg" alt="france"></a>
                        <div class="desc">France</div>
                    </div>
                    <div class="gallery-box">
                        <a href="#" target="_blank"><img src="imgs/egypt.jpg" alt="egypt"></a>
                        <div class="desc">Egypt</div>
                    </div>
                    <div class="gallery-box">
                        <a href="#" target="_blank"><img src="imgs/china.jpg" alt="china"></a>
                        <div class="desc">China</div>
                    </div>
                </div>

                <button class="scroll-left">&#10094;</button>
                <button class="scroll-right">&#10095;</button>
            </div>

        </main>
        <?php
            print("<script src=\"$_root/scripts/script.js\"></script>");
        ?>
    </body>
</html>
