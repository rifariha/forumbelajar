<style>
    html {
  scroll-behavior: smooth;
}
</style>
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('homepage')}}"> <img src="{{ url('storage/'.$cms["logo-up-down"]) }}" alt="logo"> </a>
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
                                <a class="nav-link" href="{{ route('homepage.berita')}}">Berita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('homepage.documentation')}}">Dokumentasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#kontak-kami">Kontak Kami</a>
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