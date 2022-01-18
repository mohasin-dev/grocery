<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Zone;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\CallToAction;
use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    /**
     *
     *
     * @param $request
     */
    public function index(Request $request)
    {
        // return $request->zone_id;
        // return $request->;
        // if (! session('start_time')) {
        //     session()->put('start_time', time());
        // } else if (time() - session('start_time') > 1800) {
        //     session()->forget('compare');
        // }
        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];

        if ($request->zone_id) {
            $categories = Category::with(['products.currency', 'products.store' => function ($q) use ($request) {
                $q->find($request->zone_id);
            }])->limit(12)->get();
        } else {
            $categories = Category::with('products.store', 'products.currency')->limit(12)->get();
        }


        $sliders = Banner::where('status', 1)->get() ?? [];
        $callToActions = CallToAction::all();
        $zones = Zone::all() ?? [];
        // $zones = Zone::find(1);

        // return $zones;

        return view('frontend.index', compact('categories', 'compareProduct', 'sliders', 'callToActions', 'zones'));
    }

    /**
     *
     *
     * @param $id
     */
    public function productDetails($id)
    {
        $productsRating = ProductRating::all();

        $product = Product::with('store', 'currency', 'category.products', 'brand', 'unit')->findOrFail($id);
        return view('frontend.product-details', compact('product','productsRating'));
    }

    public function productRating(Request $request, $id)
    {
        //   return  $request;
        $request->validate([
            'rating'     => 'required',
        ]);

        $product = $request->all();

        $productRating = ProductRating::where('user_id', auth()->id())->where('product_id', $id)->first();

        if ( !auth()->id() ) {
            return back()->with('error', 'Please log in first.');
        }

        if ($productRating) {
            return back()->with('error', 'You already product rated this product.');
        }


        $product['user_id'] = auth()->id();
        $product['product_id'] = $id;

        ProductRating::create($product);

        return back()->with('success', 'Product rating and commented successfully');
    }

    /**
     *
     * @param $id
     */
    public function categoryDetails($id)
    {
        $category = Category::with('products.store', 'products.currency')->findOrFail($id);
        return view('frontend.category', compact('category'));
    }

    public function search()
    {
        $query = request('search');
        $category_id = request('category_id');

        $products = Product::with('store', 'currency', 'category.products', 'brand', 'unit')
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('excerpt', 'like', '%' . $query . '%')
            ->orWhere('category_id', $category_id)
            ->get();

        return view('frontend.search', compact('products', 'query'));
    }
}
