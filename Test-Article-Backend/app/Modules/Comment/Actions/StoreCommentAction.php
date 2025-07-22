<?php


namespace App\Modules\Comment\Actions;

use App\Helpers\Helper;
use App\Modules\Comment\DTO\CommentDTO;
use App\Modules\Comment\Models\Comment;

class StoreCommentAction
{

    public static function execute(CommentDTO $CommentDTO)
    {
        $Comment = new Comment($CommentDTO->toArray());
        $Comment->save();
        return Helper::createSuccessResponse(['ProductAttachment' => $Comment], 'Added Successfully');
    }
}
