<?php

namespace App\Modules\Comment\ViewModels;

use App\Modules\Comment\Models\Comment;

class CommentIndexVM
{

    public static function handle()
    {
        $Comments = Comment::all();
        $arr = [];
        foreach ($Comments as $Comment) {
            $CommentVM = new CommentShowVM();
            array_push($arr, $CommentVM->toAttr($Comment));
        }
        return $arr;
    }

    public static function toArray()
    {
        return ['Comments' => self::handle()];
    }
}
