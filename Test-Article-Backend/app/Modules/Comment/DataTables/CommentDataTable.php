<?php


namespace App\Modules\Comment\DataTables;

use App\Modules\Comment\Models\Comment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CommentDataTable
{
    public static function toJson(Request $request)
    {
        $request['length'] = $request->query('limit', 10);
        $request['start'] = ($request->query('limit', 10) * ($request->query('page', 1))) - $request->query('limit', 10);

        $query = Comment::select('*')->orderBy("id", 'desc');
        $response = Datatables::of($query)
            ->filter(function ($query) {
                if (isset(request('filter')['key'])) {
                    $query->where('key', 'like', "%" . request('filter')['key'] . "%");
                }
            })
            ->toJson();
        return $response;
    }

}
