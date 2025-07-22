<?php

namespace App\Modules\Comment\ViewModels;

use App\Modules\Comment\Models\Comment;

class CommentShowVM
{

    public static function handle($Comment)
    {
        return $Comment;
    }

    public static function toArray(Comment $Comment)
    {
        return ['ProductAttachment' => self::handle($Comment)];
    }

    public static function toAttr(Comment $Comment)
    {
        return self::handle($Comment);
    }
}
