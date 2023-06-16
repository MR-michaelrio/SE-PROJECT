@extends('template.main')

@section('title')
    Create Recipe
@endsection

@section('content')
<style>
    body {
        overflow: hidden;
    }
    .scrollable-content::-webkit-scrollbar {
        display: none;
    }
  
    .scrollable-content {
        height: 88.8vh;
        overflow-y: scroll;
    }
    @media screen and (max-width:765px) {
        body {
            overflow: scroll;
        }
    }
</style>
<script>
    function previewImage(event) {
        var reader = new FileReader();
        const preview = document.getElementById('preview');
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
            preview.style.display = 'flex';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<div class="container-fluid">
    <form action="" id="recipe-form" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="scrollable-content">
                    <div class="d-flex flex-column">
                        <div class="p-2">
                            <div class="mb-3">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex align-items-center" style="background-color:transparent !important;border-width:0;" aria-current="true">
                                        <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                            <iconify-icon icon="icon-park-solid:chef-hat" class="me-3"></iconify-icon> 
                                            <span>RECIPE NAME</span> 
                                        </label>
                                    </li>
                                </ul>
                                <input type="text" class="form-control" name="recipe_name" oninput="updateHeading(this.value)" style="background-color:#F0F2EE; border:1px solid #A6B7BE;" placeholder="Insert Recipe Name">
                            </div>                    
                        </div>
                        <div class="p-2">
                            <div class="mb-3">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex align-items-center" style="background-color:transparent !important;border-width:0;" aria-current="true">
                                        <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                            <iconify-icon icon="material-symbols:category" class="me-3"></iconify-icon> 
                                            <span>RECIPE CATEGORY</span> 
                                        </label>
                                    </li>
                                </ul>
                                <select class="form-select" name="category_id" style="background-color:#F0F2EE; border:1px solid #A6B7BE;" aria-label="Default select example">
                                    <option selected disabled>Open this select menu</option>
                                    @foreach($category as $c)
                                        <option value="{{ $c->category_id }}">{{ $c->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>  
                        </div>
                        <div class="p-2">
                            <ul class="list-group" style="border:1px solid #A6B7BE;">
                                <li class="list-group-item d-flex align-items-center" style="background-color:#F0F2EE;" aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="fluent:food-grains-20-filled" class="me-3"></iconify-icon> 
                                        <span>Ingredients</span> 
                                    </label>
                                    <button type="button" name="add" id="add1" class="btn btn-success ms-2">+</button>
                                </li>
                                <li class="list-group-item d-flex" style="font-size:1vw; border:0px;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <table class="table table-borderless" id="dynamic_field1">
                                            <tbody id="ingredientsTableBody">
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <input type="text" name="recipe_ingredients[]" placeholder="Ingredients" style="border:0px; border-bottom:1px dashed #A6B7BE; width:100%;outline: none;" oninput="updateIngredientsList()" />
                                                    </td>
                                                    <td>
                                                        <button type="button" name="remove" class="btn btn-danger btn_remove1" style="visibility:hidden">X</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="p-2">
                            <ul class="list-group" style="border:1px solid #A6B7BE;">
                                <li class="list-group-item d-flex align-items-center" style="background-color:#F0F2EE;" aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="ph:knife-fill" class="me-3" style="transform: rotateY(180deg);"></iconify-icon> 
                                        <span>EQUIPMENT</span> 
                                    </label>
                                    <button type="button" name="add" id="add2" class="btn btn-success ms-2">+</button>
                                </li>
                                <li class="list-group-item d-flex" style="font-size:1vw; border:0px;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <table class="table table-borderless" id="dynamic_field2">
                                            <tbody id="EquipmentTableBody">
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <input type="text" name="recipe_equipment[]" placeholder="Equipment" style="border:0px; border-bottom:1px dashed #A6B7BE; width:100%;outline: none;" oninput="updateequipmentList()" />
                                                    </td>
                                                    <td>
                                                        <button type="button" name="remove" class="btn btn-danger btn_remove2" style="visibility:hidden">X</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="p-2">
                            <ul class="list-group" style="border:1px solid #A6B7BE;">
                                <li class="list-group-item d-flex align-items-center" style="background-color:#F0F2EE;" aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="ion:footsteps-sharp" class="me-3"></iconify-icon> 
                                        <span>STEPS</span> 
                                    </label>
                                    <button type="button" name="add" id="add3" class="btn btn-success ms-2">+</button>
                                </li>
                                <li class="list-group-item d-flex" style="font-size:1vw; border:0px;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <table class="table table-borderless" id="dynamic_field3">
                                            <tbody id="StepsTableBody">
                                                <tr>
                                                    <td class="d-flex align-items-center">
                                                        <input type="text" name="recipe_steps[]" placeholder="Steps" style="border:0px; border-bottom:1px dashed #A6B7BE; width:100%;outline: none;" oninput="updatestepsList()" />
                                                    </td>
                                                    <td>
                                                        <button type="button" name="remove" class="btn btn-danger btn_remove3" style="visibility:hidden">X</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="p-2">
                            <ul class="list-group" style="border:1px solid #A6B7BE;">
                                <li class="list-group-item d-flex align-items-center" style="background-color:#F0F2EE;" aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="mdi:lightbulb-on-outline" class="me-3"></iconify-icon> 
                                        <span>TIPS</span> 
                                    </label>
                                    &nbsp;*Optional
                                    <button type="button" name="add" id="add4" class="btn btn-success ms-2">+</button>
                                </li>
                                <li class="list-group-item d-flex" style="font-size:1vw; border:0px;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <table class="table table-borderless" id="dynamic_field4">
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <input type="text" name="recipe_tips[]" placeholder="Tips" style="border:0px; border-bottom:1px dashed #A6B7BE; width:100%;outline: none;" />
                                                </td>
                                                <td><button type="button" name="remove" class="btn btn-danger btn_remove4" style="visibility:hidden">X</button></td>
                                            </tr>
                                        </table>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="scrollable-content">
                    <div class="d-flex flex-column">
                        <div class="p-2">
                            <div class="card" style="width: 100%;background-color: transparent !important;border:0px !important;">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <span style="font-size:1.5vw; font-weight:500;">PREVIEW</span>
                                    </div>
                                    <div style="margin-left: auto;">
                                        <button type="submit" class="btn" onclick="saveRecipe()" style="background-color:#75CC75;color:white">Save</button>
                                        <button type="submit" class="btn" onclick="publishRecipe()" style="background-color:#75CC75;color:white">Publish</button>
                                        <button type="button" class="btn" onclick="discardRecipe()" style="background-color:#CC7575;color:white">Discard</button>
                                    </div>
                                </div>   
                                <div>
                                    <span style="font-size:1.5vw; font-weight:500;">FOOD IMAGE</span>
                                </div> 
                                <input type="file" name="recipe_picture" id="image" class="form-control"  accept=".jpg, .jpeg, .png" style="background-color:#F0F2EE; border:1px solid #A6B7BE;" accept="image/*" onchange="previewImage(event)">
                                <img id="preview" src="" style="display:none; width:100%; height:263px;margin-top:20px;">
                                <div class="mt-3 mb-3">
                                    <span><h1 style="font-size:2vw; font-weight:bold" id="recipe-heading">-</h1></span>
                                    <hr class="border border-1 opacity-100 m-0 p-0" style="border-color:#283123 !important;">
                                    <span style="text-transform:capitalize">{{ Auth::user()->user_name }} - {{ date('d M Y') }}</span>
                                </div>
                            </div>     
                        </div>
                        <div class="p-2">
                            <ul class="list-group" style="border:1px solid #A6B7BE;">
                                <li class="list-group-item d-flex align-items-center" style="background-color:#F0F2EE;" aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="fluent:food-grains-20-filled" class="me-3"></iconify-icon> 
                                        <span>Ingredients</span> 
                                    </label>
                                </li>
                                <li class="list-group-item d-flex" style="font-size:1vw; border:0px;background-color:#F0F2EE;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <ol id="ingredientsList"></ol>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="p-2">
                            <ul class="list-group" style="border:1px solid #A6B7BE;">
                                <li class="list-group-item d-flex align-items-center" style="background-color:#F0F2EE;" aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="ph:knife-fill" class="me-3" style="transform: rotateY(180deg);"></iconify-icon> 
                                        <span>Equipment</span> 
                                    </label>
                                </li>
                                <li class="list-group-item d-flex" style="font-size:1vw; border:0px;background-color:#F0F2EE;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <ol id="equipmentList"></ol>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                        <div class="p-2">
                            <ul class="list-group" style="border:1px solid #A6B7BE;">
                                <li class="list-group-item d-flex align-items-center" style="background-color:#F0F2EE;" aria-current="true">
                                    <label class="d-flex align-items-center" style="font-size:1.5vw; font-weight:500;">
                                        <iconify-icon icon="ion:footsteps-sharp" class="me-3"></iconify-icon> 
                                        <span>Steps</span> 
                                    </label>
                                </li>
                                <li class="list-group-item d-flex" style="font-size:1vw; border:0px;background-color:#F0F2EE;">
                                    <div class="m-0 p-0" style="width:100%">
                                        <ol id="stepsList"></ol>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function saveRecipe() {
        document.getElementById("recipe-form").action = "saverecipe";
    }
    
    function publishRecipe() {
        document.getElementById("recipe-form").action = "publishrecipe";
    }
    
    function discardRecipe() {
        window.location.href = "index";
    }
</script>
<script>
    function updateHeading(value) {
        document.getElementById("recipe-heading").innerText = value;
    }
</script>
<script>
  $(document).ready(function() {
    var i = 1;

    $('#add1').click(function() {
        i++;
        var newRow = '<tr id="row' + i + '"><td class="d-flex align-items-center"><input type="text" name="recipe_ingredients[]" placeholder="Ingredients" style="border:0px; border-bottom:1px dashed #A6B7BE; width:100%;outline: none;" oninput="updateIngredientsList()" /></td><td><button type="button" class="btn btn-danger btn_remove1">X</button></td></tr>';
        $('#ingredientsTableBody').append(newRow);
        updateIngredientsList();
    });

    $(document).on('click', '.btn_remove1', function() {
        $(this).closest('tr').remove();
        updateIngredientsList();
    });

    function updateIngredientsList() {
        var ingredients = [];
        $('input[name="recipe_ingredients[]"]').each(function() {
            var ingredient = $(this).val();
            if (ingredient.trim() !== '') {
                ingredients.push(ingredient);
            }
        });
        $('#ingredientsList').empty();
        ingredients.forEach(function(ingredient) {
            $('#ingredientsList').append('<li>' + ingredient + '</li>');
        });
    }


    $('#add2').click(function() {
        i++;
        var newRow = '<tr id="row' + i + '"><td class="d-flex align-items-center"><input type="text" name="recipe_equipment[]" placeholder="Equipment" style="border:0px; border-bottom:1px dashed #A6B7BE; width:100%;outline: none;" oninput="updateequipmentList()" /></td><td><button type="button" class="btn btn-danger btn_remove2">X</button></td></tr>';
        $('#EquipmentTableBody').append(newRow);
        updateequipmentList();
    });

    $(document).on('click', '.btn_remove2', function() {
        $(this).closest('tr').remove();
        updateequipmentList();
    });

    function updateequipmentList() {
        var equipment = [];
        $('input[name="recipe_equipment[]"]').each(function() {
            var ingredient = $(this).val();
            if (ingredient.trim() !== '') {
                equipment.push(ingredient);
            }
        });
        $('#equipmentList').empty();
        equipment.forEach(function(ingredient) {
            $('#equipmentList').append('<li>' + ingredient + '</li>');
        });
    }

    $('#add3').click(function() {
        i++;
        var newRow = '<tr id="row' + i + '"><td class="d-flex align-items-center"><input type="text" name="recipe_steps[]" placeholder="Steps" style="border:0px; border-bottom:1px dashed #A6B7BE; width:100%;outline: none;" oninput="updatestepsList()" /></td><td><button type="button" class="btn btn-danger btn_remove3">X</button></td></tr>';
        $('#StepsTableBody').append(newRow);
        updatestepsList();
    });

    $(document).on('click', '.btn_remove3', function() {
        $(this).closest('tr').remove();
        updatestepsList();
    });

    function updatestepsList() {
        var steps = [];
        $('input[name="recipe_steps[]"]').each(function() {
            var ingredient = $(this).val();
            if (ingredient.trim() !== '') {
                steps.push(ingredient);
            }
        });
        $('#stepsList').empty();
        steps.forEach(function(ingredient) {
            $('#stepsList').append('<li>' + ingredient + '</li>');
        });
    }

    $('#add4').click(function() {
      i++;
      $('#dynamic_field4').append('<tr id="row' + i + '"><td class="d-flex align-items-center"><input type="text" name="recipe_tips[]" placeholder="Tips" style="border:0px; border-bottom:1px dashed #A6B7BE; width:100%;outline: none;" /></td><td><button type="button" class="btn btn-danger btn_remove3">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove4', function() {
      $(this).closest('tr').remove();

      // Update numbering
      updateNumbering('#dynamic_field4', '.btn_remove4');
    });

  });
</script>
@endsection