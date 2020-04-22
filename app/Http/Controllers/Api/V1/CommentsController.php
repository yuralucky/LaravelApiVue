<?php

namespace App\Http\Controllers\Api\V1;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return Comment::whereNull('comment_id')->with('children')->get();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $comment = Comment::create(($request->all()));
        return response()->json($comment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Comment
     */
    public function show($id)
    {
        return Comment::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->fill($request->except('id'));
        $comment->save();
        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id)
    {
        Comment::where('comment_id', $id)->with('children')->delete();
        Comment::find($id)->delete();
        return response()->json(null, 204);
    }
}
