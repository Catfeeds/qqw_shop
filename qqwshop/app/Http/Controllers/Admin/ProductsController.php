<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;

use App\Models\Admin\Goods_brand;
use App\Models\Admin\Goods_categorie;


class ProductsController extends Controller
{
    public function goods_manage(){
        return view("admin.products.products_list");
    }
    public function brand_manage(){
        $brand = Goods_brand::paginate(10);
       
        return view("admin.products.brand_manage",[
            'brand'=>$brand,
        ]);
    }
    public function category_manage(){
        $goods_categorie = Goods_categorie::list();
        return view("admin.products.category_manage",[
            'goods_categorie'=>$goods_categorie,
        ]);
    }
    public function add(){
        return view("admin.products.products_add");
    }
    public function brand_create(){
        return view("admin.products.add_brand");
    }
    public function brand_store(BrandRequest $req){

        $status = Goods_brand::add($req);
        if($status){
            return redirect()->route('admin.brand.manage')->with('tips','添加成功!');
        }else{
            return back()->with('tips','账号或密码错误');
        }
    }
    public function category_create(){
        $category = Goods_categorie::list();
        
        return view("admin.products.add_category",[
            'category'=>$category,
        ]);
    }
    public function category_store(Request $req){
        $status = Goods_categorie::add_cate($req);

        if($status['error']){
            return redirect()->route('admin.category.create')->with('tips',$status['message']);
        }
        return redirect()->route('admin.category.manage')->with('tips','添加成功!');
    }

}
