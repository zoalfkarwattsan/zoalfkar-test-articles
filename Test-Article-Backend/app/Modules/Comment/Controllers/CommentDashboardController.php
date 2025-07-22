<?php

namespace App\Modules\Comment\Controllers;

use App\Modules\Comment\Actions\DeleteCommentAction;
use App\Modules\Comment\Actions\StoreCommentAction;
use App\Modules\Comment\Actions\UpdateCommentAction;
use App\Modules\Comment\DataTables\CommentDataTable;
use App\Modules\Comment\DTO\CommentDTO;
use App\Modules\Comment\Models\Comment;
use App\Modules\Comment\Requests\StoreCommentRequest;
use App\Modules\Comment\Requests\UpdateCommentRequest;
use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Modules\Comment\ViewModels\CommentIndexVM;
use App\Modules\Comment\ViewModels\CommentShowVM;
use Illuminate\Http\Request;

class CommentDashboardController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $response = Helper::createSuccessResponse(['Comments' => Comment::where('article_id', $request->article_id)->get()]);
        return response()->json($response, 200);
    }

    public function indexDT(Request $request)
    {
        $response = CommentDataTable::toJson($request);
        $response = Helper::createSuccessDTResponse($response, '');
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Comment $Comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Comment $Comment)
    {
        //
        $response = Helper::createSuccessResponse(CommentShowVM::toArray($Comment));
        return response()->json($response, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCommentRequest $storeCommentRequest)
    {
        $CommentDTO = CommentDTO::fromRequest($storeCommentRequest);
        $response = Helper::createResponse(StoreCommentAction::execute($CommentDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCommentRequest $updateCommentRequest, $Comment)
    {
        $Comment = Comment::find($Comment);
        $CommentDTO = CommentDTO::fromRequestForUpdate($updateCommentRequest, $Comment);
        $response = Helper::createResponse(UpdateCommentAction::execute($Comment, $CommentDTO));
        return response()->json($response, $response['code']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $Comment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($Comment)
    {
        //
        $Comment = Comment::find($Comment);
        $response = Helper::createResponse(DeleteCommentAction::execute($Comment));
        return response()->json($response, $response['code']);
    }
}
