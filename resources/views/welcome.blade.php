<!doctype html>
<html lang="en">
@include('css')
<?php
    $image_url = url('storage/'.$cms["headline-image"]);
?>
<style>
.dots {
    font-style: italic;
    font-size:10pt;
    float:right;
}
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
  @include('menu')

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
                @foreach($news as $berita)
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                            <img src="{{ asset('thumbnail/'.$berita->thumbnail)}}" class="card-img-top" alt="blog">
                            <div class="card-body">
                                <a href="{{ route('homepage.berita',['category' => $berita->category_id])}}" class="btn_4"><?=$berita->category->category_name?></a>
                                <a href="{{route('homepage.berita.detail',[$berita->slug])}}">
                                    <h5 class="card-title"><?=$berita->headline?></h5>
                                </a>
                                <p>
                                    @if (strlen($berita->content) > 50)
                                        <?=substr($berita->content, 0,100).'...';?>
                                            <a href="{{route('homepage.berita.detail',[$berita->slug])}}"><span class="dots"> baca selengkapnya<span></a>
                                    @endif
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <br>
            <p class="dots"><a href="{{ route('homepage.berita') }}"> Lihat Berita Lainnya </a></p>
        </div>
    </section>
    <!--::review_part start::-->
    <section class="testimonial_part">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>tesimonials</p>
                        <h2>Apa Kata Mereka</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="textimonial_iner owl-carousel">
                        @foreach($testimoni as $testi)
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-8 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p><?=$testi->desription ?></p>
                                        <h4><?=$testi->slider_name ?></h4>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                    <img src="{{ url('storage/'.$testi->image)}}" alt="#">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
    @include('footer')
    @include('js')
    <!-- footer part end-->
</body>

</html>