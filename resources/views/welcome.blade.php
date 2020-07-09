<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/themify-icons.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/flaticon.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
</head>
<?php
    $image_url = url('storage/'.$cms["headline-image"]);
?>
<style>

/* line 164, E:/172 Etrain Education/172_Etrain_Education_html/sass/_banner.scss */
.banner_part:after {
  position: absolute;
  top: 163px;
  width: 41%;
  height: 69%;
  content: "";
  background-image: url("<?=$image_url?>");
  background-size: 100% 100%;
  right: 9%;
}

@media (max-width: 576px) {
  /* line 164, E:/172 Etrain Education/172_Etrain_Education_html/sass/_banner.scss */
  .banner_part:after {
    position: absolute;
    top: 150px;
    max-width: 100%;
    max-height: 100%;
    content: "";
    background-image: url("<?=$image_url?>");
    background-size: contain;
    right: 0;
    left: 0;
    text-align: center;
    margin: 0 auto;
    background-repeat: no-repeat;
  }
}

@media only screen and (min-width: 576px) and (max-width: 767px) {
  /* line 164, E:/172 Etrain Education/172_Etrain_Education_html/sass/_banner.scss */
  .banner_part:after {
    position: absolute;
    top: 110px;
    max-width: 100%;
    max-height: 100%;
    content: "";
    background-image: url("<?=$image_url?>");
    background-size: contain;
    right: 0;
    left: 0;
    text-align: center;
    margin: 0 auto;
    background-repeat: no-repeat;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  /* line 164, E:/172 Etrain Education/172_Etrain_Education_html/sass/_banner.scss */
  .banner_part:after {
    position: absolute;
    top: 110px;
    max-width: 100%;
    max-height: 100%;
    content: "";
    background-image: url("<?=$image_url?>");
    background-size: contain;
    right: 0;
    left: 0;
    text-align: center;
    margin: 0 auto;
    background-repeat: no-repeat;
  }
}

@media only screen and (min-width: 992px) and (max-width: 1200px) {
  /* line 164, E:/172 Etrain Education/172_Etrain_Education_html/sass/_banner.scss */
  .banner_part:after {
    position: absolute;
    max-width: 100%;
    max-height: 100%;
    content: "";
    background-image: url("<?=$image_url?>");
    background-size: contain;
    right: 5%;
    bottom: 0;
    top: auto;
    background-repeat: no-repeat;
  }
}

</style>
<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="{{ url('storage/'.$cms["logo-up-down"]) }}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                <a class="nav-link" href="{{ route('homepage')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">Berita</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cource.html">Dokumentasi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Kontak Kami</a>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="login">Login / Register</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-xl-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1><?=$cms['headline']?></h1>
                            <p><?=$cms['headline-description']?></p>
                                <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3 align-self-center">
                    <div class="single_feature_text ">
                        <h2><?=$cms['middle-title']?></h2>
                        <p><?=$cms['middle-description']?></p>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <h4><?=$cms['middle-sub-title-one']?></h4>
                            <p><?=$cms['middle-sub-title-one-description']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <h4><?=$cms['middle-sub-title-two']?></h4>
                            <p><?=$cms['middle-sub-title-two-description']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="single_feature">
                        <div class="single_feature_part single_feature_part_2">
                            <h4><?=$cms['middle-sub-title-three']?></h4>
                            <p><?=$cms['middle-sub-title-three-description']?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->


    <!--::blog_part start::-->
    <section class="blog_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>Berita</p>
                        <h2>Berita Terbaru</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{asset('template/img/blog/blog_1.png')}}" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Design</a>
                                <a href="blog.html">
                                    <h5 class="card-title">Dry beginning sea over tree</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{asset('template/img/blog/blog_2.png')}}" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Developing</a>
                                <a href="blog.html">
                                    <h5 class="card-title">All beginning air two likeness</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{asset('template/img/blog/blog_3.png')}}" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="#" class="btn_4">Design</a>
                                <a href="blog.html">
                                    <h5 class="card-title">Form day seasons sea hand</h5>
                                </a>
                                <p>Which whose darkness saying were life unto fish wherein all fish of together called</p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--::review_part start::-->
    <section class="testimonial_part">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>tesimonials</p>
                        <h2>Happy Students</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="textimonial_iner owl-carousel">
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_2.png" alt="#">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_3.png" alt="#">
                                    </div>
                                </div>
                                <div class="col-xl-4 d-none d-xl-block">
                                    <div class="testimonial_slider_text">
                                        <p>Behold place was a multiply creeping creature his domin to thiren open void
                                            hath herb divided divide creepeth living shall i call beginning
                                            third sea itself set</p>
                                        <h4>Michel Hashale</h4>
                                        <h5> Sr. Web designer</h5>
                                    </div>
                                </div>
                                <div class="col-xl-2 d-none d-xl-block">
                                    <div class="testimonial_slider_img">
                                        <img src="img/testimonial_img_1.png" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <!--::blog_part end::-->
    <br>
    <br>
    <br>
    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <div class="single-footer-widget footer_1">
                        <a href="index.html"> <img src="{{ url('storage/'.$cms["logo-up-down"]) }}"  alt=""> </a>
                        <p><?=$cms['footer-description']?></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="single-footer-widget footer_2">
                        <h4>Kontak Kami</h4>
                        <div class="contact_info">
                            <p><span> Alamat :</span> <?=$cms['alamat']?> </p>
                            <p><span> Telepon :</span> <?=$cms['telepon']?></p>
                            <p><span> Email : </span><?=$cms['email']?> </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright_part_text text-center">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ asset('template/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ asset('template/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('template/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('template/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.nice-select.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ asset('template/js/slick.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('template/js/waypoints.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('template/js/custom.js') }}"></script>
</body>

</html>