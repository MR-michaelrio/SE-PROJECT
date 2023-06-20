@extends('template.main')

@section('title')
    Food Bundle in Recipe
@endsection

@section('content')
<style>
    body {
        /* overflow: hidden; */
    }
    .scrollable-content::-webkit-scrollbar, .scrollable-content1::-webkit-scrollbar {
        display: none;
    }

    .scrollable-content {
        height: 88.8vh;
        overflow-y: scroll;
    }

    .scrollable-content1 {
        height: 70vh;
        overflow-y: scroll;
        border: 1px solid #617A55;
        border-radius:10px;
    }
    

    .button-container {
        display: flex;
        justify-content: flex-end;
    }

    .foto-resep {
        width: 443.99px;
        height: 300px;
        margin-top: 20px;
    }

    h1 {
        font-size: 2vw;
        font-weight: bold;
    }

    h3{
        text-align:center;
        color:white;
        text-transform: uppercase;
        background-color: #617A55;
        padding: 10px 0px;
    }

    @media screen and (max-width:765px) {
        body {
            overflow: scroll;
        }
    }

    @media screen and (max-width:900px) {
        .title-menu {
            font-size: 15px;
        }

        ol {
            font-size: 20px;
        }
    }

    @media screen and (max-width:500px) {
        .col-8 {
            width: 100%;
        }

        .col-4 {
            display: none;
        }

        .foto-resep {
            width: 243.99px;
            height: 130px;
        }

        h1 {
            font-size: 15px;
        }

        span {
            font-size: 17px;
        }

        .iconresep {
            font-size: 20px;
        }

        ol {
            font-size: 13px;
        }
    }

