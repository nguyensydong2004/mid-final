<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BookController extends Controller
{
    public function index(Request $request) {

        $books = Book::orderBy('created_at', 'DESC');

        if(!empty($request->keyword)) {
            $books = $books->where('title', 'LIKE', '%'.$request->keyword.'%')
            ->orWhere('author', 'LIKE', '%'.$request->keyword.'%');
        }
        $books = $books->withCount('reviews')->withSum('reviews','rating')->paginate(3);
        
        return view('books.list',[
            'books' => $books
        ]);
    }

    public function create() {
        return view('books.create');
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required|min:3',
            'author' => 'required|min:3',
            'status' => 'required'
        ];
        if(!empty($request->image)){
            $rules['image'] = 'image';
        }
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->route('books.create')->withInput()->withErrors($validator);
        }
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->status = $request->status;
        $book->save();

        if(!empty($request->image)){
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;
            $image->move(public_path('uploads/books'), $imageName);
            $book->image = $imageName;
            $book->save();

            $manager = new ImageManager(Driver::class);
            $img = $manager->read(public_path('uploads/books/'.$imageName));
            $img->resize(500);
            $img->save(public_path('uploads/books/cover/'.$imageName));
        }

        return redirect()->route('books.index')->with('success', 'Book has been added successfully.');

    }

    public function edit($id){
        $book = Book::find($id);
        return view('books.edit',[
            'book' => $book
        ]);

    }
    public function update($id, Request $request){
        $book = Book::findOrFail($id);
        $rules = [
            'title' => 'required|min:3',
            'author' => 'required|min:3',
            'status' => 'required'
        ];
        if(!empty($request->image)){
            $rules['image'] = 'image';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('books.edit', $book->id)->withInput()->withErrors($validator);
        }

        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->status = $request->status;
        $book->save();

        if(!empty($request->image)){
            File::delete(public_path('uploads/books/'.$book->image));
            File::delete(public_path('uploads/books/cover/'.$book->image));
            $image= $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName= time().'.'.$ext;
            $image->move(public_path('uploads/books'), $imageName);
            $book->image = $imageName;
            $book->save();

            $manager = new ImageManager(Driver::class);
            $img = $manager->read(public_path('uploads/books/'.$imageName));
            $img->resize(500);
            $img->save(public_path('uploads/books/cover/'.$imageName));
        }

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');      
    }
    
    public function destroy(Request $request) {
        $book = Book::find($request->id);

        if (!$book === null) {
            session()->flash('error', 'Book not found.');
            return response()->json([
                'status' => false,
                'message' => 'Book not found.'
            ]);
        } else {
            File::delete(public_path('uploads/books/'.$book->image));
            File::delete(public_path('uploads/books/cover/'.$book->image));
            $book->delete();
            session()->flash('success', 'Book deleted successfully.');
            return response()->json([
                'status' => true,
                'message' => 'Book deleted successfully.'
            ]);
        }      
    }
}
