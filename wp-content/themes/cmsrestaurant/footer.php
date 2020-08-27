<?php
/*template Name: footer */
?>

<footer>
    <img class="footer-hachures" src="<?php bloginfo('template_url'); ?>/assets/img/images/hachures-noires.png" alt="">
    <div class="footer-container">
    
        <div class="footer-info">
            <h2><?php echo bloginfo('name') ;?></h2>
            <div class="footer-info-text">
                <p><?php echo get_field('option-description', 'option') ;?></p>
            </div>
            <div class="footer-info-social">
                <a href="<?php echo get_field('option-socialmedias_option-socialmedias-facebook', 'option') ;?>" class="footer-fb"><img src="<?php bloginfo('template_url'); ?>/assets/img/svg/facebook.svg" alt=""></a>
                <a href="<?php echo get_field('option-socialmedias_option-socialmedias-twitter', 'option') ;?>" class="footer-twitter"><img src="<?php bloginfo('template_url'); ?>/assets/img/svg/twitter.svg" alt=""></a>
                <a href="<?php echo get_field('option-socialmedias_option-socialmedias-instagram', 'option') ;?>" class="footer-insta"><img src="<?php bloginfo('template_url'); ?>/assets/img/svg/instagram.svg" alt=""></a>
                <a href="<?php echo get_field('option-socialmedias_option-socialmedias-linkedin', 'option') ;?>" class="footer-linkedin"><img src="<?php bloginfo('template_url'); ?>/assets/img/svg/linkedin.svg" alt=""></a>
            </div>
        </div>
        <div class="footer-contact-hour">
            <div class="footer-open">
                <h3>Open Hours</h3>
                <div class="footer-days-open">
                    <div class="footer-hour">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/svg/time-clock.svg" alt="">
                    </div>
                    <div class="footer-days-hour">
                            <p>Mondays</p>
                            <p class='day-line'><hr></p>
                            <p><?php echo get_field('option-openinghours_option-openinghours-mondays', 'option');?></p>
                    </div>
                </div>
                <div class="footer-days-open">
                    <div class="footer-hour">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/svg/time-clock.svg" alt="">
                    </div>
                    <div class="footer-days-hour">
                            <p>Tue-Fri</p>
                            <p><hr></p>
                            <p><?php echo get_field('option-openinghours_option-openinghours-tuefri', 'option');?></p>
                    </div>
                </div>
                <div class="footer-days-open">
                    <div class="footer-hour">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/svg/time-clock.svg" alt="">
                    </div>
                    <div class="footer-days-hour">
                            <p>Sat-Sun</p>
                            <p><hr></p>
                            <p><?php echo get_field('option-openinghours_option-openinghours-satsun', 'option');?></p>
                    </div>
                </div>
                <div class="footer-days-open">
                    <div class="footer-hour">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/svg/time-clock.svg" alt="">
                    </div>
                    <div class="footer-days-hour">
                            <p>Public Holidays</p>
                            <p><hr></p>
                            <p><?php echo get_field('option-openinghours_option-openinghours-publicholidays', 'option');?></p>
                    </div>
                </div>
            </div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <div class="footer-contact-line">
                    <div class="footer-logo-contact">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/svg/call.svg" alt="">
                    </div>
                    <div class="footer-info-contact">
                        <p><?php echo get_field('option-phone', 'option');?></p>
                    </div>
                </div>
                <div class="footer-contact-line">
                    <div class="footer-logo-contact">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/svg/place.svg" alt="">
                    </div>
                    <div class="footer-info-contact">
                        <p><?php echo get_field('option-streetaddress', 'option');?></p>
                        <p><?php echo get_field('option-postalcode', 'option');?></p>
                        <p><?php echo get_field('option-city', 'option');?></p>
                    </div>
                </div>
                <div class="footer-contact-line">
                    <div class="footer-logo-contact">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/svg/mail-1.svg" alt="">
                    </div>
                    <div class="footer-info-contact">
                        <p><?php echo get_field('option-email', 'option');?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-insta">
            <h3>Instagram</h3>
            <div class="footer-imgbox">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/plat1.jpg" alt="">
            </div>
            <div class="footer-imgbox">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/plat2.jpg" alt="">
            </div>
            <div class="footer-imgbox">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/plat3.jpg" alt="">
            </div>
            <div class="footer-imgbox">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/plat4.jpg" alt="">
            </div>
            <div class="footer-imgbox">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/plat5.jpg" alt="">
            </div>
            <div class="footer-imgbox">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/plat6.jpg" alt="">
            </div>
        </div>
        <div class="footer-copyright">
            <hr>
            <p>2020 - Team 5 - All rights reserved</p>
        </div>
    </div>
</footer>
</body>
</html>
<?php wp_footer() ?>
</body>
</html>