 @extends('layouts.adminPanel')
 @section('title')
     Cards
 @endsection

 @section('content')
     <main id="main">
         <div class="bg-white border-bottom py-3 mb-3">
             <div
                 class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                 <nav class="mb-0" aria-label="breadcrumb">
                     <ol class="breadcrumb m-0">
                         <li class="breadcrumb-item"><a href="./index.html"> {{ __('admin-pages.home') }}</a></li>
                         <li class="breadcrumb-item active" aria-current="page"> {{ __('admin-pages.productsManagement') }}
                         <li class="breadcrumb-item active" aria-current="page"> {{ __('admin-pages.edit_add_product') }}
                         <li class="breadcrumb-item active" aria-current="page"> {{ __('admin-pages.edit_add_product') }}
                         </li>
                     </ol>
                 </nav>

             </div>
         </div>
         <section class="container-fluid">

             <!-- Page Title-->
             <h2 class="fs-4 mb-2">
                 @if (isset($category->id))
                     {{ $category->name_en }}
                 @else
                     {{ __('admin-pages.AddNewProduct') }}
                 @endif
             </h2>
             <form action="" method="POST">

                 <input type="hidden" id="image-type" value="{{ !isset($isSubCategory) ? 'category' : 'subCategory' }}">
                 <input type="hidden" id="operationType" value="{{ isset($category->id) ? 1 : 0 }}">

                 @csrf
                 <div class="card mb-4">
                     <div class="card-header justify-content-between align-items-center d-flex">
                         <h6 class="card-title m-0">
                             @if (isset($category->id))
                                 {{ $category->name_en }}
                                 {{ __('admin-pages.specification') }}
                             @else
                                 {{ __('admin-pages.AddNewCategory') }}
                             @endif

                         </h6>
                         <div class="dropdown">
                             <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                                 id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="ri-more-2-line"></i>
                             </button>
                             <div class="form-check form-switch" style="float: left">

                             </div>
                             <ul class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                                 <li><a class="dropdown-item" href="#">Action</a></li>
                                 <li><a class="dropdown-item" href="#">Another action</a></li>
                                 <li><a class="dropdown-item" href="#">Something else here</a></li>
                             </ul>
                             <div class="form-check form-switch" style="float: left">
                                 <input class="form-check-input " type="checkbox" id="active"
                                     {{ isset($category->active) && $category->active ? 'checked' : '' }}
                                     onchange="activeProduct(this,'{{  isset($category->id) &&$category->id?$category->id:'' }}')">
                                 <label class="form-check-label" for="active">ACTIVE</label>
                             </div>
                         </div>

                     </div>

                     <div class="row g-4">

                         <div class="col-12  col-md-6">
                             <!-- arabic-->
                             <div class="  mb-4">
                                 <div class="row p-5">
                                     <div class="col-6">
                                         <label for="category-name" class="form-label">Category Name ARABIC</label>
                                         <input type="text" class="form-control" id="category-name" name="name_ar"
                                             required dir="rtl"
                                             value="{{ isset($category->name_ar) ? $category->name_ar : '' }}"
                                             placeholder="إسم التصنيف بالعربية">
                                     </div>
                                     <div class="col-6">
                                         <label for="category-name" class="form-label">Category Name ENGLISH</label>
                                         <input type="text" class="form-control" id="category-name"
                                             name="name_en"required
                                             value="{{ isset($category->name_en) ? $category->name_en : '' }}"
                                             placeholder="Category Name ENGLISH">
                                     </div>
                                     @if (isset($category->id))
                                         <div class="mb-4 mt-5">
                                             <div class="card-body  ">
                                                 <div class="row " id="images-div">

                                                     <div class="col-3">
                                                         <button class="btn btn-primary btn-sm" type="button"
                                                             data-bs-toggle="offcanvas" href="#add-images" role="button"
                                                             aria-controls="color-add" title="Add Images">Add
                                                             Images</button>
                                                     </div>

                                                     @foreach ($images as $img)
                                                         <div class="col-md-3 border p-3" id="image-{{ $img->id }}"
                                                             dir="rtl">
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
                                     @endif

                                 </div>
                                 <center>
                                     <div class="col-6  ">
                                         <button style="width:50%;" class="btn  btn-success text-white" type="submit">
                                             Save</button>
                                     </div>
                                 </center>
                             </div>
                         </div>
                     </div>
                 </div>
                 </div>
             </form>
         </section>
     </main>
     @extends('adminPanel.modals.add-images')
     @extends('adminPanel.modals.showImg')
 @endsection
