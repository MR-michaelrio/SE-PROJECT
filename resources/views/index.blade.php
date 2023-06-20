@extends('template.main')

@section('title')
Home Page
@endsection
@php
use Illuminate\Support\Str;
@endphp
@section('content')
<div class="content">
    <div class="row justify-content-center" id="cardContainer">
        @foreach ($shuffled as $item)
        @if ($item instanceof App\Models\recipe_publish)
        <div class="col-auto card-div justify-content-start" id="card" style="text-transform: capitalize;">
            <div class="card" style="width: 18rem;">
                <a href="{{ route('foodrecipe', ['id' => $item->recipe_id]) }}"
                    style="text-decoration: none;color: inherit;cursor: pointer;display:flex;">
                    <img src="{{ asset('images/'.$item->Recipe->recipe_picture) }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title" style="display: flex;">
                            <div class="">
                                <img src="{{ asset('user/'.$item->User->user_profile) }}" class="menu-username" alt="" srcset="">
                            </div>
                            <div class="row align-items-center">
                                <div class="menu-title">
                                    {{ ucfirst(strtolower(Str::limit($item->Recipe->recipe_name, 15, '...'))) }}</div>
                                <div class="name-menu-title">{{ $item->User->user_name }} -
                                    {{ Carbon\Carbon::parse($item->publish_date)->format('d-m-Y') }}</div>
                            </div>
                </a>
                <div class="btn-group dropstart">
                    <button type="button" class="btn btn-menu-options" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" onclick="updatePublishId({{ $item->publish_id }})">
                                <img src="{{ asset('asset/game-icons_grain-bundle.png') }}" alt="" srcset=""
                                    width="20px"> Add to bundle
                            </button>
                        </li>
                        <li>
                            <hr style="1px solid #EAEAEA">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"><i class="fa-solid fa-share"></i> Share</a>
                        </li>
                    </ul>
                </div>
                </h5>
                <p class="card-text">
                    {{ $item->Recipe->Category->category_name }}
                </p>
            </div>
        </div>
    </div>
    @elseif ($item instanceof App\Models\Bundle_List)
    <div class="col-auto card-div justify-content-start" id="card" style="text-transform: capitalize;">

        <div class="card" style="width: 18rem;">
            <a href="{{ route('bundlerecipe', ['id' => $item->bundle_id, 'bundlelistid' => $item->bundlelist_id, 'user' => $item->mybundle->user_id]) }}"
                style="text-decoration: none; color: inherit; display: flex;">
                <div class="card-img">
                    <img src="{{ asset('asset/image 10.png') }}" class="card-img-top">
                    <iconify-icon icon="game-icons:grain-bundle" class="search-icon"></iconify-icon>
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="display: flex;">
                        <img src="{{ asset('asset/user.png') }}" class="menu-username" alt="" srcset="">
                        <div class="row align-items-center">
                            <div class="menu-title">
                                {{ ucfirst(strtolower(Str::limit($item->Bundle->bundle_name, 15, '...'))) }}
                            </div>
                            <div class="name-menu-title">{{ $item->MyBundle->User->user_name }} -
                                {{ Carbon\Carbon::parse($item->Bundle->bundle_publishdate)->format('m-d-Y') }}</div>
                        </div>
            </a>
            <div class="btn-group dropstart">
                <button type="button" class="btn btn-menu-options" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item d-flex" href="#" style="border-bottom:1px solid #EAEAEA;">
                            <iconify-icon icon="fluent:copy-16-regular" style="font-size:25px">
                            </iconify-icon>
                            <div class="text-center align-self-center">Duplicate</div>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('savebookmark') }}" method="post">
                            @csrf
                            <input type="hidden" name="bundle_id" value="{{ $item->bundle_id }}">
                            <button type="submit" style="border-bottom:1px solid #EAEAEA;" class="dropdown-item d-flex">
                                <iconify-icon icon="iconamoon:bookmark-light" style="font-size:25px">
                                </iconify-icon>
                                <div class="text-center align-self-center">Bookmark</div>
                            </button>
                        </form>
                        <!-- <a class="dropdown-item d-flex" href="#"
                                                style="border-bottom:1px solid #EAEAEA;">
                                                <iconify-icon icon="iconamoon:bookmark-light"
                                                    style="font-size:25px"></iconify-icon>
                                                <div class="text-center align-self-center">Bookmark</div>
                                            </a> -->
                    </li>
                    <li>
                        <a class="dropdown-item d-flex" href="#">
                            <iconify-icon icon="majesticons:share-line" style="font-size:25px">
                            </iconify-icon>
                            <div class="text-center align-self-center">Share</div>
                        </a>
                    </li>
                </ul>
            </div>
            </h5>
            <p class="card-text">
                BUNDLE
            </p>
        </div>
    </div>
    </a>
</div>
@endif
@endforeach
</div>
</div>

<!-- Modal -->
<div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="titlebundle d-flex justify-content-center mb-3 rounded-top"
                style="background:#617A55; color:white; font-weight:500px;">
                <span>ADD TO BUNDLE</span>
            </div>
            <div class="container ps-4 pe-4">
                <div class="row mb-3">
                    <div class="col d-flex justify-content-center align-items-center p-3 rounded-start"
                        style="background:#617A55">
                        <img src="{{ asset('asset/game-icons_grain-bundle-white.png') }}" alt="" srcset="">
                    </div>
                    <div class="col d-flex justify-content-center align-items-center p-3 rounded-end"
                        style="background:rgb(97,122,85,30%)">
                        <span>ADD NEW BUNDLE</span>
                    </div>
                </div>
                <div id="bundleData"></div>

            </div>
        </div>
    </div>
</div>

<script>
    function updatePublishId(publishId) {
        // Send AJAX request to fetch bundle data
        $.ajax({
            url: '/fetch-bundle-data',
            type: 'GET',
            data: {
                publishId: publishId
            },
            success: function (response) {
                // Update the bundleData div with the retrieved data
                $('#bundleData').html(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

</script>



@endsection
