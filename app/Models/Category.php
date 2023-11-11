<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['title','slug','summary','photo','status','is_parent','parent_id','added_by'];

    public function parent_info(){
        return $this->hasOne('App\Models\Category','id','parent_id');
    }
    public static function getAllCategory(){
        return  Category::orderBy('id','DESC')->with('parent_info')->get();
    }

    public static function shiftChild($cat_id){
        return Category::whereIn('id',$cat_id)->update(['is_parent'=>1]);
    }
    public static function getChildByParentID($id){
        return Category::where('parent_id',$id)->orderBy('id','ASC')->pluck('title','id');
    }

    public function child_cat(){
        return $this->hasMany('App\Models\Category','parent_id','id')->where('status','active');
    }
    public static function getAllParentWithChild(){
        return Category::with('child_cat')->where('is_parent',1)->where('status','active')->orderBy('title','ASC')->get();
    }
    public function products(){
        return $this->hasMany('App\Models\Product','cat_id','id')->where('status','active');
    }
    public function sub_products(){
        return $this->hasMany('App\Models\Product','child_cat_id','id')->where('status','active');
    }
    public static function getProductByCat($req){





        // return Category::with(['products' => function($query) use ($req) {
        //     if (!empty($req->minPrice) && !empty($req->maxPrice)) {
        //         $query->whereBetween('price', [$req->minPrice, $req->maxPrice]);
        //     }

        //     if(!empty($req->sortBy)){
        //         if($req->sortBy=='title-asc'){
        //             $query->orderBy('title','ASC');
        //         }
        //         if($req->sortBy=='title-des'){
        //             $query->orderBy('title','DESC');
        //         }
        //         if($req->sortBy=='price-asc'){
        //             $query->orderBy('price','ASC');
        //         }
        //         if($req->sortBy=='price-des'){
        //             $query->orderBy('price','DESC');
        //         }
        //     }

        //     $perPage = !empty($req->show) ? $req->show : 12;

        //     $query->paginate($perPage);

        // }])
        // ->where('slug', $req->slug)
        // ->get();


        // dd($products);





        $perPage = !empty($req->show) ? $req->show : 12;

        return Category::with(['products' => function($query) use ($req) {
            if (!empty($req->minPrice) && !empty($req->maxPrice)) {
                $query->whereBetween('price', [$req->minPrice, $req->maxPrice]);
            }

            if(!empty($req->sortBy)){
                if($req->sortBy=='title-asc'){
                    $query->orderBy('title','ASC');
                }
                if($req->sortBy=='title-des'){
                    $query->orderBy('title','DESC');
                }
                if($req->sortBy=='price-asc'){
                    $query->orderBy('price','ASC');
                }
                if($req->sortBy=='price-des'){
                    $query->orderBy('price','DESC');
                }
            }
        }])
        ->where('slug', $req->slug)
        ->first()
        ->products()
        ->where('status','active')
        ->paginate($perPage);
    }
    public static function getProductBySubCat($slug){
        // return $slug;
        return Category::with('sub_products')->where('slug',$slug)->first();
    }
    public static function countActiveCategory(){
        $data=Category::where('status','active')->count();
        if($data){
            return $data;
        }
        return 0;
    }
    // public function countProductsInCat() {
    //     return $this->hasMany('App\Models\Product', 'cat_id', 'id')->where('status', 'active');
    // }
    public function activeProductsInCategory() {
        return $this->hasMany('App\Models\Product', 'cat_id', 'id')->where('status', 'active');
    }
    public static function getAllCategoriesWithCount() {
        $data = Category::withCount('activeProductsInCategory')->get();
        return $data;
    }

}
