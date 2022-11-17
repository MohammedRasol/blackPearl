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
                         <ul class="dropdown-menu dropdown" aria-labelledby="dropdownMenuButton1">
                             <li><a class="dropdown-item" href="#">Action</a></li>
                             <li><a class="dropdown-item" href="#">Another action</a></li>
                             <li><a class="dropdown-item" href="#">Something else here</a></li>
                         </ul>
                     </div>
                 </div>

                 <div class="row g-4">

                     <div class="col-12 col-md-6" dir="rtl">

                         <!-- Example-->
                         <div class="card mb-4">
                             <div class="card-header justify-content-between align-items-center d-flex">
                                 <h6 class="card-title m-0">المعلومات المنتج بالعربية</h6>
                             </div>
                             <div class="card-body">
                                 <form>
                                     <div class="mb-3">
                                         <label for="product-name" class="form-label">إسم المنتج</label>
                                         <input type="email" class="form-control" id="product-name"
                                             value="{{ $product->name_ar }}" placeholder="إسم المنتج">
                                         <div id="emailHelp" class="form-text">إسم المنتج الذي سوف يظهر بالموقع</div>
                                     </div>
                                     <div class="mb-3">
                                         <label for="product-price" class="form-label">سعر المنتج (بالدولار )</label>
                                         <input type="email" class="form-control" id="product-price"
                                             value="{{ $product->price }}" placeholder="سعر المنتج">
                                     </div>
                                     <div class="row" style="margin-right:0">
                                         <div class="col-md-3 border mr-5" id="image-{{ $product->id }}">
                                             <div class="thumbnail">
                                                 <img src="{{ asset('img/product/logo/' . $product->logo) }}"
                                                     alt="Lights" class="product-image">
                                                 <div class="caption text-center">
                                                     <center>
                                                         الصورة
                                                     </center>
                                                 </div>
                                                 <center class="mt-1">
                                                     <button href="#"
                                                         class="btn btn-primary btn-sm text-white">عــــرض</button>
                                                     <button href="#"
                                                         class="btn btn-danger btn-sm text-white">حــــذف</button>
                                                 </center>


                                             </div>
                                         </div>

                                         @foreach ($images as $img)
                                             <div class="col-md-3 border" id="image-{{ $img->id }}">
                                                 <div class="thumbnail">
                                                     <img src="{{ asset($img->path) }}" alt="Lights"
                                                         class="product-image">
                                                     <div class="caption text-center">
                                                         <center>
                                                             {{ $img->color }}
                                                         </center>
                                                     </div>
                                                     <center class="mt-1">
                                                         <button href="#"
                                                             class="btn btn-primary btn-sm text-white">عــــرض</button>
                                                         <button href="#"
                                                             class="btn btn-danger btn-sm text-white">حــــذف</button>
                                                     </center>


                                                 </div>
                                             </div>
                                         @endforeach
                                     </div>
                                     <div class="mb-3 border mt-5 col-4">
                                         <div class="card-body">
                                             <div class="form-check form-switch">
                                                 <input class="form-check-input " type="checkbox" id="active" checked>
                                                 <label class="form-check-label" for="active">تفعيل</label>
                                             </div>
                                         </div>
                                     </div>
                                 </form>
                             </div>

                             <div class="row">

                                 <div class="card-body col-6">
                                     <label for="product-category" class="form-label">تصنيف المنتج</label>
                                     <select class="form-select mb-3" id="product-category">
                                         <option value=""> إختر التصنيف</option>
                                         @foreach ($categories as $item)
                                             <option value="{{ $item->id }}"
                                                 @if ($product->subCategory->category_id == $item->id) selected @endif>{{ $item->name_ar }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="card-body col-6">
                                     <label for="product-sub-category" class="form-label">التصنيف الفرعي للمنتج</label>
                                     <select class="form-select mb-3" id="product-sub-category">
                                         <option value="">التصنيف الفرعي</option>
                                         @foreach ($subCategories as $item)
                                             <option value="{{ $item->id }}"
                                                 @if ($product->subCategory->id == $item->id) selected @endif>{{ $item->name_ar }}
                                             </option>
                                         @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="card-body">
                                 <div class="mb-3">
                                     <h3>وصف المنتج</h3>
                                     <h5>إضافة خصائص للمنتج</h5>
                                     <button class="btn btn-primary btn-sm" style="" data-bs-toggle="offcanvas"
                                         href="#ar-add" role="button" aria-controls="color-add"
                                         title="إضافة خصائص">إضافة خصائص</button>

                                     <h5 class="mt-1">اللوان المنتج <small class="small-text">إنقر لعرض خصائص
                                             المنتج</small></h5>
                                     @foreach ($product->productInfo as $item)
                                         <button class="btn color-btn" style="background-color:{{ $item->color->hex }}"
                                             data-bs-toggle="offcanvas" href="#ar-{{ $item->color->id }}" role="button"
                                             aria-controls="color-{{ $item->color['id'] }}"
                                             title="{{ $item->color['name_ar'] }}"></button>
                                     @endforeach
                                     {{-- <textarea class="form-control" id="product-description" rows="5">{{ $product->product_info->discription_ar }}</textarea> --}}
                                 </div>
                             </div>
                             <div class="card-body">
                                 <div class="mb-3">
                                 </div>
                             </div>
                         </div>
                     </div>
                   
                 </div>
             </div>
             @foreach ($product->productInfo as $item)
                 <div class="offcanvas offcanvas-end" dir="rtl" tabindex="-1" id="ar-{{ $item->color->id }}"
                     aria-labelledby="color-label-ar-{{ $item->color->id }}">
                     <div class="offcanvas-header">
                         <h5 class="offcanvas-title" id="color-label-{{ $item->color->id }}">اللون :
                             {{ $item->color->name_ar }}
                         </h5>
                         <button type="button" class="btn-close text-reset"style="margin-left:0;"
                             data-bs-dismiss="offcanvas" aria-label="Close"></button>
                     </div>
                     <div class="offcanvas-body">
                         <div class="dropdown mt-3">
                             <div class="mb-3">
                                 <label for="product-name" class="form-label">حجم المنتج</label>
                                 <input type="email" class="form-control" id="product-name"
                                     value="{{ $item->size }}" placeholder="حجم المنتج">
                             </div>
                             <div class="mb-3">
                                 <label for="product-name" class="form-label">كمية المنتج</label>
                                 <input type="email" class="form-control" id="product-name"
                                     value="{{ $item->qty }}" placeholder="كمية المنتج">
                             </div>
                             <textarea class="form-control" dir="rtl" id="product-description" name="discription_ar" rows="5">{{ $item->discription_ar }}</textarea>
                             <label for="product-sub-category " class="form-label mt-1">لون المنتج</label>
                             <br>
                             @foreach ($colors as $color)
                                 <input class="form-check-input m-1"
                                 @if ($color->id==$item->color->id )checked @endif
                                     value="{{ $color->id }}"style="background-color:{{ $color->hex }}"
                                     name="color" type="radio" id="color-check-{{ $color->id }}">
                                 <label class="form-check-label"
                                     for="color-check-{{ $color->id }}">{{ $color->name_ar }}</label>
                             @endforeach
                         </div>
                     </div>
                 </div>
                 <div class="offcanvas offcanvas-end" tabindex="-1" id="en-{{ $item->color->id }}"
                     aria-labelledby="color-label-en-{{ $item->color->id }}">
                     <div class="offcanvas-header">
                         <h5 class="offcanvas-title" id="color-label-{{ $item->color->id }}">Color :
                             {{ $item->color->name_en }}
                         </h5>
                         <button type="button" class="btn-close text-reset"style="margin-left:0;"
                             data-bs-dismiss="offcanvas" aria-label="Close"></button>
                     </div>
                     <div class="offcanvas-body">
                         <div class="dropdown mt-3">
                             <div class="mb-3">
                                 <label for="product-name" class="form-label">Product Size</label>
                                 <input type="email" class="form-control" id="product-name"
                                     value="{{ $item->size }}" placeholder="Product Size">
                             </div>
                             <div class="mb-3">
                                 <label for="product-name" class="form-label">Product QTY</label>
                                 <input type="email" class="form-control" id="product-name"
                                     value="{{ $item->qty }}" placeholder="Product QTY">
                             </div>
                             <textarea class="form-control" dir="rtl" id="product-description" name="discription_en" rows="5">{{ $item->discription_en }}</textarea>
                             <label for="product-sub-category " class="form-label mt-1">Product Color</label>
                             <br>
                             @foreach ($colors as $color)
                                 <input class="form-check-input m-1" value="{{ $color->id }}"
                                     @if ($color->id==$item->color->id )checked @endif style="background-color:{{ $color->hex }}"
                                     name="color" type="radio" id="color-check-en-{{ $color->id }}">
                                 <label class="form-check-label"
                                     for="color-check-en-{{ $color->id }}">{{ $color->name_en }}</label>
                             @endforeach
                         </div>
                     </div>
                 </div>
             @endforeach
             <div class="offcanvas offcanvas-end" dir="rtl" tabindex="-1" id="ar-add"
                 aria-labelledby="color-label-add">
                 <div class="offcanvas-header">
                     <h5 class="offcanvas-title" id="color-label-{{ $item->color->id }}">اللون :
                         {{ __('admin-pages.addProductSpec') }}</h5>
                     <button type="button" class="btn-close text-reset"style="margin-left:0;"
                         data-bs-dismiss="offcanvas" aria-label="Close"></button>
                 </div>
                 <div class="offcanvas-body">
                     <div class="dropdown mt-3">
                         <div class="mb-3">
                             <label for="product-name" class="form-label">حجم المنتج</label>
                             <input type="email" class="form-control" id="product-name" value=""
                                 placeholder="حجم المنتج">
                         </div>
                         <div class="mb-3">
                             <label for="product-name" class="form-label">كمية المنتج</label>
                             <input type="email" class="form-control" id="product-name" value=""
                                 placeholder="كمية المنتج">
                         </div>
                         <textarea class="form-control" dir="rtl" id="product-description" name="discription_ar" rows="5"></textarea>
                         <label for="product-sub-category" class="form-label mt-1">لون المنتج</label>
                         <br>

                         @foreach ($colors as $color)
                             <input class="form-check-input m-1"
                                 value="{{ $color->id }}"style="background-color:{{ $color->hex }}" name="color"
                                 type="radio" id="color-check-{{ $color->id }}">
                             <label class="form-check-label"
                                 for="color-check-{{ $color->id }}">{{ $color->name_ar }}</label>
                         @endforeach
                     </div>
                 </div>
             </div>





         </section>
     </main>
 @endsection
