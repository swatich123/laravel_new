<?php

namespace App\Http\Controllers\Book;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\book;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class booksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = book::paginate(15);

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['bookname' => 'required', 'description' => 'required', 'author' => 'required', ]);

        book::create($request->all());

        Session::flash('flash_message', 'book added!');

        return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $book = book::findOrFail($id);

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $book = book::findOrFail($id);

        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['bookname' => 'required', 'description' => 'required', 'author' => 'required', ]);
        

        $book = book::findOrFail($id);
        $book->update($request->all());

        Session::flash('flash_message', 'book updated!');

        return redirect('book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        book::destroy($id);

        Session::flash('flash_message', 'book deleted!');

        return redirect('book');
    }

}
