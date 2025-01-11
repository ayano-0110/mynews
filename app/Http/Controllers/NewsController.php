<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Comment;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts]);
    }

    public function show(Request $request)
    {
        // News Modelからデータを取得する
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }
        return view('news.detail', ['news' => $news]);
    }

    public function addComment(Request $request)
    {
        $book = Comment::create([
            'news_id' => $request->input('id'),
            'comment' => $request->input('comment'),
        ]);

        return redirect('/detail?id='.  $request->input('id'));
    }
}

