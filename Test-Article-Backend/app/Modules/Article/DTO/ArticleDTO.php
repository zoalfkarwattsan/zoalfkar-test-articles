<?php


namespace App\Modules\Article\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class ArticleDTO extends DataTransferObject
{

    /** @var string $key */
    public $title;
    public $content;

    public static function fromRequest($request)
    {
        return new self([
            'title' => $request['title'],
            'content' => $request['content']
        ]);
    }

    public static function fromRequestForUpdate($request, $Article)
    {
        return new self([
            'title' => isset($request['title']) ? $request['title'] : $Article->title,
            'content' => isset($request['content']) ? $request['content'] : $Article->content

        ]);
    }
}
