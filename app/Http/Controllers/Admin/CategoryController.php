<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;
    public  function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository=$categoryRepository;

    }

    public function index()
    {
        $categories=$this->categoryRepository->getCategoryOfIndex();
        return view ('admin.category.index',compact('categories'));
    }

    public function create()
    {

        return view ('admin.category.create');

    }



    public function store(Request $request)
    {
        try {
            $this->categoryRepository->createCategory($request);
            $this->setSuccessMessage('Course Successfully Saved');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }

    public function edit($id)
    {

        $category=$this->categoryRepository->getCategory($id);
        return view ('admin.category.create',compact('category'));
    }

    public function update($id,Request $categoryRequest)
    {
        try {
            $this->categoryRepository->updateCategory($id,$categoryRequest);
            $this->setSuccessMessage('Course Successfully edit');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }


    public function destroy($id)
    {

        try {
            $this->categoryRepository->deleteCategory($id);
            $this->setSuccessMessage('Course Successfully  delete');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }

    }
}
