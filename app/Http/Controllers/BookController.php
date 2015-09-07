<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\App;

class BookController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $booksList=Book::all();
        return view('book.list', ['books' => $booksList]);
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
        $this->validate($request, [
            'title' => 'required',
            'publisher' => 'required',
        ]);

        $book = new Book;
        $book->title =  $request->input('title');
        $book->bookPages =  $request->input('bookPages');
        $book->price =  $request->input('price');
        $book->publisher =  $request->input('publisher');
        $book->save();
        return redirect()->action('BookController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $book  = Book::find($id);
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $book  = Book::find($id);
        return view('book.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'publisher' => 'required',
        ]);
        $book  = Book::find($request->input('id'));
        $book->title =  $request->input('title');
        $book->bookPages =  $request->input('bookPages');
        $book->price =  $request->input('price');
        $book->publisher =  $request->input('publisher');
        $book->save();
        return redirect()->action('BookController@index');
    }

    public function exportcsv() {
        $books = Book::all();
        $csv = \League\Csv\Writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(\Schema::getColumnListing('books'));
        foreach ($books as $book) {
            $csv->insertOne($book->toArray());
        }
        $csv->output('people.csv');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $book  = Book::find($id);
        $book->delete();
        return redirect()->action('BookController@index');
    }
}