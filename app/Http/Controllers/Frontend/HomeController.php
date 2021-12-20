<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller {
    public function index() {
        $categories = Category::with( 'products.store', 'products.currency' )->limit( 12 )->get();
        return view( 'frontend.index', compact( 'categories' ) );
    }

    /**
     * @param $id
     */
    public function productDetails( $id ) {
        $product = Product::with( 'store', 'currency', 'category.products', 'brand', 'unit' )->findOrFail( $id );
        return view( 'frontend.product-details', compact( 'product' ) );
    }

    /**
     * @param $id
     */
    public function categoryDetails( $id ) {
        $category = Category::with( 'products.store', 'products.currency' )->findOrFail( $id );
        return view( 'frontend.category', compact( 'category' ) );
    }

    public function search() {
        $query = request( 'search' );
        $category_id = request( 'category_id' );

        $products = Product::with( 'store', 'currency', 'category.products', 'brand', 'unit' )
            ->where( 'name', 'like', '%' . $query . '%' )
            ->orWhere( 'description', 'like', '%' . $query . '%' )
            ->orWhere( 'excerpt', 'like', '%' . $query . '%' )
            ->orWhere( 'category_id', $category_id )
            ->get();

        return view( 'frontend.search', compact( 'products', 'query' ) );
    }
}
