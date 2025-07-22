<?php


namespace App\Modules\Article\DataTables;

use App\Modules\Article\Models\Article;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ArticleDataTable
{
    public static function toJson(Request $request)
    {

        $request['length'] = $request->query('limit', 10);
        $request['start'] = ($request->query('limit', 10) * ($request->query('page', 1))) - $request->query('limit', 10);

        $query = Article::select('*')->orderBy("id", 'desc');
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
