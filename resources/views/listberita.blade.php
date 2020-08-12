<!doctype html>
<html lang="en">
@include('css')
<style>
.dots {
    font-style: italic;
    font-size:10pt;
    float:right;
    padding:10px
}
</style>
<body>
    @include('menu')
    <br><br>
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @foreach($news as $berita)
                        <?php
                            $str = strtotime($berita->created_at);
                            $day = date('d',$str);
                            $month = date('M',$str);
                        ?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ url('storage/'.$berita->image) }}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3><?=$day?></h3>
                                    <p><?=$month?></p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{route('homepage.berita.detail',[$berita->slug])}}">
                                    <h2><?=$berita->headline?></h2>
                                </a>
                                <p>@if (strlen($berita->content) > 50)
                                        <?=substr($berita->content, 0,100).'...';?>
                                        <a href="{{route('homepage.berita.detail',[$berita->slug])}}"><span class="dots"> Baca selengkapnya<span></a>
                                    @endif</p>
                                <ul class="blog-info-link">
                                    <li><a href="{{ route('homepage.berita',['category' => $berita->category_id])}}"><i class="far fa-user"></i> <?=$berita->category->category_name?></a></li>
                                </ul>
                            </div>
                        </article>
                        @endforeach

                        <?=$news->links()?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Kategori</h4>
                            <ul class="list cat-list">
                                @foreach($category as $val)
                                <li>
                                    <a href="{{ route('homepage.berita',['category' => $val->id])}}" class="d-flex">
                                        <p><?=$val->category_name?></p>
                                        <p>(<?=$val->amount?>)</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- footer part start-->
    @include('footer')
    @include('js')
    <!-- footer part end-->

</body>

</html>