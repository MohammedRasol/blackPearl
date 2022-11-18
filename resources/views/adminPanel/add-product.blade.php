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
                 {{ __('admin-pages.AddNewProduct') }}
             </h2>
             <div class="card mb-4">
                 <div class="card-header justify-content-between align-items-center d-flex">
                     <h6 class="card-title m-0">
                         {{ __('admin-pages.AddNewProduct') }}
                     </h6>

                 </div>
                 <form action="" method="POST">
                     @csrf
                     <div class="row g-4">
                         <div class="col-12  col-md-6">
                             <div class="  mb-4">
                                 <div class="card-body">
                                     <div class="mb-3">
                                         <label for="product-name" class="form-label">Product Name ARABIC</label>
                                         <input type="text" class="form-control" id="product-name" name="name_ar"  value="{{ old('name_ar') }}" required="required"
                                             placeholder="Product Name ARABIC">
                                     </div>
                                     <div class="mb-3">
                                         <label for="product-name" class="form-label">Product Name ENGLISH</label>
                                         <input type="text" class="form-control" id="product-name" name="name_en" value="{{ old('name_en') }}" required="required"
                                             placeholder="Product Name ENGLISH">
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
                                         <input type="text" class="form-control" id="product-price" name="price" value="{{ old('price') }}" required="required"
                                             placeholder="Product Price">
                                     </div>
                                     <div class="row">
                                         <div class="mb-3 col-6">
                                             <label for="product-category" class="form-label">Product Category </label>
                                             <select class="form-select mb-3" id="product-category" name="category"  required="required"
                                                 onchange="getSubCategory(this.value)">
                                                 <option value="">Category</option>
                                                 @foreach ($categories as $item)
                                                     <option value="{{ $item->id }}" @if ($item->id==old("category")) selected @endif>{{ $item->name_en }}
                                                     </option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="col-6">
                                             <label for="product-sub-category" class="form-label">Product Sub
                                                 Category</label>
                                             <select class="form-select mb-3" id="product-sub-category" @if ($item->id==old("sub_category_id")) selected @endif
                                                 name="sub_category_id"  required="required">
                                                 <option value="">Sub Category</option>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                         </div>

                         <center>
                             <div class="col-6" >
                                 @if ($errors->any())
                                     <div class="alert alert-danger"  style="text-align: left">

                                         @foreach ($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                         @endforeach
                                     </div>
                                 @endif
                             </div>
                             <div class="col-3 mb-3">
                                 <button class="btn btn-primary">Save & Continue </button>
                             </div>
                         </center>

                     </div>
             </div>
         </section>
     </main>
 @endsection
