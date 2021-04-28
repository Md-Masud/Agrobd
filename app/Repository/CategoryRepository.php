<?php


namespace App\Repository;


use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository
{
    public  function getCategoryOfIndex()
    {
        return $category=Category::all();
    }
    public  function  createCategory($request)
    {
        $category= new Category();
        $category->name = $request->name;
        $category->slug=Str::slug($request->name);
        $category->save();
        return $category;
    }
    public  function  getCategory($id)
    {
        return $category=Category::find($id);
    }
    public function  updateCategory($id,$request)
    {

        $category= Category::find($id);

        $category->name = $request->name;
        $category->slug=Str::slug($request->name);
        $category->save();
        return $category;

    }
    public  function  deleteCategory($id)
    {
        return $this->getCategory($id)->delete();
    }
}
