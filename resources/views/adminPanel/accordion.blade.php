@extends('layouts.adminPanel')
@section('title')
    Cards
@endsection

@section('content')
    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Accordion</li>
              </ol>
          </nav>
          <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
            <a class="btn btn-sm btn-primary" href="#"><i class="ri-add-circle-line align-bottom"></i> New Project</a>
            <a class="btn btn-sm btn-primary-faded ms-2" href="#"><i class="ri-settings-3-line align-bottom"></i> Settings</a>
            <a class="btn btn-sm btn-secondary-faded ms-2 text-body" href="#"><i class="ri-question-line align-bottom"></i> Help</a>
          </div>
          </div>
        </div>        <!-- / Breadcrumbs-->
        
        <!-- Content-->
        <section class="container-fluid">

            <!-- Page Title-->
            <h2 class="fs-4 mb-2">Accordion</h2>
            <p class="text-muted mb-4">Build vertically collapsing accordions in combination with Bootstrap's Collapse
                JavaScript plugin.</p>
            <!-- / Page Title-->

            <div class="row g-4">
                <div class="col-12 col-md-6">

                    <!-- Example-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title mb-2">Default example</h6>
                            <p class="text-muted small m-0 fw-bolder">Click the accordions below to expand/collapse the
                                accordion content.</p>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by
                                            default, until the collapse plugin adds the appropriate classes that we use
                                            to style each element. These classes control the overall appearance, as well
                                            as the showing and hiding via CSS transitions. You can modify any of this
                                            with custom CSS or overriding our default variables. It's also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by
                                            default, until the collapse plugin adds the appropriate classes that we use
                                            to style each element. These classes control the overall appearance, as well
                                            as the showing and hiding via CSS transitions. You can modify any of this
                                            with custom CSS or overriding our default variables. It's also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by
                                            default, until the collapse plugin adds the appropriate classes that we use
                                            to style each element. These classes control the overall appearance, as well
                                            as the showing and hiding via CSS transitions. You can modify any of this
                                            with custom CSS or overriding our default variables. It's also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Example-->

                </div>

                <div class="col-12 col-md-6">

                    <!--  Example-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title">Flush example</h6>
                        </div>
                        <div class="card-body">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is
                                            intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                            first item's accordion body.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is
                                            intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                            second item's accordion body. Let's imagine this being filled with some
                                            actual content.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is
                                            intended to demonstrate the <code>.accordion-flush</code> class. This is the
                                            third item's accordion body. Nothing more exciting happening here in terms
                                            of content, but just filling up the space to make it look, at least at first
                                            glance, a bit more representative of how this would look in a real-world
                                            application.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Example-->

                </div>
            </div>

            <!-- Footer -->
            <footer class="  footer">
                <p class="small text-muted m-0">All rights reserved | © 2021</p>
                <p class="small text-muted m-0">Template created by <a href="https://www.pixelrocket.store/">PixelRocket</a></p>
            </footer>
            
            
            <!-- Sidebar Menu Overlay-->
            <div class="menu-overlay-bg"></div>
            <!-- / Sidebar Menu Overlay-->
            
            <!-- Modal Imports-->
            <!-- Place your modal imports here-->
            
            <!-- Default Example Modal Import-->
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      Here goes modal body content
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Offcanvas Imports-->
            <!-- Place your offcanvas imports here-->
            
            <!-- Default Example Offcanvas Import-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                  <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div>
                    Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
                  </div>
                  <div class="dropdown mt-3">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
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
            <!-- Activity Offcanvas Import-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivity" aria-labelledby="offcanvasActivityLabel">
              <div class="offcanvas-header d-flex align-items-center justify-content-between">
                <h5 class="offcanvas-title" id="offcanvasActivityLabel">Activity</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="list-group list-group-flush">
            
                    <li class="list-group-item pt-0 pb-5 list-group-activity d-flex align-items-start">
                      <div class="avatar avatar-xs me-3 flex-shrink-0">
                        <picture>
                          <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-7.jpeg" alt="">
                        </picture>
                        <span class="avatar-dot bg-success"></span>
                      </div>
                      <div class="d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <p class="fw-semibold mb-0 me-3">John Doe</p>
                          <span class="small d-block text-muted fw-bolder">5m ago</span>
                        </div>
                        <span class="small d-block text-muted">Submitted quarterly marketing report for review.</span>
                          <div class="bg-light border rounded-md p-2 mt-2 d-flex justify-content-start align-items-start">
                            <div class="d-flex align-items-start me-3">
                              <i class="ri-file-word-line ri-2x lh-1 me-2 text-primary"></i>
                              <div>
                                <span class="d-block fw-bolder small">Year End Report</span>
                                <span class="text-muted d-block fs-xs">24KB</span>
                              </div>
                            </div>
                          </div>
                      </div>
                    </li>
                    <li class="list-group-item pt-0 pb-5 list-group-activity d-flex align-items-start">
                      <div class="avatar avatar-xs me-3 flex-shrink-0">
                        <picture>
                          <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-2.jpeg" alt="">
                        </picture>
                        <span class="avatar-dot bg-success"></span>
                      </div>
                      <div class="d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <p class="fw-semibold mb-0 me-3">Sally Field</p>
                          <span class="small d-block text-muted fw-bolder">1h ago</span>
                        </div>
                        <span class="small d-block text-muted">Marked project status as completed.</span>
                      </div>
                    </li>
                    <li class="list-group-item pt-0 pb-5 list-group-activity d-flex align-items-start">
                      <div class="avatar avatar-xs me-3 flex-shrink-0">
                        <picture>
                          <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-3.jpeg" alt="">
                        </picture>
                        <span class="avatar-dot bg-success"></span>
                      </div>
                      <div class="d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <p class="fw-semibold mb-0 me-3">Mark Robinson</p>
                          <span class="small d-block text-muted fw-bolder">2h ago</span>
                        </div>
                        <span class="small d-block text-muted">Created 2 new products in Mens Shoes</span>
                          <div class="bg-light border rounded-md p-2 mt-2 d-flex justify-content-start align-items-start">
                            <picture class="me-2">
                              <img class="f-w-12 rounded" src="./assets/images/1.png"
                                alt="">
                            </picture>
                            <picture>
                              <img class="f-w-12 rounded" src="./assets/images/3.png"
                                alt="">
                            </picture>
                          </div>
                      </div>
                    </li>
                    <li class="list-group-item pt-0 pb-5 list-group-activity d-flex align-items-start">
                      <div class="avatar avatar-xs me-3 flex-shrink-0">
                        <picture>
                          <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-4.jpeg" alt="">
                        </picture>
                        <span class="avatar-dot bg-success"></span>
                      </div>
                      <div class="d-flex flex-column flex-grow-1">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                          <p class="fw-semibold mb-0 me-3">Jeffrey Way</p>
                          <span class="small d-block text-muted fw-bolder">6h ago</span>
                        </div>
                        <span class="small d-block text-muted">Set user status as &#x27;offline&#x27;</span>
                      </div>
                    </li>
            
                </ul>
                <a href="#" class="btn btn-outline-secondary btn-sm text-body d-flex align-items-center justify-content-center py-3 mb-4">
                  <span class="f-w-4 text-muted d-block me-2">
                    <svg class="w-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                </span>
                  View All Activity
                </a>
              </div>
            </div>
            <!-- Message Offcanvas Import-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMessage" aria-labelledby="offcanvasMessageLabel">
                <div class="offcanvas-header position-relative">
                  <div class="d-flex flex-column w-100">
                    <h5 class="offcanvas-title mb-3" id="offcanvasMessageLabel">Company Meetup</h5>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="avatar-group me-4">
                        <picture class="avatar-group-img">
                            <img class="f-w-10 rounded-circle" src="./assets/images/profile-small.jpeg"
                            alt="HTML Bootstrap Admin Template by Pixel Rocket">
                        </picture>
                        <picture class="avatar-group-img">
                            <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-2.jpeg"
                            alt="HTML Bootstrap Admin Template by Pixel Rocket">
                        </picture>
                        <picture class="avatar-group-img">
                            <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-3.jpeg"
                            alt="HTML Bootstrap Admin Template by Pixel Rocket">
                        </picture>
                        <picture class="avatar-group-img">
                            <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-4.jpeg"
                            alt="HTML Bootstrap Admin Template by Pixel Rocket">
                        </picture>
                        <span class="small fw-bolder ms-2 text-muted opacity-90">+ 12 others</span>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle dropdown-toggle-icon p-0" type="button"
                            id="dropdownTop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ri-settings-3-line text-muted ri-lg"></i>
                        </button>
                        <ul class="dropdown-menu dropdown" aria-labelledby="dropdownTop">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                    </div>
                  </div>
                  <button type="button" class="btn-close text-reset position-absolute top-20 end-5" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body h-100 d-flex justify-content-between flex-column pb-0">
                  <div class="overflow-auto py-4">
                    <div class="overflow-hidden">
                      <!-- Messages-->
                      <div class="d-flex align-items-end justify-content-start mb-4 flex-wrap">
                          <div class="avatar avatar-xs me-3 flex-shrink-0">
                              <picture>
                                  <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-4.jpeg"
                                  alt="HTML Bootstrap Admin Template by Pixel Rocket">
                              </picture>
                              <span class="avatar-dot bg-success"></span>
                          </div>
                          <div class="d-flex justify-content-start flex-column align-items-start col">
                              <small class="text-muted fs-xs fw-bolder"><span class="fw-bold">Patrick Johnson</span> &middot; 2 mins ago</small>
                              <div class="bg-light p-3 mt-2 rounded-t-s-4 rounded-t-e-4 rounded-b-e-4">
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                              </div>
                          </div>
                      </div>          <div class="d-flex align-items-end justify-content-start mb-4 flex-wrap">
                          <div class="d-flex justify-content-end flex-column align-items-end col">
                              <small class="text-muted fs-xs fw-bolder"><span class="fw-bold">You</span> &middot; 5 mins ago</small>
                              <div class="bg-primary text-white p-3 mt-2 rounded-t-s-4 rounded-t-e-4 rounded-b-s-4">
                                  Maecenas aliquet eu felis vel.
                              </div>
                          </div>
                          <div class="avatar avatar-xs ms-3 flex-shrink-0">
                              <picture>
                                  <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-3.jpeg"
                                  alt="HTML Bootstrap Admin Template by Pixel Rocket">
                              </picture>
                              <span class="avatar-dot bg-success"></span>
                          </div>
                      </div>          <div class="d-flex align-items-end justify-content-start mb-4 flex-wrap">
                          <div class="avatar avatar-xs me-3 flex-shrink-0">
                              <picture>
                                  <img class="f-w-10 rounded-circle" src="./assets/images/profile-small-4.jpeg"
                                  alt="HTML Bootstrap Admin Template by Pixel Rocket">
                              </picture>
                              <span class="avatar-dot bg-success"></span>
                          </div>
                          <div class="d-flex justify-content-start flex-column align-items-start col">
                              <small class="text-muted fs-xs fw-bolder"><span class="fw-bold">Patrick Johnson</span> &middot; 25 mins ago</small>
                              <div class="bg-light p-3 mt-2 rounded-t-s-4 rounded-t-e-4 rounded-b-e-4">
                                  Cras sit amet gravida augue.
                              </div>
                          </div>
                      </div>          <!-- / Messages-->
                    </div>
                  </div>
                  <div class="border-top p-4 mx-n3">
                    <div class="d-flex flex-column align-items-end">
                      <input type="text" class="form-control d-flex w-100 bg-light border-0 text-muted mb-3" placeholder="Add new message...">
                      <div class="d-flex justify-content-between w-100 align-items-center">
                        <i class="ri-attachment-line text-muted ri-lg"></i>
                        <button class="btn btn-sm btn-primary">Send</button>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>            <!-- / Footer-->

        </section>
        <!-- / Content-->

    </main>
    <!-- /Page Content -->
@endsection
 