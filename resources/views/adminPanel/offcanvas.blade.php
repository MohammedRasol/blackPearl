@extends('layouts.adminPanel')
@section('title')
    Cards
@endsection

@section('content')
    <!-- Page Content -->
    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Offcanvas</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                    <a class="btn btn-sm btn-primary" href="#"><i class="ri-add-circle-line align-bottom"></i> New
                        Project</a>
                    <a class="btn btn-sm btn-primary-faded ms-2" href="#"><i
                            class="ri-settings-3-line align-bottom"></i>
                        Settings</a>
                    <a class="btn btn-sm btn-secondary-faded ms-2 text-body" href="#"><i
                            class="ri-question-line align-bottom"></i>
                        Help</a>
                </div>
            </div>
        </div> <!-- / Breadcrumbs-->

        <!-- Content-->
        <section class="container-fluid">

            <!-- Page Title-->
            <h2 class="fs-4 mb-2">Offcanvas</h2>
            <p class="text-muted mb-4">Build hidden sidebars into your project for navigation, shopping carts, and more.
            </p>
            <!-- / Page Title-->

            <div class="row g-4">
                <div class="col-12 col-md-6">

                    <!-- Example-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title">Default example</h6>

                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary mb-2" data-bs-toggle="offcanvas" href="#offcanvasExample"
                                role="button" aria-controls="offcanvasExample">
                                Link with href
                            </a>
                            <button class="btn btn-primary mb-2" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                Button with data-bs-target
                            </button>
                        </div>
                    </div>
                    <!-- /Example-->

                </div>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div>
                        Some text as placeholder. In real life you can have the elements you have chosen. Like, text,
                        images, lists,
                        etc.
                    </div>
                    <div class="dropdown mt-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown">
                            Dropdown button
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </div>
            </div>


        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->
@endsection
