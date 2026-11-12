<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */

$primary_color     = FoodcartTheme::$options['primary_color']; // #e30025
$primary_rgb       = FoodcartTheme_Helper::hex2rgb( $primary_color ); // 227, 0, 37
$secondary_color   = FoodcartTheme::$options['secondary_color']; // #f89f24
$secondary_rgb     = FoodcartTheme_Helper::hex2rgb( $secondary_color ); // 248, 159, 36

/*---------------------------------    
INDEX
===================================
#. Button
#. Section Title
#. Slider
#. Owl Nav 1
#. Owl Nav 2
#. EL: Fmp Owl Nav
#. About
#. Text With Button
#. Post
#. Recipe
#. Gallery
#. Info Text
#. CTA
#. Portfolio
#. Team
#. Counter
#. Others
#. EL: Card Food Menu 1
----------------------------------*/

/*-----------------------
#. Button
------------------------*/
?>
.entry-content .light-button ,
.entry-content .light-button i,
.entry-content a.grid-fill-btn:hover,
.entry-content .rt-grid-fill-btn a.grid-fill-btn:hover,
.entry-content .rt-text-with-btn a.light-box:hover {
	color: <?php echo esc_html($primary_color); ?> !important;
}
.multiscroll-wrapper .ms-left .left-slide .item-btn,
.title-text-button .rtin-dark .foodcart-button:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.entry-content a.grid-fill-btn,
.entry-content .rt-grid-fill-btn a.grid-fill-btn,
.dark-button {
	border-color: <?php echo esc_html($primary_color); ?>;
	background: <?php echo esc_html($primary_color); ?>;
}
.entry-content .rt-text-with-btn a.light-box,
.multiscroll-wrapper .ms-left .left-slide .item-btn:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.title-text-button .rtin-dark .foodcart-button {
	border-color: <?php echo esc_html($primary_color); ?>;
	background: <?php echo esc_html($primary_color); ?>;
}
.ig-block .instagallery-actions .igact-instalink {
    background: <?php echo esc_html($primary_color); ?> !important;
}
.ig-block .instagallery-actions .igact-instalink:hover {
    background: <?php echo esc_html($secondary_color); ?> !important;
}
.multiscroll-wrapper .ms-left .left-slide1 .item-btn {
	border-color: <?php echo esc_html($primary_color); ?>;
}
.multiscroll-wrapper .ms-left .left-slide1 .item-btn:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-box .rtin-dark .foodcart-button {
	background: <?php echo esc_html($secondary_color); ?>;
}
.rtin-contact-box .rtin-dark .foodcart-button:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-box .rtin-light .foodcart-button:hover {
    background: <?php echo esc_html($secondary_color); ?>;
}
.slider-button-1,
.slider-button-2:hover {
    background: <?php echo esc_html($primary_color); ?>;
}
.slider-button-1:hover,
.slider-button-2 {
    background: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-----------------------
#. Section Title
------------------------*/
?>
.rt-vc-title-1 h2::after,
.rt-vc-title h2:after ,
.section-title h2:after,
.sec-title.style2 .rtin-title:before,
.sec-title.style2 .rtin-title:after {
	background: <?php echo esc_html($primary_color); ?>;
}
.sec-title.style2 .section-title span {
	color: <?php echo esc_html($primary_color); ?>;
}
.rtin-contact-address ul li span i {
	color: <?php echo esc_html($secondary_color); ?>;
}
.barshow .title-bar {
	background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-----------------------
#. Slider
------------------------*/
?>
.multiscroll-wrapper .ms-social-link li a,
.fullpage-wrapper .fullpage-scroll-content .item-btn:hover,
.multiscroll-wrapper .ms-copyright a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.multiscroll-wrapper .ms-social-link li a:hover,
.slider-right-side-content ul.footer-social li a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.fps-menu-list li.active a {
	color: <?php echo esc_html($primary_color); ?>;
}
.ms-menu-list li.active a {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-el-slider .nivo-directionNav a.nivo-prevNav:hover,
.rt-el-slider .nivo-directionNav a.nivo-nextNav:hover,
.rt-el-slider .nivo-caption .rtin-content-wrap .rtin-btn a {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.rt-el-slider .nivo-caption .rtin-content-wrap .rtin-btn a:hover {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.ls-v6 a.ls-nav-prev,
.ls-v6 a.ls-nav-next {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.ls-v6 a.ls-nav-prev:hover,
.ls-v6 a.ls-nav-next:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.ls-v6 .ls-bottom-nav-wrapper .ls-bottom-slidebuttons a.ls-nav-active:hover,
.ls-v6 .ls-bottom-nav-wrapper .ls-bottom-slidebuttons a.ls-nav-active {
	background: <?php echo esc_html($primary_color); ?> !important;
	border-color: <?php echo esc_html($primary_color); ?> !important;
}
<?php
/*-----------------------
#. About
------------------------*/
?>
.title-text-button .rtin-light .foodcart-button {
	color: <?php echo esc_html($primary_color); ?>;
}
.rtin-video .rtin-play {
	background: <?php echo esc_html($secondary_color); ?>;
}
.rtin-video .rtin-play:hover {
    background-color: rgba(<?php echo esc_html($secondary_rgb); ?>, 0.8);
}
<?php
/*-------------------------------------
#. Owl Nav 1
---------------------------------------*/
?>
.rt-owl-nav-1.slider-nav-enabled .owl-carousel .owl-nav > div {
	border-color: <?php echo esc_html($primary_color); ?>;
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1.slider-dot-enabled .owl-carousel .owl-dots .owl-dot:hover span,
.rt-owl-nav-1.slider-dot-enabled .owl-carousel .owl-dots .owl-dot.active span {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-1.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	color: <?php echo esc_html($primary_color); ?>;
}

<?php
/*-------------------------------------
#. Owl Nav 2
---------------------------------------*/
?>
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot:hover span,
.rt-owl-nav-2.slider-dot-enabled .owl-carousel .owl-dot.active span {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-nav > div:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-owl-nav-2.slider-nav-enabled .owl-carousel .owl-nav > div {
	border-color: <?php echo esc_html($primary_color); ?>;
	color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. EL: Fmp Owl Nav
---------------------------------------*/
?>
.fmp-carousel.owl-carousel .owl-nav > div {
	border-color: <?php echo esc_html($primary_color); ?>;
	color: <?php echo esc_html($primary_color); ?>;
}
.fmp-carousel.owl-carousel .owl-nav > div:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
.fmp-carousel.owl-carousel .owl-dots .owl-dot:hover span,
.fmp-carousel.owl-carousel .owl-dots .owl-dot.active span {
	background: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Portfolio
---------------------------------------*/
?>
ul.about-list li:before,
.portfolio-default-single .rtin-portfolio-content ul li:before,
ul.rtin-portfolio-info .rtin-social li a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-portfolio-1 .rtin-item .item-img:after {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-portfolio-tab a:after {
	background: <?php echo esc_html($primary_color); ?>;
}
.rt-portfolio-2 .rtin-item .item-img:after,
.rt-portfolio-3 .item-img:before,
.rt-portfolio-4 .rtin-item .item-img:after {
	background-color: rgba(<?php echo esc_html($primary_rgb); ?>, 0.8);
}
.rt-portfolio-3 .rtin-item .rtin-content .rtin-cat a {
	background: <?php echo esc_html($secondary_color); ?>;
}

<?php
/*-------------------------------------
#. Team
---------------------------------------*/
?>

.team-grid-style1 .rtin-item .team-content,
.team-grid-style1 ul.rtin-social li a,
.team-grid-style2 ul.rtin-social li a:hover,
.team-single .rtin-content ul.rtin-social li a:hover,
.team-style1 .rtin-item .team-content,
.team-style1 ul.rtin-social li a {
	background: <?php echo esc_html($primary_color); ?>;
}
.team-grid-style1 ul.rtin-social li a:hover,
.team-style1 ul.rtin-social li a:hover {
	background: <?php echo esc_html($secondary_color); ?>;
}
.team-grid-style2 .rtin-designation,
.team-grid-style2 ul.rtin-social li a,
.team-single .rtin-content ul li,
.team-single .rtin-content ul.rtin-social li a,
.team-style4 .slick-carousel-content .team-box-content .rtin-designation,
.team-style4 .slick-carousel-content .team-box-content .rtin-social li a,
.team-style2 ul.rtin-social li a {
	color: <?php echo esc_html($primary_color); ?>;
}
.team-grid-style1 h3.rtin-title a:hover,
.team-grid-style2 h3.rtin-title a:hover,
.team-style1 h3.rtin-title a:hover,
.team-style2 .rtin-designation,
.team-style3 .rtin-designation,
.team-style2 h3.rtin-title a:hover,
.team-style4 .slick-carousel-content .team-box-content .rtin-title a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.team-style2 .rtin-content-wrap:hover figure,
.team-style3 .rtin-content-wrap:hover figure,
.team-style4 .team-box-nav .slick-center .nav-item,
.team-style4 .team-box-nav .slick-prev:hover, 
.team-style4 .team-box-nav .slick-next:hover {
	background: <?php echo esc_html($primary_color); ?>;
}
.team-style4 .team-box-nav .slick-prev, 
.team-style4 .team-box-nav .slick-next {
	color: <?php echo esc_html($primary_color); ?>;
	border-color: <?php echo esc_html($primary_color); ?>;
}
.team-style4 .slick-carousel-content .team-box-content .rtin-social li a:hover,
.team-style2 ul.rtin-social li a:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Testimonial Slider
---------------------------------------*/
?>
.rtin-testimonial-1 .rtin-title,
.rtin-testimonial-2 .rtin-title {
  color: <?php echo esc_html($primary_color); ?>;
}
.rtin-testimonial-grid .rtin-item .rtin-designation {
  color: <?php echo esc_html($secondary_color); ?>;
}

<?php
/*-------------------------------------
#. Post
---------------------------------------*/
?>
.post-grid-1 .post-content h3 a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.post-grid-1 .post-content .post-meta ul li a:hover,
.post-grid-2 .rtin-single-post .post-meta ul li a:hover,
.post-grid-1 .post-content .post-meta ul li i,
.post-grid-2 .rtin-single-post .post-meta ul li i {
	color: <?php echo esc_html($secondary_color); ?>;
}
.post-grid-1 .post-content .blog-date,
.post-grid-2 .rtin-single-post .rtin-content .blog-date {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.post-grid-2 .rtin-single-post .rtin-content h3 a:hover {
  color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Recipe
---------------------------------------*/
?>
.recipe-default .rtin-content h3 a:hover,
.recipe-default .rtin-content .rtin-cat a:hover,
.single-recipe-area .single-recipe-inner .tools-bar li a i,
.single-recipe-inner .recipe-serving i,
.single-recipe-area .single-recipe-inner .ingredients-box ul li i,
.chef-box .chef-box-content .chef-date,
.chef-box .chef-box-content h3 a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.recipe-default .rtin-content .rtin-date,
.recipe-default .rtin-item .rtin-content i,
.single-recipe-inner .post-thumb .post-meta i,
.chef-box .chef-box-content .rtin-cat i,
.chef-box .chef-box-content .rtin-cat a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.related-recipe .owl-custom-nav-title:after,
.single-recipe-inner .download-pdf a:hover,
.related-recipe .owl-custom-nav > div:hover {
	background-color: <?php echo esc_html($primary_color); ?>;
}
.single-recipe-inner .download-pdf a {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.related-recipe .owl-custom-nav > div {
	color: <?php echo esc_html($primary_color); ?>;
	border-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Gallery
---------------------------------------*/
?>
.gallery-style1 .gallery-item-img:after,
.gallery-style2 .item-wrap {
	background-color: rgba(<?php echo esc_html($primary_rgb); ?>, 0.9);
}
.gallery-style1 .rtin-content h3 a:hover,
.gallery-style1 .rtin-content .rtin-cat a:hover,
.gallery-style2 .rtin-content h3 a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
.gallery-style2 .item-btn-wrap .img-popup-icon:hover {
	background-color: <?php echo esc_html($secondary_color); ?>;
}
.gallery-default .rt-gallery-tab a.current {
	background-color: <?php echo esc_html($primary_color); ?>;
	border-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*-------------------------------------
#. Info Text
---------------------------------------*/
?>
.book-table .book-item .item-title {
  color: <?php echo esc_html($primary_color); ?>;
}
.info-style4 .rtin-image .rtin-media .rtin-item-title a i {
	color: <?php echo esc_html($secondary_color); ?>;
}
.info-box .rtin-item-title a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.info-style4.info-box .rtin-item-title a:hover {
	color: <?php echo esc_html($secondary_color); ?>;
}
<?php
/*-----------------------
#. CTA
------------------------*/
?>
.rt-text-advertise h2 span,
.rt-cta-1 .rtin-cta-contact-button a:hover {
	color: <?php echo esc_html($primary_color); ?>;
}
.rt-cta-2 .rtin-cta-right:before ,
.rt-cta-2 .rtin-cta-right {	
  background-color: <?php echo esc_html($primary_color); ?>;
}
<?php
/*--------------------------------------
#. Counter
---------------------------------------*/
?>
.rt-vc-counter-4 .awards-box a {
	border-color: <?php echo esc_html( $primary_color );?>;
}
.rt-vc-counter-4 .awards-box a i {
	background-color: <?php echo esc_html( $primary_color );?>;
}
.rt-counter .rtin-item .rtin-title:after {
	background-color: <?php echo esc_html( $secondary_color ); ?>;
}
<?php
/*------------------------------
#. Others
--------------------------------*/
?>
.fixed-sidebar-addon .elementor-widget-wp-widget-nav_menu ul > li > a:hover,
.fixed-sidebar-addon .rt-about-widget .footer-social li a:hover {
    color: <?php echo esc_html( $primary_color ); ?>;
}

.rt-post-vc-section-6 .rtin-single-post .rtin-item-info .rtin-post-date,
.rt-post-vc-section-6 .rtin-single-post:hover .rtin-item-info h3 a {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.rt-cat-list-widget li:before,
.rt-team-slider-nine .team-box .team-content-holder,
.rtin-faq .faq-item .faq-number span,
.reservation-form {
    background: <?php echo esc_html( $primary_color );?>;
}
<?php
/*------------------------------
#. EL: Card Food Menu 1
--------------------------------*/
?>
.food-menu-box-layout2 .food-menu-box-content .food-menu-heading .item-title,
.food-menu-box-layout3 .item-img .item-price,
.food-menu-box-layout1 .food-price .item-btn:hover, 
.food-menu-box-layout1 .food-price .fmp-wc-add-to-cart-btn:hover,
.food-menu-box-layout7 .food-menu-box-content .food-price .item-btn:hover, 
.food-menu-box-layout7 .food-menu-box-content .food-price .add_to_cart_button:hover,
.food-menu-box-layout7 .slick-prev:hover, 
.food-menu-box-layout7 .slick-next:hover {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.food-menu-box-layout1 .food-price .item-price,
.food-menu-box-layout2 .food-menu-box-content .media .media-body .item-price,
.food-menu-box-layout7 .food-menu-box-content .food-price .item-price {
    color: <?php echo esc_html( $primary_color ); ?>;
}
.food-menu-box-layout2 .food-menu-box-content .media .media-body .food-title:hover,
.food-menu-box-layout1 .food-details .item-title a:hover,
.food-menu-box-layout3 .item-content .item-title a:hover,
.food-menu-box-layout4 .tab-content .tab-pane .foodmenu-content-box .item-content .menu-title .item-title a:hover,
.food-menu-box-layout7 .food-menu-box-content .food-details .item-title a:hover  {
	color: <?php echo esc_html( $primary_color ); ?>;
}
.food-menu-box-layout2 .food-menu-box-content .media .media-body .action-area li a {
    border-color: <?php echo esc_html( $secondary_color );?>;
    background-color: <?php echo esc_html( $secondary_color );?>;
}
.food-menu-box-layout8 .food-menu-box-item .item-content > a,
.food-menu-box-layout9 .item-content .item-btn {
    border-color: <?php echo esc_html( $secondary_color );?>;
    color: <?php echo esc_html( $secondary_color );?>;
}
.food-menu-box-layout2 .food-menu-box-content .media .media-body .action-area li a:hover,
.food-menu-box-layout8 .food-menu-box-item .item-content > a:hover,
.food-menu-box-layout9 .item-content .item-btn:hover {
    border-color: <?php echo esc_html( $primary_color );?>;
    background-color: <?php echo esc_html( $primary_color );?>;
}
.food-menu-box-layout7 .slick-prev, 
.food-menu-box-layout7 .slick-next {
	border-color: <?php echo esc_html( $primary_color );?>;
}
.food-menu-box-layout8 .food-menu-box-item:after,
.food-menu-box-layout9:after {
	border-top-color: <?php echo esc_html( $primary_color );?>;
}
.food-menu-box-layout3 .item-img .item-icon ul li a {
	border-color: <?php echo esc_html( $secondary_color );?>;
}
.food-menu-box-layout8 .food-menu-box-item .item-content .item-title a:hover,
.food-menu-box-layout9 .item-content h3 a:hover {
	color: <?php echo esc_html( $secondary_color );?>;
}
.food-menu-box-layout3 .item-img .item-icon ul li a:hover,
.food-menu-box-layout1 .food-price .item-btn, 
.food-menu-box-layout1 .food-price .fmp-wc-add-to-cart-btn,
.food-menu-box-layout4 .tab-content .tab-pane .foodmenu-content-box .item-content form .add_to_cart_button,
.food-menu-box-layout4 .nav-tabs .nav-item a.active,
.food-menu-box-layout7 .food-menu-box-content .food-price .add_to_cart_button, 
.food-menu-box-layout7 .food-menu-box-content .food-price .item-btn {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.fmp-isotope-buttons button.selected, 
.isotop-btn1 a.current,
.fmp-isotope-buttons button:hover, 
.isotop-btn1 .nav-item:hover {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}
.multiscroll-wrapper .ms-left .ms-food-content-box .item-heading .item-title {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.multiscroll-wrapper .ms-left .left-slide1 .ms-food-content-box .media-body .food-price {
	color: <?php echo esc_html( $primary_color );?>;
}
.multiscroll-wrapper .ms-left .left-slide1 .ms-food-content-box .media-body h3 a:hover {
	color: <?php echo esc_html( $secondary_color );?>;
}
.site-banner-box-layout1 .food-price-name .food-price .currency {
	color: <?php echo esc_html( $secondary_color );?>;
}
.site-banner-box-layout1 a.item-btn {
    background-color: <?php echo esc_html( $primary_color ); ?>;
}
.site-banner-box-layout1 a.item-btn:hover {
    background-color: <?php echo esc_html( $secondary_color ); ?>;
}
<?php
/*------------------------------
#. UpMenu
--------------------------------*/
?>
.theme-categories-wrapper li a,
.theme-categories-wrapper .dropdown.open a{
    background-color: <?php echo esc_html( $primary_color );?> !important;
}











