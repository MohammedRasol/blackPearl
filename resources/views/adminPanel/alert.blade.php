 @extends('layouts.adminPanel')
@section('title')
    Cards
@endsection

@section('content')
    <!-- Page Content -->
    <main id="main">

        <!-- Breadcrumbs-->
        <div class="bg-white border-bottom py-3 mb-5">
          <div class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Alert</li>
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
            <h2 class="fs-4 mb-2">Alert</h2>
            <p class="text-muted mb-4">Provide contextual feedback messages for typical user actions with the handful of
                available and flexible alert messages.</p>
            <!-- / Page Title-->

            <div class="row g-4">
                <div class="col-12 col-md-6">

                    <!-- Basic Alert Examples-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title">Basic examples</h6>
                            <p class="text-muted m-0 small">Alerts are available for any length of text, as
                                well as an optional close button.</p>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                                A simple primary alert—check it out!
                            </div>
                            <div class="alert alert-secondary" role="alert">
                                A simple secondary alert—check it out!
                            </div>
                            <div class="alert alert-success" role="alert">
                                A simple success alert—check it out!
                            </div>
                            <div class="alert alert-danger" role="alert">
                                A simple danger alert—check it out!
                            </div>
                            <div class="alert alert-warning" role="alert">
                                A simple warning alert—check it out!
                            </div>
                            <div class="alert alert-info" role="alert">
                                A simple info alert—check it out!
                            </div>
                            <div class="alert alert-light" role="alert">
                                A simple light alert—check it out!
                            </div>
                            <div class="alert alert-dark" role="alert">
                                A simple dark alert—check it out!
                            </div>
                        </div>
                    </div>
                    <!-- / Basic Alert Examples-->

                    <!-- Faded Alert Examples-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title">Faded background examples <span
                                    class="ms-1 badge rounded-pill bg-success-faded text-success">Custom</span></h6>
                            <p class="text-muted m-0 small">Custom styling for a faded alert variant.</p>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-primary-faded" role="alert">
                                A simple primary alert—check it out!
                            </div>
                            <div class="alert alert-secondary-faded" role="alert">
                                A simple secondary alert—check it out!
                            </div>
                            <div class="alert alert-success-faded" role="alert">
                                A simple success alert—check it out!
                            </div>
                            <div class="alert alert-danger-faded" role="alert">
                                A simple danger alert—check it out!
                            </div>
                            <div class="alert alert-warning-faded" role="alert">
                                A simple warning alert—check it out!
                            </div>
                            <div class="alert alert-info-faded" role="alert">
                                A simple info alert—check it out!
                            </div>
                            <div class="alert alert-dark-faded" role="alert">
                                A simple dark alert—check it out!
                            </div>
                        </div>
                    </div>
                    <!-- / Faded Alert Examples-->

                </div>

                <div class="col-12 col-md-6">

                    <!-- Additional Content Example-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title">Additional content example</h6>
                            <p class="text-muted m-0 small">Alerts can also contain additional HTML elements like
                                headings, paragraphs and dividers.</p>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Well done!</h4>
                                <p>Aww yeah, you successfully read this important alert message. This example text is
                                    going to run a bit longer so that you can see how spacing within an alert works with
                                    this kind of content.</p>
                                <hr>
                                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things
                                    nice and tidy.</p>
                            </div>
                        </div>
                    </div>
                    <!-- / Additional Content Example-->

                    <!-- Icon Example-->
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Icon examples</h6>
                            <p class="text-muted m-0 small">Similarly, you can use flexbox utilities and Bootstrap Icons
                                to create alerts with icons. Depending on your icons and content, you may want to add
                                more utilities or custom styles.</p>
                        </div>
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                </symbol>
                                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                                </symbol>
                                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </symbol>
                            </svg>

                            <div class="alert alert-primary d-flex align-items-center mb-4" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                    <use xlink:href="#info-fill" /></svg>
                                <div>
                                    An example alert with an icon
                                </div>
                            </div>
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" /></svg>
                                <div>
                                    An example success alert with an icon
                                </div>
                            </div>
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                    aria-label="Warning:">
                                    <use xlink:href="#exclamation-triangle-fill" /></svg>
                                <div>
                                    An example warning alert with an icon
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- / Icon Example-->

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
 