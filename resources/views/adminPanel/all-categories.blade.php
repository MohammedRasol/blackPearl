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
                         </li>
                     </ol>
                 </nav>
             </div>
         </div>
         <section class="container-fluid">


             <div class="card mb-4">
                 <div class="card-header justify-content-between align-items-center d-flex">
                     <h6 class="card-title m-0">Products Management</h6>
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
                 <div class="card-body">


                     <div class="d-flex justify-content-between align-items-center mb-3">
                         <div class="row col-12">
                             <form
                                 class="bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center col-md-4 col-sm-6"
                                 method="post" action="">
                                 @csrf
                                 <input class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" type="search"
                                     value="{{ old('search') }}" placeholder="Search" aria-label="Search" name="search">
                                 <button class="btn btn-link p-0 text-muted" type="submit"><i
                                         class="ri-search-2-line"></i></button>
                             </form>
                             <div class="col-md-4 col-sm-6">
                                 @if (!isset($isSubCategory))
                                     <a type="button" href="{{ route('addCategory') }}" class="btn btn-primary"> Add
                                         Category</a>
                                 @else
                                     <a type="button" href="{{ '/admin/add-sub-category/' . $categoryId }}"
                                         class="btn btn-primary"> Add Sub
                                         Category</a>
                                 @endif
                             </div>
                         </div>

                     </div>

                     <div class="table-responsive min-height-table">
                         <table class="table m-0 table-striped">
                             <thead>
                                 <tr>
                                     <th>
                                         <div class="form-group form-check-custom mb-0 flex-shrink-0">
                                             <input type="checkbox" class="form-check-input" id="filter-">
                                         </div>
                                     </th>
                                     <th>
                                         {{ isset($isSubCategory) ? 'Sub' : '' }}
                                         Category Name</th>
                                     @if (!isset($isSubCategory))
                                         <th>Sub Categories</th>
                                     @endif

                                     @if (isset($isSubCategory))
                                         <th>Products</th>
                                     @endif

                                     <th>Actions</th>
                                     <th>Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($categories as $category)
                                     <tr>
                                         <td>
                                             <div class="form-group form-check-custom mb-0">
                                                 <input type="checkbox" class="form-check-input" id="filter-0">
                                             </div>
                                         </td>
                                         <td>
                                             <div class="d-flex justify-content-start align-items-start">
                                                 <div class="avatar avatar-xs me-3 flex-shrink-0">

                                                     <picture>
                                                         <img class="f-w-10 rounded-circle"
                                                             @if (!empty($category->multiMedia[0]->path)) src=" {{ asset($category->multiMedia[0]->path) }}" 
                                                             @else
                                                                  src="{{ asset('img/product/no-product.png') }}" @endif
                                                             alt="">
                                                     </picture>
                                                 </div>
                                                 <div>
                                                     <p class="fw-bolder mb-1 d-flex align-items-center lh-1">
                                                         {{ $category->name_en }}</p>
                                                 </div>
                                             </div>
                                         </td>
                                         @if (!isset($isSubCategory))
                                             <td><a href="all-sub-categories/{{ $category->id }}">Sub Categories</a></li>
                                             </td>
                                         @endif
                                         @if (isset($isSubCategory))
                                             <td><a class=""
                                                     href="{{ '/admin/all-products/' . $category->id }}"><b><u>Products</u></b></a>
                                                 </li>
                                             </td>
                                         @endif

                                         <td><a class="btn btn-primary btn-sm"
                                                 href="{{ !isset($isSubCategory) ? '/admin/edit-category' : '/admin/edit-sub-category' }}/{{ $category->id }}">Edit</a>
                                             </li>
                                         </td>
                                         <td>
                                             <div class="form-check form-switch" style="float: left">
                                                 <input class="form-check-input " type="checkbox" id="active"
                                                     {{ $category->active ? 'checked' : '' }}
                                                     onchange="activeCategory(this,'{{ $category->id }}')">
                                                 <label class="form-check-label" for="active">ACTIVE</label>
                                             </div>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                     <br>
                     <div class="d-flex justify-content-center">
                         {{ $categories->links() }}
                     </div>
                 </div>
             </div>
             </div>
             </div>
             </form>
         </section>
     </main>
 @endsection
