              <div class="offcanvas offcanvas-end" tabindex="-1" id="en-drawer" aria-labelledby="color-label-en">
                <div class="offcanvas-header" id="color-label-bg">
                    <h5 class="offcanvas-title" id="color-label"></h5>
                    <button type="button" class="btn-close text-reset"style="margin-left:0;"
                        data-bs-dismiss="offcanvas" aria-label="Close" id="close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="dropdown mt-3">
                        <form action="">
                            @csrf
                            <div class="mb-3">
                                <label for="product-name" class="form-label">Product Size</label>
                                <input type="text" class="form-control" id="size" placeholder="Product Size">
                            </div>
                            <div class="mb-3">
                                <label for="product-name" class="form-label">Product QTY</label>
                                <input type="text" class="form-control" id="qty" placeholder="Product QTY">
                            </div>
                            <input class="form-check-input  " name="color" type="radio" id="color">
                            <label class="form-check-label" for="color" id="color-check-label"></label>

                            <div class="row" id="colors-main-div">
                                <label class="form-check-label" for="color" id="color-check-label">Colors</label>
                                @foreach ($colors as $color)
                                    <div class="col-2">
                                        <input class="form-check-input m-1" value="{{ $color->id }}"
                                            style="background-color:{{ $color->hex }}" name="color" type="radio"
                                            id="color-check-en-{{ $color->id }}">
                                        <label class="form-check-label"
                                            for="color-check-en-{{ $color->id }}">{{ $color->name_en }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <center>
                                <br>
                                <div class="spinner-border  text-success" id="loading-product-info" role="status">
                                    <span class="sr-only text-success">Loading...</span>
                                </div>
                            </center>
                            <button type="button" class="btn btn-success w-100 text-white actions-btn"
                                id="save-product-info" onclick="saveProductInfo()">
                                <b>Save</b>
                            </button>
                            <button type="button" class="btn btn-danger w-100 text-white mt-3 actions-btn"
                                id="delete-product-info" onclick="deleteProductInfo()">
                                <b>Delete</b>
                            </button>
                        </form>
                    </div>
                </div>
            </div>   