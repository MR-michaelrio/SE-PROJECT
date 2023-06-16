@extends('template.main')

@section('title')
    Bundle Bookmark
@endsection

@section('content')
<div class="text-center bundle-head">
  <div class="row align-items-center main-bundle">
    <div class="col">
        <div class="p-2 flex-fill" >
            <div class="d-flex align-items-center mainlogobundle">
                <iconify-icon icon="material-symbols:bookmark-outline" class="logobundle"></iconify-icon>
                <span class="titlebundle">Bookmark</span>
            </div>
        </div>
    </div>
    <div id="formContainer" class="col formContainer">
        <form action="{{ route('searchbookmarkpost') }}" class="formbundle d-flex align-self-end" method="post">
            @csrf
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            <input type="text" class="input" name="search" placeholder="Search my bundle">
        </form>
    </div>
  </div>
</div>
<div class="content">
    <div class="row justify-content-center" id="cardContainer">
    @foreach ($bookmark as $b)
        <div class="col-auto card-div justify-content-start" id="card">
            <div class="card" style="width: 18rem;">
                <div class="card-img">
                    <img src="../../asset/image 10.png"  class="card-img-top">
                    <iconify-icon icon="game-icons:grain-bundle" class="search-icon"></iconify-icon>
                </div>
                <div class="card-body">
                    <h5 class="card-title " style="display: flex;">
                        <img src="../../asset/user.png" class="menu-username" alt="" srcset="">
                        <div class="row align-items-center">
                            <div class="menu-title">{{ $b->Bundle->bundle_name }}</div>
                            <div class="name-menu-title">{{ $b->Bundle->BundleList->MyBundle->User->user_name }} - {{ Carbon\Carbon::parse($b->Bundle->bundle_publishdate)->format('m-d-Y') }}</div>
                        </div>
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-menu-options" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item d-flex" href="#" style="border-bottom:1px solid #EAEAEA;">
                                        <iconify-icon icon="fluent:copy-16-regular" style="font-size:25px"></iconify-icon> 
                                        <div class="text-center align-self-center">Duplicate</div> 
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex" href="#" style="border-bottom:1px solid #EAEAEA;">
                                        <iconify-icon icon="iconamoon:bookmark-light" style="font-size:25px"></iconify-icon> 
                                        <div class="text-center align-self-center">Bookmark</div> 
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex" href="#">
                                        <iconify-icon icon="majesticons:share-line" style="font-size:25px"></iconify-icon> 
                                        <div class="text-center align-self-center">Share</div> 
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </h5>
                    <p class="card-text">BUNDLE</p> 
                </div>
            </div>
        </div> 
    @endforeach
    </div>
</div>
@endsection