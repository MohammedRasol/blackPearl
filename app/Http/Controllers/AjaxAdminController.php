<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductInfo;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Color;
use App\Models\MultiMedia;

class AjaxAdminController extends Controller
{


    public function saveProductInfo(Request $req)
    {
        $data = json_decode($req->data, true);
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[array_keys($value)[0]] = $value[array_keys($value)[0]];
        }
        $productInfo =  ProductInfo::find($req->id);
        $response["data"] = $productInfo->update($newData);
        $response["code"] = 200;
        return $response;
    }
    public function deleteProductInfo(Request $req)
    {
        $productInfo =  ProductInfo::find($req->id);
        $response["data"] = $productInfo->delete();
        $response["code"] = 200;
        return $response;
    }

    public function deleteProductImg(Request $req)
    {
        $multiMedia = MultiMedia::find($req->id);
        $response["data"] = $multiMedia->delete();
        $response["code"] = 200;
        return $response;
    }
    public function addProductInfo(Request $req)
    {
        $data = json_decode($req->data, true);
        $newData = [];
        foreach ($data as $key => $value) {
            $newData[array_keys($value)[0]] = $value[array_keys($value)[0]];
        }
        $newData["product_id"] = $req->proId;
        $productInfo =  Product::find($req->proId);
        $productInfo->productInfo()->insert($newData);
        $insertedId = ProductInfo::latest("id")->where("product_id", $req->proId)->first();
        $response["insertedId"] = $insertedId->id;
        $response["color"] = Color::find($newData["color_id"]);
        $response["data"] = $response;
        $response["code"] = 200;
        return $response;
    }

    public function addImage(Request $req)
    {
        $imageType = "";
        if ($req->imageType == "product")
            $imageType = Product::class;
        elseif ($req->imageType == "category")
            $imageType = Category::class;

        $file = $req->file('logo');
        $imageName = $file->getClientOriginalName();
        $imageName = explode(".", $imageName);
        $path = 'img/product/';
        $fileName = $imageName[0] . time() . "." . $imageName[1];
        $file->move($path, $fileName);
        $file =  $_FILES["logo"];
        $media = MultiMedia::create([
            "element_type" => $imageType,
            "element_id" => $req->id,
            "path" => $path . $fileName,
        ]);
        $data["data"]["id"] =  $media->id;
        $data["data"]["path"] = public_path($path . $fileName);
        $data["code"] = 200;
        return   $data;
    }
    public function getSubCategory(Request $req)
    {
        $data["data"] = SubCategory::where("category_id", $req->catId)->get();
        $data["code"] = 200;
        return $data;
    }
    public function activeProduct(Request $req)
    {
        $pro = Product::find($req->id);
        $pro->active = $req->data ? 1 : 0;
        $pro->save();

        if ($pro) {
            $data["data"] = "success";
            $data["code"] = 200;
        } else {
            $data["data"] = "Failed";
            $data["code"] = 204;
        }
        return $data;
    }


    public function addCategoryImage(Request $req)
    {

        $file = $req->file('logo');
        $imageName = $file->getClientOriginalName();
        $imageName = explode(".", $imageName);
        $path = 'img/product/';
        $fileName = $imageName[0] . time() . "." . $imageName[1];
        $file->move($path, $fileName);
        $file =  $_FILES["logo"];
        $media = MultiMedia::create([
            "element_type" => Category::class,
            "element_id" => $req->catId,
            "path" => $path . $fileName,
        ]);
        $data["data"]["id"] =  $media->id;
        $data["data"]["path"] = public_path($path . $fileName);
        $data["code"] = 200;
        return   $data;
    }
}
