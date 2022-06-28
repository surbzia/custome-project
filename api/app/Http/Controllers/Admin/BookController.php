<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookRequest;
use App\Models\Admin\Author;
use App\Models\Admin\Book;
use App\Models\Admin\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all()->toArray();
        return view('admin.books.index')->with(compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $obj = new Book();
        $sku = Book::orderBy('id', 'asc')->first();
        $categories = Category::where('is_active', 1)->get();
        $authors = Author::all();
        $data = [
            'is_edit' => false,
            'title' => 'Add Book',
            'button' => 'Submit',
            'route' => route('book.store'),
            'categories' => $categories,
            'authors' => $authors,
            'edit_Book' => $obj,
            'sku' => is_null($sku) ? 1 : $sku->sku + 1,
        ];
        return view('admin.books.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $request = $request->all();
        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_featured'] = (isset($request['is_featured']) && $request['is_featured']) == 'on' ? 1 : 0;
        $user = Book::create($request);

        return redirect()->route('book.index')->with('status', 'Book has been created successfully');
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
    public function edit(Book $Book)
    {
        $categories = Category::where('is_active', 1)->get();
        $authors = Author::all();
        $data = [
            'is_edit' => true,
            'title' => 'Update Book',
            'button' => 'Update',
            'route' => route('book.update', $Book->id),
            'categories' => $categories,
            'sku' => $Book->sku,
            'authors' => $authors,
            'edit_Book' => $Book,
        ];
        return view('admin.books.form')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $Book)
    {
        $request = $request->all();

        $request['is_active'] = (isset($request['is_active']) && $request['is_active']) == 'on' ? 1 : 0;
        $request['is_featured'] = (isset($request['is_featured']) && $request['is_featured']) == 'on' ? 1 : 0;
        $Book->update($request);
        return redirect()->route('book.index')->with('status', 'Book has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $Book)
    {
        $Book->delete();
        return redirect()->route('book.index')->with('status', 'Book has been deleted successfully');
    }
}
