<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepository;
    public function  __construct(ProductRepository $productRepository)
    {
        $this->productRepository=$productRepository;
    }

    public  function index()
    {
        $productsLatest=$this->productRepository->ProductOfLatest();

        $products=$this->productRepository->ProductOfIndex();
        return view('index',compact('products','productsLatest'));
    }
    public  function  show($id)
    {
        $products=$this->productRepository->ProductOfIndex();
        $product=$this->productRepository->getProductId($id);
        return view('deteils',compact('product','products'));
    }
    public function  allProduct()
    {
        $products=$this->productRepository->ProductOfIndex();
        return view('all_product',compact('products',));


    }

}