</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="scrollable-content" >
                <div class="d-flex flex-column" style="margin-bottom:10px">
                    <div class="p-2">
                        <div class="card"
                            style="width: 100%;background-color: transparent !important;border:0px !important;">
                            <img src="@foreach($bundle as $b){{ asset('images/'.$b->recipe_publish->recipe->recipe_picture) }}@endforeach" class="foto-resep">
                            <div class="mt-3 mb-3">
                                <span>
                                    <h1 id="recipe-heading">@foreach($bundle as $b) {{$b->recipe_publish->recipe->recipe_name}} @endforeach</h1>
                                </span>
                                <hr class="border border-1 opacity-100 m-0 p-0"
                                    style="border-color:#283123 !important;">
                                <span style="text-transform:capitalize">@foreach($bundle as $b) {{$b->recipe_publish->user->user_name}} - {{ Carbon\Carbon::parse($b->recipe_publish->publish_date)->format('d M Y') }} @endforeach</span>
                            </div>
                            <div class="button-container">
                                <button type="submit" class="btn" onclick="saveRecipe()"
                                    style="background-color:#D0D7CC;border-radius:30px;color:black;"><img
                                        src="{{asset('asset/game-icons_grain-bundle.png')}}"
                                        style="width:30%;margin-right:10px" alt="" srcset="">Add</button>
                                <!-- <button type="submit" class="btn" onclick="publishRecipe()"
                                    style="background-color:#D0D7CC;border-radius:30px;color:black;margin-left:5px">
                                    <iconify-icon icon="majesticons:share-line"></iconify-icon>Share
                                </button> -->
                                <!-- <button type="button" class="btn" onclick="discardRecipe()"
                                    style="background-color:#D0D7CC;border-radius:30px;color:black;margin-left:5px">
                                    <iconify-icon icon="material-symbols:delete-outline"></iconify-icon>Discard
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <div class="mainresep" style="background-color:#F0F2EE; border-radius:7px">
                        <div class="p-2">
                            <ul class="list-group">
                                <li class="list-group-item d-flex align-items-center"
                                    style="background-color:transparent; border:0px; border-bottom:2px solid #D9D9D9;"
                                    aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="fluent:food-grains-20-filled" class="me-3 iconresep">
                                        </iconify-icon>
                                        <span>Ingredients</span>
                                    </label>
                                </li>
                                <li class="list-group-item d-flex list-resep"
                                    style="font-size:1vw; border:0px;background-color:transparent;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <ol style="font-weight:bold;">
                                            @foreach($bundle as $n)
                                            @php
                                            $ingredients = explode(",", $b->recipe_publish->recipe->recipe_ingredients);
                                            @endphp

                                            @foreach($ingredients as $ingredient)
                                            <li>{{ trim($ingredient) }}</li>
                                            @endforeach
                                            @endforeach
                                        </ol>
                                    </div>
                                </li>
                            </ul>
                            <hr style="border:3px solid #D9D9D9; opacity:100%">
                        </div>
                        <div class="p-2">
                            <ul class="list-group">
                                <li class="list-group-item d-flex align-items-center"
                                    style="background-color:transparent;  border:0px; border-bottom:2px solid #D9D9D9;"
                                    aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="ph:knife-fill" class="me-3 iconresep"
                                            style="transform: rotateY(180deg);"></iconify-icon>
                                        <span>Equipment</span>
                                    </label>
                                </li>
                                <li class="list-group-item d-flex list-resep"
                                    style="font-size:1vw; border:0px;background-color:transparent;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <ol style="font-weight:bold;">
                                            @foreach($bundle as $b)
                                            @php
                                            $equipments = explode(",", $b->recipe_publish->recipe->recipe_equipment);
                                            @endphp

                                            @foreach($equipments as $equipment)
                                            <li>{{ trim($equipment) }}</li>
                                            @endforeach
                                            @endforeach
                                        </ol>
                                    </div>
                                </li>
                            </ul>
                            <hr style="border:3px solid #D9D9D9; opacity:100%">
                        </div>
                        <div class="p-2">
                            <ul class="list-group">
                                <li class="list-group-item d-flex align-items-center"
                                    style="background-color:transparent;  border:0px; border-bottom:2px solid #D9D9D9;"
                                    aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="ion:footsteps-sharp" class="me-3 iconresep"></iconify-icon>
                                        <span>Steps</span>
                                    </label>
                                </li>
                                <li class="list-group-item d-flex list-resep"
                                    style="font-size:1vw; border:0px;background-color:transparent;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <ol style="font-weight:bold;">
                                            @foreach($bundle as $b)
                                            @php
                                            $steps = explode(",", $b->recipe_publish->recipe->recipe_steps);
                                            @endphp

                                            @foreach($steps as $step)
                                            <li>{{ trim($step) }}</li>
                                            @endforeach
                                            @endforeach
                                        </ol>
                                    </div>
                                </li>
                            </ul>
                            <hr style="border:3px solid #D9D9D9; opacity:100%">
                        </div>
                        <div class="p-2">
                            <ul class="list-group">
                                <li class="list-group-item d-flex align-items-center"
                                    style="background-color:transparent;  border:0px; border-bottom:2px solid #D9D9D9;"
                                    aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="mdi:lightbulb-on-outline" class="me-3 iconresep"></iconify-icon>
                                        <span>Tips</span>
                                    </label>
                                </li>
                                <li class="list-group-item d-flex list-resep"
                                    style="font-size:1vw; border:0px;background-color:transparent;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <ol style="font-weight:bold;">
                                            @foreach($bundle as $b)
                                            @php
                                            $tips = explode(",", $b->recipe_publish->recipe->recipe_tips);
                                            @endphp

                                            @foreach($tips as $tip)
                                            <li>{{ trim($tip) }}</li>
                                            @endforeach
                                            @endforeach
                                        </ol>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <div class="scrollable-content1">
                        <h3>@foreach($bundle as $b) {{ $b->bundle->bundle_name }} @endforeach</h3>
                        @foreach($bundlelist as $b)
                        <a href="{{ route('bundlerecipe', ['id' => $b->bundle_id, 'bundlelistid' => $b->bundlelist_id, 'user' => $b->mybundle->user_id]) }}" style="text-decoration: none; color: inherit; display: flex;">
                            <div class="card m-3" style="width: 100%;">
                                <div class="row g-0">
                                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('images/'.$b->recipe_publish->recipe->recipe_picture) }}"
                                            class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title title-menu">{{ Str::limit($b->recipe_publish->recipe->recipe_name, 10) }}</h5>
                                            <p class="card-text">{{ $b->recipe_publish->user->user_name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="scrollable-content">
                        @foreach($recipe as $rp)
                        <a href="{{ route('foodrecipe', ['id' => $rp->recipe_id]) }}">
                        <div class="card mb-3 mt-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4 d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('images/'.$rp->recipe->recipe_picture) }}"
                                        class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title title-menu">{{ Str::limit($rp->recipe->recipe_name, 10) }}</h5>
                                        <p class="card-text">{{ $rp->user->user_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
