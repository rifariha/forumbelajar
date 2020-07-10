<!doctype html>
<html lang="en">
@include('css')

<body>
    <!--::header part start::-->
    @include('menu')
    <!-- Header part end-->

   <!--================Blog Area =================-->
   
   <section class="blog_area single-post-area section_padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                  <img class="img-fluid" src="{{ url('storage/'.$news->image)}}" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?=$news->headline?>
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><i class="far fa-user"></i> <?=$news->category->category_name?></a></li>
                        <li><i class="fa fa-user"></i> By : <?=$news->created_by?></a></li>
                     </ul>
                     <p class="excert">
                        <?=$news->content?>
                     </p>
                     
                  </div>
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
   <!--================Blog Area end =================-->

   <!-- footer part start-->
   @include('footer')
    @include('js')
 </body>
 
 </html>