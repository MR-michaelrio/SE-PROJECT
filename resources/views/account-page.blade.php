@extends('template.main')

@section('title')
    Bundle Page
@endsection

@section('content')
<style>
    .accounttitle{
        font-size:30px;
        font-weight:bold;
    }
    .btnedit{
        text-decoration:none;
        color:black;
        background-color:#D0D8CC;
        padding: 5px 20px;
        font-size:20px;
        border-radius:25px;
    }
    .userimgcontainer{
        border-radius:50px;
        width:100px;
        height: 100px;
    }
    .userimg{
        border-radius:50px;
        width:100%;
        height: 100%;
    }
    .textinput{
        text-transform: capitalize;
        font-size:20px;
        color: #686C66;
    }
    .textemail{
        font-size:20px;
        color: #686C66;
    }
    .deleteaccount{
        text-decoration:none;
        color:red;
        background-color:#D0D8CC;
        padding: 10px 20px;
        font-size:23px;
        border-radius:25px;
        width: 100%;
    }
    a{
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="row pb-3">
        <div class="col">
            <span class="accounttitle">PROFILE PHOTO</span>
        </div>
    </div>
    <div class="row pb-3" style="border-bottom:3px solid #617A55">
        <div class="col">
            <div class="userimgcontainer">
                <img src="{{ asset('user/'.Auth::user()->user_profile) }}" alt="" class="userimg" srcset="">
            </div>
        </div>
        <div class="col align-self-end">
            <a class="btnedit float-end" data-bs-toggle="modal" data-bs-target="#foto"><iconify-icon icon="bx:edit" style="margin-right:5px;"></iconify-icon>Edit</a>
        </div>
    </div>

    <div class="row pb-4 pt-3" style="border-bottom:3px solid #617A55">
        <div class="col">
            <div class="row">
                <div class="col">
                    <span class="accounttitle">USERNAME</span>
                </div>
            </div>
            <div class="row align-items-end">
                <div class="col"><span class="textemail">{{ Auth::user()->user_name }}</span></div>
                <div class="col">
                    <a class="btnedit float-end" data-bs-toggle="modal" data-bs-target="#username"><iconify-icon icon="bx:edit" style="margin-right:5px;"></iconify-icon>Edit</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row pb-4 pt-3" style="border-bottom:3px solid #617A55">
        <div class="col">
            <div class="row">
                <div class="col">
                    <span class="accounttitle">EMAIL ADDRESS</span>
                </div>
            </div>
            <div class="row align-items-end">
                <div class="col"><span class="textemail">{{ Auth::user()->email }}</span></div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <span class="accounttitle">PASSWORD</span>
                </div>
            </div>
            <div class="row align-items-end">
                <div class="col"><span class="textinput">...................</span></div>
                <div class="col">
                    <a href="{{ route('forget.password.get') }}" class="btnedit float-end"><iconify-icon icon="mdi:forgot-password" style="margin-right:5px;"></iconify-icon>Forgot Password</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row pb-4 pt-3">
        <div class="col">
            <form action="{{ route('deleteaccount') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::id() }}">
                <button type="submit" class="deleteaccount"><iconify-icon icon="uiw:user-delete" style="margin-right:5px;"></iconify-icon> Delete Account</button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Foto-->
<div class="modal fade" id="foto" tabindex="-1" aria-labelledby="fotoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="fotoLabel">Upload Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('userimgpost') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="input-group mb-3">
            <input type="hidden" name="id" value="{{Auth::id()}}">
            <input type="file" class="form-control" name="foto">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal Username-->
<div class="modal fade" id="username" tabindex="-1" aria-labelledby="usernameLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="usernameLabel">Username Update</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('userusernamepost') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="input-group mb-3">
            <input type="hidden" name="id" value="{{Auth::id()}}">
            <input type="text" class="form-control" name="username" placeholder="username">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </form>
  </div>
</div>
@endsection