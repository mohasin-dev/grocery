<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index');
    }

    public function allCategories(Request $request)
    {
        $columns = array( 
                            0 =>'id', 
                            1 =>'name',
                            1 =>'image',
                            3=> 'created_at',
                            4=> 'id',
                        );
    
        $totalData = Category::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $categories = Category::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $categories =  Category::where('id','LIKE',"%{$search}%")
                            ->orWhere('name', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Category::where('id','LIKE',"%{$search}%")
                                ->orWhere('name', 'LIKE',"%{$search}%")
                                ->count();
        }

        $data = array();
        if(!empty($categories))
        {
            foreach ($categories as $category)
            {
                $edit =  route('categories.edit',$category->id);
                $delete =  route('categories.destroy', $category->id);
                $token = csrf_token();
                $img = asset('assets/img/categories/thumbnail/'. $category->image);

                $nestedData['id'] = $category->id;
                $nestedData['name'] = $category->name;
                $nestedData['image'] = "<img src='{$img}' width='60'>";
                // $nestedData['body'] = substr(strip_tags($category->body),0,50)."...";
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($category->created_at));
                $nestedData['actions'] = "
                &emsp;
                <a href='{$edit}' title='EDIT' ><span class='far fa-edit'></span></a>
                &emsp;
                <a href='#' onclick='deleteCategory({$category->id})' title='DELETE' ><span class='fas fa-trash'></span></a>
                <form id='delete-form-{$category->id}' action='{$delete}' method='POST' style='display: none;'>
                <input type='hidden' name='_token' value='{$token}'>
                <input type='hidden' name='_method' value='DELETE'>
                </form>
                ";
                $data[] = $nestedData;

            }
        }
            
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'image' => 'required|image'
        ]);

        $currentDate = Carbon::now()->toDateString();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $location = public_path('assets/img/categories/'.$filename);
            $thumbnailLocation = public_path('assets/img/categories/thumbnail/'.$filename);
            Image::make($image)->save($location);
            Image::make($image)->resize(200, 200)->save($thumbnailLocation);
        }

        $category = new Categories();
        $category->name = $request->name;
        $category->image = $filename;
        $category->save();

        Alert::toast('Category successfully created', 'success');
        
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'. $category->id,
            'image' => 'image'
        ]);

        $currentDate = Carbon::now()->toDateString();

        if ($request->hasFile('image')) {

            if (File::exists('assets/img/categories/'.$category->image)) {
                File::delete('assets/img/categories/'.$category->image);
            }

            if (File::exists('assets/img/categories/thumbnail/'.$category->image)) {
                File::delete('assets/img/categories/thumbnail/'.$category->image);
            }

            $image = $request->file('image');
            $filename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $location = public_path('assets/img/categories/'.$filename);
            $thumbnailLocation = public_path('assets/img/categories/thumbnail/'.$filename);
            Image::make($image)->save($location);
            Image::make($image)->resize(200, 200)->save($thumbnailLocation);

            $category->image = $filename;
        }

        $category->name = $request->name;
        $category->save();

        Alert::toast('Category successfully updated', 'success');
        
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category  $category)
    {
        if (File::exists('assets/img/categories/'.$category->image)) {
            File::delete('assets/img/categories/'.$category->image);
        }

        if (File::exists('assets/img/categories/thumbnail/'.$category->image)) {
            File::delete('assets/img/categories/thumbnail/'.$category->image);
        }

        $category->delete();

        Alert::toast('Category successfully deleted', 'success');

        return redirect()->back();
    }
}
