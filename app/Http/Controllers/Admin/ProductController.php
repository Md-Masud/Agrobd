<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository,$categoryRepository;
    public function  __construct( ProductRepository $productRepository,CategoryRepository $categoryRepository)
    {
        $this->productRepository=$productRepository;
        $this->categoryRepository=$categoryRepository;

    }
    public function index()
    {
        $products=$this->productRepository->getProductOfIndex();
        return view ('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories=$this->categoryRepository->getCategoryOfIndex();
        return view('admin.product.create',compact('categories'));
    }


    public function store(Request $storePostRequest)
    {
        try {
            $this->productRepository->createProduct($storePostRequest);
            $this->setSuccessMessage('product Successfully Saved');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }


    public function edit($id)
    {
        $categories=$this->categoryRepository->getCategoryOfIndex();
        $product=$this->productRepository->getProductId($id);
        return view('admin.product.edit',compact('product','categories'));
    }


    public function update( Request $updatePostRequset, $id)
    {
        try {
            $this->productRepository->updateProduct($id,$updatePostRequset);
            $this->setSuccessMessage('product Successfully Update ');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $this->productRepository->deleteProduct($id);
            $this->setSuccessMessage('product Successfully delete');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }
}
