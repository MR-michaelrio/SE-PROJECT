<div class="container-fluid head">
    <div class="row align-items-center">
        <div class="col-auto">
            <button class="navbar-toggler menu-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars "></i>
            </button>
        </div>
        <div class="col logo-div">
            <a class="" href="/" style="color: black !important;">
                <div class="align-items-center" style="display: flex;">
                    <img src="{{asset('asset/Food Library Logo 1.png')}}" class="logo" alt="" srcset="">
                    <span class="title-head">Food Library</span>
                </div>
            </a>
        </div>
        <div class="col search">
            <form class="d-flex" role="search">
                <input class="form-control" style="border-radius: 50px 0px 0px 50px; width: 100%;" type="search" placeholder="Search" aria-label="Search">
                <button class="btn icon-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="col-auto search">
            <a href="#" ><i class="fa-solid fa-sliders icon-filter"></i></a>
        </div>
        <div class="col">
            <div class="float-end align-items-center">
                <span class="title-username">{{ Auth::user()->user_name }}</span>
                <img src="{{asset('asset/user.png')}}" class="username" alt="" srcset="">
            </div>
        </div>
    </div>
</div>