var productInfoId = 0;
function getProductInfo(id = 0) {
    productInfoId = id;
    var size = $("#size");
    $("#colors-main-div").hide();
    var qty = $("#qty");
    var color = $("#color");
    var colorLabel = $("#color-label");
    var colorLabelBg = $("#color-label-bg");
    var loading = $("#loading-product-info");
    var actionsBtn = $(".actions-btn");
    var colorCheckLabel = $("#color-check-label");
    var saveBtn = $("#save-product-info");
    saveBtn.attr("onclick", "saveProductInfo()");
    actionsBtn.hide();
    colorLabelBg.css('background-color', "white");
    colorLabel.html("Loading...");
    colorLabelBg.css('color', "black");
    loading.show();
    color.css('background-color', "white");
    color.css('color', "white");
    color.prop("checked", "true");
    colorCheckLabel.html("");
    size.val("");
    qty.val("");
    color.val("");
    $.ajax({
        type: 'get',
        url: '/ajax/admin/get-product-info/' + id,
        success: function (data) {
            loading.hide("fast", function () {
                if (data.code == 200) {
                    size.val(data.data.size);
                    qty.val(data.data.qty);
                    colorLabel.html(data.data.color.name_en);
                    color.val(data.data.color.id);
                    colorLabelBg.css('background-color', data.data.color.hex);
                    colorLabelBg.css('color', "white");
                    color.css('background-color', data.data.color.hex);
                    color.css('color', "white");
                    color.prop("checked", "true");
                    color.show();
                    colorLabelBg.show();
                    colorCheckLabel.html(data.data.color.name_en);
                    colorCheckLabel.show();

                    actionsBtn.show();
                }
            });
        }
    });
}
function showProductInfo(proId) {
    productInfoId = 0;
    $("#colors-main-div").show();
    var size = $("#size");
    var qty = $("#qty");
    var color = $("#color");
    var colorLabel = $("#color-label");
    var colorLabelBg = $("#color-label-bg");
    var loading = $("#loading-product-info");
    var colorCheckLabel = $("#color-check-label");
    var saveBtn = $("#save-product-info");
    $("#delete-product-info").hide();
    saveBtn.attr("onclick", "addProductInfo(" + proId + ")");
    colorLabelBg.css('background-color', "white");
    colorLabel.html("Add New Specification");
    colorLabelBg.css('color', "black");
    loading.hide();
    color.hide();
    colorCheckLabel.hide();
    size.val("");
    qty.val("");
    color.val("");
}
function addProductInfo(proId) {

    var loading = $("#loading-product-info");
    var size = $("#size");
    var qty = $("#qty");
    var CSRF_TOKEN = $('input[name="_token"]');
    var color_id = $('input[name="color"]:checked').val();
    var jsonData = [];
    jsonData.push({ "size": size.val() });
    jsonData.push({ "qty": qty.val() });
    jsonData.push({ "color_id": color_id });
    var colorDiv = $("#colors-div");
    $.ajax({
        type: 'POST',
        url: '/ajax/admin/add-product-info/' + proId,
        data: { _token: CSRF_TOKEN.val(), data: JSON.stringify(jsonData) },
        success: function (data) {
            loading.hide("fast", function () {
                if (data.code == 200) {
                    colorDiv.append("<button class='btn color-btn' id='color-element-" + data.insertedId + "' style='background-color:" + data.color.hex + "'" +
                        " data-bs-toggle='offcanvas' href='#en-drawer' role='button' onclick='getProductInfo(" + data.insertedId + ")'"
                        + "aria-controls='color-1' title='" + color.name_en + "'></button>");
                    $("#close").click();
                }
            });
        }
    });
}
function getSubCategory(catId) {
    var CSRF_TOKEN = $('input[name="_token"]');
    $.ajax({
        type: 'GET',
        url: '/ajax/admin/get-sub-category/' + catId,
        data: { _token: CSRF_TOKEN.val() },
        success: function (data) {
            if (data.data.length != 0) {
                var options = "";
                data.data.forEach(function (item, index) {
                    options += "<option value='" + item.id + "'>" + item.name_en + "</option>";
                });
                $("#product-sub-category").html(options);
            }else
            $("#product-sub-category").html("<option value=''>Sub Category</option>");

        }
    });
}
function saveProductInfo() {
    var loading = $("#loading-product-info");
    var size = $("#size");
    var qty = $("#qty");
    var CSRF_TOKEN = $('input[name="_token"]');
    var jsonData = [];
    jsonData.push({ "size": size.val() });
    jsonData.push({ "qty": qty.val() });
    $.ajax({
        type: 'POST',
        url: '/ajax/admin/save-product-info/' + productInfoId,
        data: { _token: CSRF_TOKEN.val(), data: JSON.stringify(jsonData) },
        success: function (data) {
            loading.hide("fast", function () {
                if (data.code == 200) {
                    $("#close").click();
                }
            });
        }
    });
}
function deleteProductInfo() {
    var CSRF_TOKEN = $('input[name="_token"]');

    $.ajax({
        type: 'delete',
        url: '/ajax/admin/delete-product-info/' + productInfoId,
        data: { _token: CSRF_TOKEN.val() },
        success: function (data) {
            $("#close").click();
            $("#color-element-" + productInfoId).remove();
        }
    });
}
function showImage(path) {
    $("#img-show").attr("src", path);
}
function deleteImage(id) {
    if (confirm("Delete Img ?")) {
        var CSRF_TOKEN = $('input[name="_token"]');
        $.ajax({
            type: 'delete',
            url: '/ajax/admin/delete-product-img/' + id,
            data: { _token: CSRF_TOKEN.val() },
            success: function (data) {
                $("#image-" + id).remove();
                $("#modal-close").click();
            }
        });
    }
}

