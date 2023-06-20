<!-- <div class="container-fluid head"> -->
    <div class="row align-items-center">
        <div class="col-auto">
            <button class="navbar-toggler menu-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars "></i>
            </button>
        </div>
        <div class="col logo-div">
            <div class="align-items-center" style="display: flex;">
                <a class="" href="/" style="color: black !important;">
                    <div style="witdh:fit-content;display: flex">
                        <img src="{{asset('asset/Food Library Logo 1.png')}}" class="logo" alt="" srcset="">
                        <span class="title-head">Food Library</span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col search">
            <form class="d-flex" role="search" action="{{ route('searchindex') }}" method="POST">
                @csrf
                <input class="form-control" style="border-radius: 50px 0px 0px 50px; width: 100%;" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn icon-search" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="col-auto search">
            <a href="#" ><i class="fa-solid fa-sliders icon-filter" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></i></a>
        </div>
        <div class="col">
            <div class="float-end align-items-center">
                <span class="title-username">{{ Auth::user()->user_name }}</span>
                <img src="{{asset('user/'.Auth::user()->user_profile)}}" class="username" alt="" srcset="">
            </div>
        </div>
    </div>


    <style>
        #offcanvasRight{
            background-color: #F7E1AE;
        }
        .sidetitle{
            font-size: 30px;
            color:black;
            font-weight: bold;
        }
        .iconside{
            font-size:40px;
        }

        .checkbox-container {
            display: flex;
            position: relative;
            background-color: #617A55;
            align-items: center;
            text-align: center;
            width: fit-content;
            padding:5px;
            border-radius:50px;
            color:white;
            font-size:17px;
        }

        .checkbox-container.checked {
            background-color: white;
            padding: 5px;
            color:black;
        }

        input[type="checkbox"].cekcek {
            display: none;
        }

        input[type="checkbox"]:checked + .checkimgcontainer .checkimage {
            padding: 10px;
            width: 35px;
            height: 35px;
            border-radius: 50px;
            background-color: #617A55;
            content: url('asset/ceklist.png');
        }

        .checkimage {
            cursor: pointer;
            width: 35px;
            height: 35px;
            border-radius: 50px;
        }
        .cek{
            margin-right:5px;
        }
        
        .scrollable-x {
            overflow-x: auto;
            white-space: nowrap;
        }
        
    </style>
    <style>
        .scrollable-x::-webkit-scrollbar {
            width: 6px;
            height: 6px;
            background-color: #F5F5F5;
        }

        .scrollable-x::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 3px;
        }

        .scrollable-x::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .scrollable-x::-webkit-scrollbar-track {
            background-color: #F5F5F5;
        }
    </style>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-body">
            <div class="container">
                <form action="{{ route('filter') }}" method="post">
                @csrf
                    <!-- category -->
                    <div class="row pb-3" style="border-bottom:3px solid #617A55;">
                        <div class="col">
                            <div class="row align-items-center ">
                                <div class="col-2">
                                    <iconify-icon icon="material-symbols:category" class="iconside"></iconify-icon>
                                </div>
                                <div class="col-10">
                                    <span class="sidetitle">
                                        RECIPE CATEGORY
                                    </span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col scrollable-x pb-3">
                                    <div class="row" style="width:60vw">
                                        <div class="col">
                                            <label for="checkbox1" class="checkbox-container">
                                                <input type="checkbox" id="checkbox1" name="category[]" class="cekcek" value="Vegetarianism">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178.png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Vegetarian</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox2" class="checkbox-container">
                                                <input type="checkbox" id="checkbox2" name="category[]" class="cekcek" value="Veganism">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178(8).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Vegan</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox3" class="checkbox-container">
                                                <input type="checkbox" id="checkbox3" name="category[]" class="cekcek" value="Halal">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178.png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Halal</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox4" class="checkbox-container">
                                                <input type="checkbox" id="checkbox4" name="category[]" class="cekcek" value="No dairy">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178 (1).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">No dairy</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox5" class="checkbox-container">
                                                <input type="checkbox" id="checkbox5" name="category[]" class="cekcek" value="Lactose intolerance">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178 (2).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Lactose intolerant</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row mt-2" style="width:50vw">
                                        <div class="col">
                                            <label for="checkbox6" class="checkbox-container">
                                                <input type="checkbox" id="checkbox6" name="category[]" class="cekcek" value="Diabetes">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178 (8).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Diabetes</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox7" class="checkbox-container">
                                                <input type="checkbox" id="checkbox7" name="category[]" class="cekcek" value="Low carb">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178 (7).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Low carb</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox8" class="checkbox-container">
                                                <input type="checkbox" id="checkbox8" name="category[]" class="cekcek" value="Gluten sensitivity">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178 (4).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Glueten free</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox9" class="checkbox-container">
                                                <input type="checkbox" id="checkbox9" name="category[]" class="cekcek" value="Keto">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/Rectangle 178 (3).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Keto</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ingredients -->
                    <div class="row pb-3 mt-5" style="border-bottom:3px solid #617A55;">
                        <div class="col">
                            <div class="row align-items-center ">
                                <div class="col-2">
                                    <iconify-icon icon="fluent:food-grains-20-filled" class="iconside"></iconify-icon>
                                </div>
                                <div class="col-10">
                                    <span class="sidetitle">
                                        INGREDIENTS
                                    </span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col scrollable-x pb-3">
                                    <div class="row" style="width:40vw">
                                        <div class="col">
                                            <label for="checkbox10" class="checkbox-container">
                                                <input type="checkbox" id="checkbox10" name="ingredients[]" class="cekcek" value="chicken">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/New Folder/Rectangle 178.png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Chicken</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox11" class="checkbox-container">
                                                <input type="checkbox" id="checkbox11" name="ingredients[]" class="cekcek" value="eggplant">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/image 14.png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Eggplant</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox12" class="checkbox-container">
                                                <input type="checkbox" id="checkbox12" name="ingredients[]" class="cekcek" value="milk">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/image 15.png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Milk</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox13" class="checkbox-container">
                                                <input type="checkbox" id="checkbox13" name="ingredients[]" class="cekcek" value="rice">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/image 14 (1).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Rice</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- equipment -->
                    <div class="row pb-3 mt-5" style="border-bottom:3px solid #617A55;">
                        <div class="col">
                            <div class="row align-items-center ">
                                <div class="col-2">
                                    <iconify-icon icon="ph:knife-bold" class="iconside"></iconify-icon>
                                </div>
                                <div class="col-10">
                                    <span class="sidetitle">
                                        EQUIPMENT
                                    </span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col scrollable-x pb-3">
                                    <div class="row" style="width:70vw">
                                        <div class="col">
                                            <label for="checkbox14" class="checkbox-container">
                                                <input type="checkbox" id="checkbox14" name="equipment[]" class="cekcek" value="microwave">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/New Folder/Rectangle 178 (1).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Microwave</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox15" class="checkbox-container">
                                                <input type="checkbox" id="checkbox15" name="equipment[]" class="cekcek" value="deeo fryer">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/New Folder/Rectangle 178 (2).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Deep fryer</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox15" class="checkbox-container">
                                                <input type="checkbox" id="checkbox15" name="equipment[]" class="cekcek" value="mixer">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/image 18.png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Mixer</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox16" class="checkbox-container">
                                                <input type="checkbox" id="checkbox16" name="equipment[]" class="cekcek" value="knife">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/image 19.png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Knife</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox17" class="checkbox-container">
                                                <input type="checkbox" id="checkbox17" name="equipment[]" class="cekcek" value="rice cooker">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/image 20 (1).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Rice cooker</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox18" class="checkbox-container">
                                                <input type="checkbox" id="checkbox18" name="equipment[]" class="cekcek" value="grater">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/New Folder/Rectangle 178 (3).png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Grater</span>
                                            </label>
                                        </div>
                                        <div class="col">
                                            <label for="checkbox19" class="checkbox-container">
                                                <input type="checkbox" id="checkbox19" name="equipment[]" class="cekcek" value="grill">
                                                <div class="checkimgcontainer me-2">
                                                    <img src="{{ asset('asset/image 20.png') }}" class="checkimage" alt="Checkbox Image">
                                                </div>
                                                <span class="cek">Grill</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <button type="submit" class="btn" style="background-color:#617A55;color:white;font-size:20px;border-radius:50px">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const checkboxContainers = document.querySelectorAll('.checkbox-container');
        const checkImages = document.querySelectorAll('.checkimage');

        checkboxes.forEach(function(checkbox, index) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    checkboxContainers[index].classList.add('checked');
                    checkImages[index].classList.add('checked');
                } else {
                    checkboxContainers[index].classList.remove('checked');
                    checkImages[index].classList.remove('checked');
                }
            });
        });
    });
</script>
<!-- </div> -->