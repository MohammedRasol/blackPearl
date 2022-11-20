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
                 @if (isset($user->id))
                     {{ $user->name }}
                 @else
                     {{ __('admin-pages.AddNewUser') }}
                 @endif
             </h2>
             <form action="" method="POST">
                 <input type="hidden" id="image-type" value="user">
                 @csrf
                 <div class="card mb-4">
                     <div class="card-header justify-content-between align-items-center d-flex">
                         <h6 class="card-title m-0">
                             {{-- @if ($user->id)
                                 {{ $user->name }} {{ __('admin-pages.specification') }}
                             @else
                                 {{ __('admin-pages.AddNew') }}
                             @endif --}}
                             test user
                         </h6>

                         <div class="dropdown">

                             <button class="btn btn-link dropdown-toggle dropdown-toggle-icon fw-bold p-0" type="button"
                                 id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="ri-more-2-line"></i>
                             </button>
                             @if (isset($user->id))
                                 <div class="form-check form-switch" style="float: left">
                                     <input class="form-check-input " type="checkbox" id="active"
                                         {{ $user->active ? 'checked' : '' }}
                                         onchange="activeUser(this,'{{ $user->id }}')">
                                     <label class="form-check-label" for="active">ACTIVE</label>
                                 </div>
                             @endif
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
                                         <label for="user-name" class="form-label">Name</label>
                                         <input type="text" class="form-control" id="user-name" name="name"
                                             value="{{ isset($user->id) ? $user->name : '' }}" placeholder="user Name">
                                     </div>
                                     <div class="mb-3">
                                         <label for="user-name" class="form-label">Phone</label>
                                         <input type="text" class="form-control" id="user-name" name="phone"
                                             value="{{ isset($user->id) ? $user->phone : '' }}" placeholder="phone">
                                     </div>
                                     <div class="mb-3">
                                         <label for="user-email" class="form-label">Email</label>
                                         <input type="text" class="form-control" id="user-email" name="email"
                                             value="{{ isset($user->id) ? $user->email : '' }}" placeholder="email">
                                     </div>
                                     <div class="mb-3">
                                         <label for="user-password" class="form-label">Password</label>
                                         <input type="password" class="form-control" id="user-password" name="password"
                                              placeholder="Password">
                                     </div>
                                     <div class="mb-3">
                                         <label for="user-password_confirmation" class="form-label">Password confirmation</label>
                                         <input type="password" class="form-control" id="user-password_confirmation" name="password_confirmation"
                                             placeholder="password confirmation">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- arabic-->
                         <div class="mb-4">
                             <div class="card-body">

                                 <div class="row">
                                     <div class="col-12  ">
                                         <div class="mb-4">
                                             @if (isset($user->id))
                                                 <button class="btn btn-primary btn-sm" type="button"
                                                     data-bs-toggle="offcanvas" href="#add-images" role="button"
                                                     aria-controls="color-add" title="Add Images">Add Image</button>

                                                 <div class="card-body">
                                                     <div class="row" id="images-div">
                                                 
                                                         @if (!empty($images[0]))
                                                             @foreach ($images as $img)
                                                                 <div class="col-md-3 border"
                                                                     id="image-{{ $img->id }}" dir="rtl">
                                                                     <div class="thumbnail">
                                                                         <a type="button" class="text-danger large-text"
                                                                             onclick="deleteImage('{{ $img->id }}')">
                                                                             <i class="fa-solid fa-circle-minus"></i></a>
                                                                         <a type="button" class="text-primary large-text"
                                                                             data-bs-toggle="modal"
                                                                             onclick="showImage('{{ asset($img->path) }}')"
                                                                             data-bs-target="#showImg">
                                                                             <i class="fa-solid fa-maximize"></i> </a>
                                                                         <img src="{{ asset($img->path) }}"
                                                                             alt="Lights" class="product-image">
                                                                     </div>
                                                                 </div>
                                                             @endforeach
                                                         @endif
                                                     </div>
                                                 </div>
                                             @endif
                                             <button class="btn btn-success text-white btn-sm col-4"
                                                 title="Save"type="submit">
                                                 Save</button>
                                         </div>
                                     </div>
                                 </div>
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
