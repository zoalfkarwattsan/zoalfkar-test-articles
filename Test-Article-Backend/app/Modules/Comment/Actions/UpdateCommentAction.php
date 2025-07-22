<?php


namespace App\Modules\Comment\Actions;

use App\Helpers\Helper;
use App\Modules\Comment\DTO\CommentDTO;
use App\Modules\Comment\Models\Comment;
use Illuminate\Support\Facades\Auth;

class UpdateCommentAction
{
    public static function execute(Comment $Comment, CommentDTO $CommentDTO)
    {
        $Comment->update($CommentDTO->toArray());
        return Helper::createSuccessResponse(['ProductAttachment' => $Comment], 'Updated Successfully');
    }

}
