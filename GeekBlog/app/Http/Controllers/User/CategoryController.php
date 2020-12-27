<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpanel.category.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=Category::create($request->only('name'));
        return redirect()->route('category.index')->with('success',"Category Created");
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('adminpanel.category.edit',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categories)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name=$request->name;
        $category->save();

        return redirect()->route('category.index')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','Category Deleted Successfully');
    }
    public function trashCategory(){
        return view('adminpanel.category.trashed')->with('categories',Category::onlyTrashed()->get());
    }
    public function restoreCategory($id)
    {
        $category=Category::withTrashed()->where('id',$id)->restore();
        return redirect()->route('category.index')->with('success','Restore Category Successful');
    }
    public function permaDeleteCategory($id)
    {
        $category=Category::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('category.index')->with('success','Category Permanent Deleted');
    }
}
