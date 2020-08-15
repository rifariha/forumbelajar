<!doctype html>
@include('css')

<body>
    @include('menu')


    <!--::review_part start::-->
    <section class="special_cource padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>Dokumentasi</p>
                        <h2>Galeri Madrasah</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($gallery as $val)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                    <img src="{{ url('storage/'.$val->image)}}" class="special_img" alt="">
                        <div class="special_cource_text">         
                            <p><?=$val->description?></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <!--::blog_part end::-->
    <!-- footer part start-->
   @include('footer')
   @include('js')
</body>

</html>