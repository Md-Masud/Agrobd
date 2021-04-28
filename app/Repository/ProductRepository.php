<?php


namespace App\Repository;


use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class ProductRepository
{
    public  function getProductOfIndex()
    {
        $user_id=Auth::id();
        return $posts=Product::where('user_id',$user_id)->get();
    }
    public  function  createProduct($request)
    {
        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price=$request->price;
        if($request->file('picture'))
        {
            $file=$request->file('picture');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->picture->move('uploads/pictures/',$filename);
            $product->picture=$filename;
        }
        $product->body = $request->body;
        if(isset($request->is_approved))
        {
            $product->is_approved = true;
        }else {
            $product-> is_approved= false;
        }
        $product->category()->associate($request->category_id);
        $product->save();
        return $product;
    }
    public  function  getProductId($id)
    {
        return $product=Product::find($id);
    }
    public function  updateProduct($id,$request)
    {
        $product =Product::find($id);
        $product->user_id = Auth::id();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price=$request->price;
        if($request->file('picture'))
        {
            $file=$request->file('picture');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->picture->move('uploads/pictures/',$filename);
            $product->picture=$filename;
        }
        $product->body = $request->body;
        if(isset($request->is_approved))
        {
            $product->is_approved = true;
        }else {
            $product-> is_approved= false;
        }
        $product->category()->associate($request->category_id);
        $product->save();
        return $product;
    }
    public  function  deleteProduct($id)
    {
        return $this->getProductId($id)->delete();
    }
    public  function ProductOfIndex()
    {

        return $product=Product::paginate(5);
    }
    public  function ProductOfLatest()
    {

        return $product=Product::latest()->get();
    }

}
