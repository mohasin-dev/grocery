<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Zone;
use App\Models\Store;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\CallToAction;
use Illuminate\Http\Request;
use App\Models\ProductRating;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    /**
     *
     * @param $request
     */
    public function index(Request $request)
    {
        // return $request;

        if (env('APP_NAME') == '') {
            return view('start');
        }

        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];

        if ($request->zone_id) {
            $vendor_ids = Store::where('zone_id', $request->zone_id)->pluck('id');

            $categoryProducts = Category::with(['products.store', 'products.currency', 'products.images', 'products.ratings', 'products' => function ($query) use ($vendor_ids) {
                $query->whereIn('store_id', $vendor_ids);
            }
            ])->limit(10)->get();

            // return $categoryProducts;
        } else {
            $categoryProducts = Category::with('products.store', 'products.currency', 'products.images', 'products.ratings')->limit(10)->get();
        }

        $sliders = Banner::where('status', 1)->get() ?? [];
        $callToActions = CallToAction::all();
        $zones = Zone::all() ?? [];

        if ($request->ajax()) {
            // return $request;
            return view('frontend.ajax.popular-product', compact('categoryProducts', 'compareProduct', 'sliders', 'callToActions', 'zones',));
        }

        return view('frontend.index', compact('categoryProducts', 'compareProduct', 'sliders', 'callToActions', 'zones',));
    }

    public function ajax(Request $request)
    {
        $query = request('search');
        $category_id = request('category_id') ?? null;
        $productIds = session('compare');
        $compareProduct = Product::find($productIds) ?? [];

        if ($request->zone_id) {
            $categoryProducts = Category::with(['products.currency', 'products.store' => function ($q) use ($request) {
                $q->find($request->zone_id);
            }]);
        } else {
            $categoryProducts = Category::with('products.store', 'products.currency');
        }

        $categoryProducts = $categoryProducts->whereHas('products', function ($q) use ($query, $category_id) {
            $q->where('name', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('excerpt', 'like', '%' . $query . '%');
        })
            ->when($category_id, function ($q) use ($category_id) {
                return $q->where('id', $category_id);
            })
            ->limit(10)->get();

        $sliders = Banner::where('status', 1)->get() ?? [];
        $callToActions = CallToAction::all();
        $zones = Zone::all() ?? [];
        $search = true;
        return view('frontend.home.home', compact('categoryProducts', 'compareProduct', 'sliders', 'callToActions', 'zones', 'search'));
    }

    /**
     * Product Details BY SLUG
     *
     * @param $slug
     */
    public function productDetails($slug)
    {
        $productsRating = ProductRating::all();

        $product = Product::with('store', 'currency', 'category.products', 'brand', 'unit')->whereSlug($slug)->firstOrFail();
        return view('frontend.product-details', compact('product', 'productsRating'));
    }

    // public function productDetailsTH()
    // {
    //     return view('frontend.product-detailsth');
    // }

    public function productRating(Request $request, $id)
    {
        //   return  $request;
        $request->validate([
            'rating'     => 'required',
        ]);

        $product = $request->all();

        $productRating = ProductRating::where('user_id', auth()->id())->where('product_id', $id)->first();

        if (!auth()->id()) {
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
     *  Get all the products by category
     *
     * @param $slug
     * @param $request
     */
    public function categoryDetails(Request $request, $slug)
    {

        $defaultPaginate = 10;
        $price = str_replace("$", "", $request->price);
        $q = explode("-", $price);

        $category = Category::with('products.store', 'products.currency')->whereSlug($slug)->firstOrFail();

        $categoryWise = $category->products();

        if ($request->price) {
            $categoryWise = $category->products()->where('price', '>=', $q[0])->where('price', '<=', $q[1]);
        }

        if ($request->query('sort') == 'low_to_high') {
            $categoryWise = $category->products()->orderBy('price');
        }

        if ($request->query('sort') == 'high_to_low') {
            $categoryWise = $category->products()->orderByDesc('price');
        }

        if ($request->query('sort') == 'release') {
            $categoryWise = $category->products()->orderByDesc('id');
        }

        if ($request->query('numeric_sort')) {
            $defaultPaginate = $request->query('numeric_sort');
        }

        if ($request->query('numeric_sort') == 'all') {
            $defaultPaginate = count($category->products);
        }

        $categoryWise = $categoryWise->paginate($defaultPaginate);

        if ($request->ajax()) {
            // return $request;
            return view('frontend.ajax.category-product-sort', compact('category', 'categoryWise'));
        }

        return view('frontend.category', compact('category', 'categoryWise'));
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
