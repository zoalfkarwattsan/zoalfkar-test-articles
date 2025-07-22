<?php


namespace App\Modules\Comment\Actions;

use App\Helpers\Helper;
use App\Modules\Comment\Models\Comment;

class DeleteCommentAction
{
    public static function execute(Comment $Comment)
    {
        $Comment->delete();
        return Helper::createSuccessResponse([], 'Deleted Successfully');
    }

}
