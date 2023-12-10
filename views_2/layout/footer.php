<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="<?=base_url?>assets_2/assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="<?=base_url?>assets_2/assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="<?=base_url?>assets_2/assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="<?=base_url?>assets_2/assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="<?=base_url?>assets_2/assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->
<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About us</h2>
                    <p>Welcome to FruitKha - your go-to destination for fresh, delicious fruits delivered to your door. At FruitKha, we're on a mission to redefine your fruit experience.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Get in Touch</h2>
                    <ul>
                        <li>Tunis Road Km4, Sfax.</li>
                        <li>mahdi.mesfar@enis.tn</li>
                        <li>+216 22 106 050</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Pages</h2>
                    <ul>
                        <li><a href="<?=base_url?>">Home</a></li>
                        <?php
                        $categories = Utils::showCategories();
                        foreach ($categories as $category):
                            ?>
                            <li>
                                <a href="<?= base_url ?>category/display&id=<?= $category->id; ?>"><?= $category->name ?></a>
                            </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Subscribe</h2>
                    <p>Subscribe to our mailing list to get the latest updates.</p>
                    <form action="index.html">
                        <input type="email" placeholder="Email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <p>Copyrights &copy; 2023 - <a href="https://github.com/MahdiMesfar2000">Mahdi Mesfar</a>,  All Rights Reserved.<br>
                    Distributed By - <a href="https://github.com/MahdiMesfar2000">Mahdi Mesfar</a>
                </p>
            </div>
            <div class="col-lg-6 text-right col-md-12">
                <div class="social-icons">
                    <ul>
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end copyright -->

<!-- jquery -->
<script src="<?=base_url?>assets_2/assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="<?=base_url?>assets_2/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="<?=base_url?>assets_2/assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="<?=base_url?>assets_2/assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="<?=base_url?>assets_2/assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="<?=base_url?>assets_2/assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="<?=base_url?>assets_2/assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="<?=base_url?>assets_2/assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="<?=base_url?>assets_2/assets/js/sticker.js"></script>
<!-- main js -->
<script src="<?=base_url?>assets_2/assets/js/main.js"></script>

<!-- Add this in the <head> section or include it in a separate JavaScript file -->


</body>
</html>