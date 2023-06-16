@extends('template.main')

@section('title')
    Bundle Page
@endsection

@section('content')
<div class="bundle-head">
  <div class="row align-items-center main-bundle">
    <div class="col">
        <div class="p-2 flex-fill" >
            <div class="d-flex align-items-center mainlogobundle">
                <iconify-icon icon="game-icons:grain-bundle" class="logobundle"></iconify-icon>
                <span class="titlebundle">My Bundle</span>
            </div>
        </div>
    </div>
    <div class="col">
        <a href="{{ route('mypageindex') }}" class="float-end viewAllButton">View all</a>
    </div>
</div>
<div class="content">
    <div class="row justify-content-center" id="cardContainer">
    @foreach ($Mybundle as $m)
        <div class="col-auto card-div justify-content-start" id="card" style="text-transform: capitalize">
            <div class="card" style="width: 18rem;">
                <div class="card-img">
                    <img src="{{ asset('asset/image 10.png') }}"  class="card-img-top">
                    <iconify-icon icon="game-icons:grain-bundle" class="search-icon"></iconify-icon>
                </div>
                <div class="card-body">
                    <h5 class="card-title " style="display: flex;">
                        <img src="{{ asset('asset/user.png') }}" class="menu-username" alt="" srcset="">
                        <div class="row align-items-center">
                            <div class="menu-title">{{ mb_convert_case($m->bundle_name, MB_CASE_TITLE, "UTF-8") }}</div>
                            <div class="name-menu-title">{{ $m->User->user_name }} - {{ Carbon\Carbon::parse($m->created_at)->format('d-m-Y') }}</div>
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
                                    <form action="{{ route('savebookmark') }}" method="post" >
                                    @csrf
                                        <input type="hidden" name="bundle_id" value="{{ $m->bundle_id }}">
                                        <button type="submit" style="border-bottom:1px solid #EAEAEA;" class="dropdown-item d-flex">
                                            <iconify-icon icon="iconamoon:bookmark-light"
                                                style="font-size:25px"></iconify-icon>
                                            <div class="text-center align-self-center">Bookmark</div>
                                        </button>
                                    </form>
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
                    <p class="card-text">
                        <div class="row">
                            <div class="col">
                                <span>BUNDLE</span> 
                            </div>
                            <div class="col">
                                <form action="" method="post">
                                @csrf
                                @if ($m->Bundle_privacy == 'on')
                                    <input id="text" name="test" value="{{ $m->mybundle_id }}" type="hidden">
                                    <label class="switch float-end">
                                        <input type="hidden" name="test" value="{{ $m->bundle_id }}" id="">
                                        <input id="checkbox" name="onoff" value="{{ $m->mybundle_id }}" type="checkbox" checked>
                                        <span class="slider round"></span>
                                    </label>
                                @else
                                    <label class="switch float-end">
                                        <input type="hidden" name="test" value="{{ $m->bundle_id }}" id="">
                                        <input id="checkbox" name="onoff" value="{{ $m->mybundle_id }}" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                @endif
                                </form>
                            </div>
                        </div>
                    </p> 
                </div>
            </div>
        </div> 
    @endforeach
    </div>
</div>
<hr style="width:100%">
<div class="bundle-head">
  <div class="row align-items-center main-bundle">
    <div class="col">
        <div class="p-2 flex-fill" >
            <div class="d-flex align-items-center mainlogobundle">
                <iconify-icon icon="material-symbols:bookmark-outline" class="logobundle"></iconify-icon>
                <span class="titlebundle">Bookmark</span>
            </div>
        </div>
    </div>
    <div class="col">
        <a href="{{ route('indexbookmark') }}" class="float-end viewAllButton">View all</a>
    </div>
  </div>
</div>
<div class="content">
    <div class="row justify-content-center" id="cardContainer" style="text-transform: capitalize">
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
                            <div class="menu-title">{{ mb_convert_case($b->Bundle->bundle_name, MB_CASE_TITLE, "UTF-8") }}</div>
                            <div class="name-menu-title">{{ $b->Bundle->BundleList->MyBundle->User->user_name }} - {{ Carbon\Carbon::parse($b->created_at)->format('d-m-Y') }}</div>
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
                                <!-- <li>
                                    <a class="dropdown-item d-flex" href="#" style="border-bottom:1px solid #EAEAEA;">
                                        <iconify-icon icon="iconamoon:bookmark-light" style="font-size:25px"></iconify-icon> 
                                        <div class="text-center align-self-center">Bookmark</div> 
                                    </a>
                                </li> -->
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
<script>
    // Get all the checkboxes
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            const form = this.closest('form');
            if (this.checked) {
                form.setAttribute('action', '/onbundle');
                form.submit();
            } else {
                form.setAttribute('action', '/offbundle');
                form.submit();
            }
        });
    });
</script>
<script>
document.getElementById('checkbox1').addEventListener('change', (e) => {
  this.checkboxValue = e.target.checked ? 'on' : 'off';
  console.log(this.checkboxValue)
})
</script>

@endsection