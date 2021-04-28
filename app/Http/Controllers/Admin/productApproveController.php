<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class productApproveController extends Controller
{
    private $productRepository,$categoryRepository;
    public function  __construct( ProductRepository $productRepository,CategoryRepository $categoryRepository)
    {
        $this->productRepository=$productRepository;
        $this->categoryRepository=$categoryRepository;

    }
    public function index()
    {
        $products=$this->productRepository->ProductOfIndex();
        return view ('admin.productApprove.index',compact('products'));
    }

    public function edit($id)
    {
        $categories=$this->categoryRepository->getCategoryOfIndex();
        $product=$this->productRepository->getProductId($id);
        return view('admin.productApprove.edit',compact('product','categories'));
    }


    public function update( Request $updatePostRequset, $id)
    {
        try {
            $this->productRepository->updateProduct($id,$updatePostRequset);
            $this->setSuccessMessage('product Successfully Approve');
            return redirect()->back();
        } catch (Exception $e) {
            $this->setErrorMessage($e->getMessage());
        }
    }



}
