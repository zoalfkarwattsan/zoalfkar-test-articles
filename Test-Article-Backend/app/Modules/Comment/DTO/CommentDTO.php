<?php


namespace App\Modules\Comment\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CommentDTO extends DataTransferObject
{

    /** @var string $key */
    public $author_name;
    public $content;
    public $article_id;

    public static function fromRequest($request)
    {
        return new self([
            'author_name' => $request['author_name'],
            'content' => $request['content'],
            'article_id' => $request['article_id'],
        ]);
    }

    public static function fromRequestForUpdate($request, $Comment)
    {
        return new self([
            'author_name' => isset($request['author_name']) ? $request['author_name'] : $Comment->author_name,
            'content' => isset($request['content']) ? $request['content'] : $Comment->content,
            'article_id' => isset($request['article_id']) ? $request['article_id'] : $Comment->article_id
        ]);
    }
}