function selectImage(inputFile) {
    $("#" + inputFile).click();
}

var image = "";
function showPreViewImage(previewImg, elemntId) {
    if (previewImg.files.length > 0)
        image = previewImg;

    const [file] = previewImg.files
    if (file) {
        $("#" + elemntId).attr("src", URL.createObjectURL(file));
    }
}

function saveImage(inputId, proId, isLogo = 0) {

    var CSRF_TOKEN = $('input[name="_token"]');
    var formData = new FormData()
    formData.append("_token", CSRF_TOKEN.val());
    formData.append("logo", image.files[0]);
    formData.append("imageType", $("#image-type").val());
    $.ajax({
        url: '/ajax/admin/add-image/' + proId,
        method: 'POST',
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var body = "<div class='col-md-3 border' id ='image-" + data.data.id + "' dir = 'rtl' >" +
                "<div class='thumbnail'><a type='button' class='text-danger large-text' onclick='deleteImage(  " + data.data.id + " )'>" +
                "<i class='fa-solid fa-circle-minus'></i></a><a type='button' class='text-primary large-text' data-bs-toggle='modal' onclick='showImage( " + data.data.path + " )' data-bs-target='#showImg'>" +
                "<i class='fa-solid fa-maximize'></i> </a>";
            if ($("#image-type").val() != "user")
                body += "<div class='form-check form-switch' style='float: left'><input class='form-check-input ' type='radio' value='" + data.data.id + "' required name='logo' id='active'>logo</div>";
            body += "<img  id ='img-" + data.data.id + "'   alt='Lights' style='max-width:250px;' class='product-image'><div class='caption text-center'><center> </center></div></div></div >";
            if ($("#image-type").val() == "user")
                $("#images-div").html(body);
            else
                $("#images-div").append(body);
            const [file] = document.getElementById(inputId).files;
            if (file) {
                $('#img-' + data.data.id).attr("src", URL.createObjectURL(file));
            }
            $("#close").click();

        },

    });
}

function activeProduct(element, proId) {

    var CSRF_TOKEN = $('input[name="_token"]');
    $.ajax({
        type: 'POST',
        url: '/ajax/admin/active-product/' + proId,
        data: { _token: CSRF_TOKEN.val(), data: element.checked ? 1 : 0 },
        success: function (data) {
            $("#close").click();
            $("#color-element-" + productInfoId).remove();
        }
    });
}

function activeCategory(element, proId) {

    var CSRF_TOKEN = $('input[name="_token"]');
    $.ajax({
        type: 'POST',
        url: '/ajax/admin/active-category/' + proId,
        data: { _token: CSRF_TOKEN.val(), data: element.checked ? 1 : 0 },
        success: function (data) {
            $("#close").click();
            $("#color-element-" + productInfoId).remove();
        }
    });
}

function activeUser(element, userId) {
    var CSRF_TOKEN = $('input[name="_token"]');
    $.ajax({
        type: 'POST',
        url: '/ajax/admin/active-user/' + userId,
        data: { _token: CSRF_TOKEN.val(), data: element.checked ? 1 : 0 },
        success: function (data) {
            $("#close").click();
            $("#color-element-" + productInfoId).remove();
        }
    });
}
