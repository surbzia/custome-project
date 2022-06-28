<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorRequest;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Admin\Author;
use App\Models\Admin\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new Category();
        $data = [
            'is_edit' => false,
            'title' => 'Add Category',
            'button' => 'Submit',
            'route' => route('category.store'),
            'edit_category' => $obj,
        ];
        return view('admin.category.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_featured'] = (isset($request['is_featured']) && $request['is_featured']) == 'on' ? 1 : 0;
        $user = Category::create($request);

        return redirect()->route('category.index')->with('status', 'Category has been created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data = [
            'is_edit' => true,
            'title' => 'Update Category',
            'button' => 'Update',
            'route' => route('category.update', $category->id),
            'edit_category' => $category,
        ];
        return view('admin.category.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $request = $request->all();

        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_featured'] = (isset($request['is_featured']) && $request['is_featured']) == 'on' ? 1 : 0;
        $category->update($request);
        return redirect()->route('category.index')->with('status', 'Category has been updated successfully');
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
        return redirect()->route('category.index')->with('status', 'Category has been deleted successfully');
    }
}
