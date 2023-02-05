 @extends('layouts.adminPanel')
 @section('title')
     Edit Country
 @endsection

 @section('content')
     <main id="main">
         <div class="bg-white border-bottom py-3 mb-3">
             <div
                 class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                 <nav class="mb-0" aria-label="breadcrumb">
                     <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="./index.html"> {{ __('admin-pages.home') }}</a></li>
                         <li class="breadcrumb-item active" aria-current="page"> {{ __('admin-pages.countrysManagement') }}
                         <li class="breadcrumb-item active" aria-current="page"> {{ __('admin-pages.edit_add_country') }}
                         <li class="breadcrumb-item active" aria-current="page"> {{ __('admin-pages.edit_add_country') }}
                         </li>
                     </ol>
                 </nav>

             </div>
         </div>
         <section class="container-fluid">

             <!-- Page Title-->
             <h2 class="fs-4 mb-2">
                 @if (isset($country->id))
                     {{ $country->name }}
                 @else
                     {{ __('admin-pages.AddNewcountry') }}
                 @endif
             </h2>
             <form action="" method="POST">
                 <input type="hidden" id="image-type" value="country">
                 @csrf
                 <div class="card mb-4">
                     <div class="card-header justify-content-between align-items-center d-flex">
                         <h6 class="card-title m-0">
                             @if (isset($country->id))
                                 {{ $country->name }} {{ __('admin-pages.specification') }}
                             @else
                                 {{ __('admin-pages.AddNewcountry') }}
                             @endif

                         </h6>

                         <div class="dropdown">

                             <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                                 id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="ri-more-2-line"></i>
                             </button>
                             <div class="form-check form-switch" style="float: left">
                                 <input class="form-check-input " type="checkbox" id="active"
                                     {{ isset($country->active) ? 'checked' : '' }}
                                     onchange="activecountry(this,'{{ isset($country->id) ? $country->id : 0 }}')">
                                 <label class="form-check-label" for="active">ACTIVE</label>
                             </div>
                             <ul class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                                 <li><a class="dropdown-item" href="#">Action</a></li>
                                 <li><a class="dropdown-item" href="#">Another action</a></li>
                                 <li><a class="dropdown-item" href="#">Something else here</a></li>
                             </ul>

                         </div>
                     </div>

                     <div class="row g-4">

                         <div class=" col-md-6">
                             <!-- arabic-->
                             <div class="  mb-4">
                                 <div class="card-body">
                                     <div class="mb-3">
                                         <label for="country-name" class="form-label">country Name ARABIC</label>
                                         <input type="text" class="form-control" id="country-name" name="name_ar"
                                             value="{{ isset($country->name_ar) ? $country->name_ar : '' }}"
                                             placeholder="country Name ARABIC">
                                     </div>
                                     <div class="mb-3">
                                         <label for="country-name" class="form-label">country Name ENGLISH</label>
                                         <input type="text" class="form-control" id="country-name" name="name_en"
                                             value="{{ isset($country->name_en) ? $country->name_en : '' }}"
                                             placeholder="country Name ENGLISH">
                                     </div>
                                     <div class="mb-3">
                                         <label for="country-code" class="form-label">country Code</label>
                                         <input type="text" class="form-control" id="country-code" name="code"
                                             value="{{ isset($country->code) ? $country->code : '' }}" placeholder="country Code">
                                     </div>
                                     <div class="mb-3">
                                         <label for="country-phone-key" class="form-label">country phone key</label>
                                         <input type="text" class="form-control" id="country-phone-key" name="phone_key"
                                             value="{{ isset($country->phone_key) ? $country->phone_key : '' }}" placeholder="country phone key">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-6  ">
                             <div class="mb-4">
                                 <br>
                                 <br>
                                 <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="offcanvas"
                                     href="#add-images" role="button" aria-controls="color-add" title="Add Images">Add
                                     Images</button>

                                 <div class="card-body">
                                     <div class="row" id="images-div">
                                         @foreach ($images as $img)
                                             <div class="col-md-3 border" id="image-{{ $img->id }}" dir="rtl">
                                                 <div class="thumbnail">
                                                     <a type="button" class="text-danger large-text"
                                                         onclick="deleteImage('{{ $img->id }}')">
                                                         <i class="fa-solid fa-circle-minus"></i></a>

                                                     <a type="button" class="text-primary large-text"
                                                         data-bs-toggle="modal"
                                                         onclick="showImage('{{ asset($img->path) }}')"
                                                         data-bs-target="#showImg">
                                                         <i class="fa-solid fa-maximize"></i> </a>

                                                     <div class="form-check form-switch" style="float: left">
                                                         <input class="form-check-input " type="radio"
                                                             {{ $img->logo ? 'checked' : '' }}
                                                             value="{{ $img->id }}" required
                                                             name="logo"id="active">
                                                         logo
                                                     </div>


                                                     <img src="{{ asset($img->path) }}" alt="Lights"
                                                         class="product-image">
                                                     <div class="caption text-center">
                                                         <center>
                                                             {{ $img->color }}
                                                         </center>
                                                     </div>

                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <button style="width:50%;" class="btn  btn-success text-white" type="submit">
                                     Save</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </form>
             @extends('adminPanel.modals.add-images')
             @extends('adminPanel.modals.showImg')
         </section>
     </main>
 @endsection
