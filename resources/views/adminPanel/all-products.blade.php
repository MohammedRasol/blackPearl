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
                         <form class="bg-light rounded px-3 py-1 flex-shrink-0 d-flex align-items-center" method="post"
                             action="">
                             @csrf
                             <input class="form-control border-0 bg-transparent px-0 py-2 me-5 fw-bolder" type="search"
                                 value="{{ old('search') }}" placeholder="Search" aria-label="Search" name="search">
                             <button class="btn btn-link p-0 text-muted" type="submit"><i
                                     class="ri-search-2-line"></i></button>

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
                                     <th>Product Name</th>
                                     <th>Sub Category</th>
                                     <th>Price</th>
                                     <th>Actions</th>
                                     <th>Status</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($products as $product)
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
                                                             @if (!empty($product->multiMedia[0]->path)) src=" {{ asset($product->multiMedia[0]->path) }}" 
                                                              @else
                                                                   src="{{ asset('img/product/no-product.png') }}" @endif
                                                             alt="">
                                                     </picture>
                                                 </div>
                                                 <div>
                                                     <p class="fw-bolder mb-1 d-flex align-items-center lh-1">
                                                         {{ $product->name }}
                                                         <span class="d-block f-w-4 ms-1 lh-1 text-primary">
                                                             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                                 viewBox="0 0 20 20" fill="currentColor">
                                                                 <path fill-rule="evenodd"
                                                                     d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                     clip-rule="evenodd" />
                                                             </svg>
                                                         </span>
                                                     </p>

                                                     <span class="d-block text-muted">
                                                         {{ __('admin-pages.instock') }} : @if (!empty($product->getProductQty[0]->totalQty))
                                                             {{ $product->getProductQty[0]->totalQty }}
                                                         @else
                                                             0
                                                         @endif
                                                     </span>

                                                 </div>
                                             </div>
                                         </td>
                                         <td>
                                             @if (!empty($product->category->name))
                                                 <a href="/admin/all-products/{{ $product->category->id }}">{{ $product->category->name }}</a>
                                             @else
                                                 -
                                             @endif
                                         </td>
                                         <td class="text-muted">$
                                             @if (!empty($product->price))
                                                 {{ $product->price }}
                                             @else
                                                 -
                                             @endif
                                         </td>

                                         <td><a class="btn btn-primary btn-sm"
                                                 href="/admin/edit-product/{{ $product->id }}">Edit</a></li>
                                         </td>
                                         <td>
                                             <div class="form-check form-switch" style="float: left">
                                                 <input class="form-check-input " type="checkbox" id="active"
                                                     {{ $product->active ? 'checked' : '' }}
                                                     onchange="activeProduct(this,'{{ $product->id }}')">
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
                         {{ $products->links() }}
                     </div>
                 </div>
             </div>
             </div>
             </div>
             </form>
         </section>
     </main>
 @endsection
