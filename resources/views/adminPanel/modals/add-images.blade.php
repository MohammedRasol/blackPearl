<div class="offcanvas offcanvas-end" tabindex="-1" id="add-images" aria-labelledby="color-label-en">
    <form id="logo-imaeg-form">

        <div class="offcanvas-header" id="color-label-bg">
            <h5 class="offcanvas-title" id="color-label"></h5>
            <button type="button" class="btn-close text-reset"style="margin-left:0;" data-bs-dismiss="offcanvas"
                aria-label="Close" id="close"></button>
        </div>
        <div class="offcanvas-body">
            <input type="hidden" id="token">
            <div class="dropdown mt-3">
                <input type="file" class="d-none" id="main-image" name="logo"
                    accept="image/png, image/gif, image/jpeg" onchange="showPreViewImage(this,'logo-tmp')">
                <center>
                    <div style="height: 200px;">
                        <label for="logo">
                            <img src="{{ asset('adminPanel/images/upload.png') }}" width="200" alt=""
                                id="logo-tmp">
                        </label>
                    </div>
                </center>
                <br>
                <center>
                    <button id="logo" class="btn btn-primary" onclick="selectImage('main-image','logo-tmp')"
                        type="button"> Pick
                        Image</button>
                </center>
                <br>
                <center>
                    <button id="logo" class="btn btn-success text-white" type="button"
                        onclick="saveImage('main-image',@if (isset($category->id)) {{ $category->id }} @elseIf(isset($product->id)){{ $product->id }} @endIf )">
                        Save Image</button>
                </center>
            </div>
        </div>
    </form>
</div>
