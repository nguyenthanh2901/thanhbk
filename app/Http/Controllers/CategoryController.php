<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getListProduct(Request $request)
    {
        $url = $request->segment(2);
        $url = preg_split('/(-)/i',$url);

        $products = Product::where("pro_active",Product::STATUS_PUBLIC);

        $cateProduct = [];
        if ($id  = array_pop($url))
        {
            $cateProduct = Category::find($id);

            $products->where('pro_category_id',$id);
        }

        if ($request->search)
        {
            $products->where('pro_name','like','%'.$request->search.'%');
        }


        if ($request->price)
        {
            $price = $request->price;
            switch ($price)
            {
                case '1':
                    $products->whereBetween('pro_price',[0,1000000]);
                    break;

                case '2':
                    $products->whereBetween('pro_price',[1000000,5000000]);
                    break;

                case '3':
                    $products->whereBetween('pro_price',[5000000,10000000]);
                    break;

                case '4':
                    $products->where('pro_price','>',10000000);
                    break;
            }
        }

        if ($request->orderby)
        {
            $orderby = $request->orderby;

            switch ($orderby)
            {
                case 'desc':
                    $products->orderBy('id','DESC');
                    break;

                case 'asc':
                    $products->orderBy('id','ASC');
                    break;

                case 'price_max':
                    $products->orderBy('pro_price','ASC');
                    break;

                case 'price_min':
                    $products->orderBy('pro_price','DESC');
                    break;
                default:
                    $products->orderBy('id','DESC');

            }
        }

        $products = $products->paginate(8);
        $categories = Category::where('c_active',Category::STATUS_PUBLIC)->get();
        $viewData = [
            'products'    => $products,
            'cateProduct' => $cateProduct,
            'query'       => $request->query(),
            'categories' => $categories,
        ];

        return view('product.index',$viewData);
    }
}
