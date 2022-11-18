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
                 @if ($product->id)
                     {{ $product->name }}
                 @else
                     {{ __('admin-pages.AddNewProduct') }}
                 @endif
             </h2>
             <form action="" method="POST">
                 @csrf
                 <div class="card mb-4">
                     <div class="card-header justify-content-between align-items-center d-flex">
                         <h6 class="card-title m-0">
                             @if ($product->id)
                                 {{ $product->name }} {{ __('admin-pages.specification') }}
                             @else
                                 {{ __('admin-pages.AddNewProduct') }}
                             @endif

                         </h6>

                         <div class="dropdown">

                             <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button" 
                                 id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="ri-more-2-line"></i>
                             </button>
                             <div class="form-check form-switch" style="float: left">
                                 <input class="form-check-input " type="checkbox" id="active" checked>
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

                         <div class="col-12  col-md-6">
                             <!-- arabic-->
                             <div class="  mb-4">
                                 <div class="card-body">
                                     <div class="mb-3">
                                         <label for="product-name" class="form-label">Product Name ARABIC</label>
                                         <input type="text" class="form-control" id="product-name" name="name_ar"
                                             value="{{ $product->name_ar }}" placeholder="Product Name ARABIC">
                                     </div>
                                     <div class="mb-3">
                                         <label for="product-name" class="form-label">Product Name ENGLISH</label>
                                         <input type="text" class="form-control" id="product-name" name="name_en"
                                             value="{{ $product->name_ar }}" placeholder="Product Name ENGLISH">
                                     </div>
                                     <div class="mb-3">
                                         <label for="product-name" class="form-label">Product Discription Arabic</label>
                                         <textarea class="form-control" dir="rtl" id="discription_ar" name="discription_ar" rows="5">{{ $product->discription_ar }}</textarea>
                                     </div>
                                     <div class="mb-3" >
                                         <label for="product-name" class="form-label">Product Discription ENGLISH</label>
                                         <textarea dir="ltr" class="form-control" dir="rtl" id="discription_en" name="discription_en" rows="5">{{ $product->discription_en }}</textarea>
                                     </div>

                                 </div>
                             </div>
                         </div>
                         <div class="col-12  col-md-6">
                             <!-- arabic-->
                             <div class="mb-4">
                                 <div class="card-body">
                                     <div class="mb-3">
                                         <label for="product-price" class="form-label">Product Price (USD)</label>
                                         <input type="text" class="form-control" id="product-price" name="price"
                                             value="{{ $product->price }}" placeholder="Product Price">
                                     </div>
                                     <div class="row">
                                         <div class="mb-3 col-6">
                                             <label for="product-category" class="form-label">Product Category </label>
                                             <select class="form-select mb-3" id="product-category"
                                                 onchange="getSubCategory(this.value)">
                                                 <option value="">Category</option>
                                                 @foreach ($categories as $item)
                                                     <option value="{{ $item->id }}"
                                                         @if ($product->subCategory->category_id == $item->id) selected @endif>
                                                         {{ $item->name_en }}
                                                     </option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="col-6">
                                             <label for="product-sub-category" class="form-label">Product Sub
                                                 Category</label>
                                             <select class="form-select mb-3" id="product-sub-category">
                                                 <option value="">Sub Category</option>
                                                 @foreach ($subCategories as $item)
                                                     <option value="{{ $item->id }}"
                                                         @if ($product->sub_category_id == $item->id) selected @endif>
                                                         {{ $item->name_en }}
                                                     </option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="col-12  ">
                                             <div class="mb-4">
                                                 <button class="btn btn-primary btn-sm"  type="button"
                                                     data-bs-toggle="offcanvas" href="#add-images" role="button"
                                                     aria-controls="color-add" title="Add Images">Add Images</button>

                                                 <div class="card-body">
                                                     <div class="row" id="images-div">
                                                         @foreach ($images as $img)
                                                             <div class="col-md-3 border" id="image-{{ $img->id }}"
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

                                                                     <div class="form-check form-switch"
                                                                         style="float: left">
                                                                         <input class="form-check-input " type="radio"
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

             </form>
             </div>
             </div>
             <div class="mb-3">
                 <h3> Product SPEC </h3>

                 <button class="btn btn-primary btn-sm" style="" data-bs-toggle="offcanvas" href="#en-drawer"
                     role="button" onclick="showProductInfo({{ $product->id }})" aria-controls="color-add" type="button"
                     title="إضافة خصائص">Add Product Spec</button>

                 <h5 class="mt-5 colors-div-content"> Product Color <small class="small-text">
                         Press oncolorto see all details</small></h5>
                 <span id="colors-div">

                     @foreach ($product->productInfo as $item)
                         <button class="btn color-btn" id="color-element-{{ $item->id }}" type="button"
                             style="background-color:{{ $item->color->hex }}" data-bs-toggle="offcanvas"
                             href="#en-drawer" role="button" onclick="getProductInfo({{ $item->id }})"
                             aria-controls="color-{{ $item->color['id'] }}"
                             title="{{ $item->color['name_ar'] }}"></button>
                     @endforeach
                 </span>

             </div>
             <div class="mb-3">
                 <button style="width:50%;" class="btn  btn-success text-white" type="submit"> Save</button>
             </div>
             </div>

             </div>
             </div>
             </div>
             </div>
             </div>
             </div>
             </form>

             @extends('adminPanel.modals.add-images')
             @extends('adminPanel.modals.en-drawer')
             @extends('adminPanel.modals.showImg')
         </section>
     </main>
 @endsection
