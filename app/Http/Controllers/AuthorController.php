<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller {

    // use auth middleware
    public function showAllAuthors()
    : JsonResponse {
        
        // return response
        return response()->json(Author::all());
    }
    public function showOneAuthor($id)
    : JsonResponse {

        return response()->json(Author::find($id));
    }

    // create author
    public function create(Request $request)
    : JsonResponse {
        // validation of data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'location' => 'required|alpha'
        ]);
        
        $author = Author::create($request->all());
        //alternative way
        //$author->name = $request->name;
        //$request->column_name = $request->column_name
        return response()->json($author, Response::HTTP_CREATED);
    }

// update author
    public function update($id, Request $request)
    : JsonResponse {

        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, Response::HTTP_OK);
    }

    // delete author
    public function delete($id) {

        Author::findOrFail($id)->delete();

        return response('Deleted Successfully', Response::HTTP_OK);
    }
}