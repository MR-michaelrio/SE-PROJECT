<div class="offcanvas offcanvas-start" style="width: 350px;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <button type="button" class="close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-bars close"></i></button>
        <a class="" href="#" style="color: black !important;">
            <div class="align-items-center" style="display: flex;">
                <img src="{{asset('asset/Food Library Logo 1.png')}}" class="logo" alt="" srcset="">
                <span class="title-head">Food Library</span>
            </div>
        </a>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link side-icon {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}"><i class="fa-solid fa-house icon"></i>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link side-icon {{ request()->get('page') === 'bundle' ? 'active' : '' }}" href="{{ route('bundle.index', ['page' => 'bundle']) }}"><iconify-icon icon="game-icons:grain-bundle" class="icon"></iconify-icon>Bundle</a>
            </li>
            <li class="nav-item">
                <a class="nav-link side-icon {{ request()->get('page') === 'account' ? 'active' : '' }}" href="{{ route('accountpage', ['page' => 'account']) }}"><i class="fa-solid fa-user icon"></i>Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link side-icon {{ request()->get('page') === 'create' ? 'active' : '' }}" style="display: flex;" href="{{ route('recipe.index', ['page' => 'create']) }}"><div class="icon"><img src="{{asset('asset/Create.png')}}" alt="" srcset="" style="{{ request()->get('page') === 'create' ? 'mix-blend-mode: luminosity;filter: brightness(0) invert(1);' : '' }}" class="icon-create"></div>Create</a>
            </li>
            <li class="nav-item">
                <hr style="border: 1px solid #617A55; opacity: 100%;">
            </li>
            <li class="nav-item"> 
                <a class="nav-link side-icon" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><iconify-icon icon="mdi:logout" class="icon"></iconify-icon>Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        
    </div><img src="{{asset('asset/menu.png')}}" alt="" srcset="" style="width: auto; height: 200px;">
</div>      