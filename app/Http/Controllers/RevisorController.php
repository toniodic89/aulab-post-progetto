<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $unrevisionedArticle = Article::where('is_accepted', NULL)->get();
        $acceptedArticle = Article::where('is_accepted', true)->get();
        $rejectedArticle = Article::where('is_accepted', false)->get();


        return view('revisor.dashboard', compact('unrevisionedArticle', 'acceptedArticle', 'rejectedArticle'));
    }

    public function acceptArticle(Article $article)
    {
        $article->is_accepted = true;
        $article->save();

        return redirect( route('revisor.dashboard'))->with('message', 'Hai accettato l\'articolo scelto');
    }

    public function rejectArticle(Article $article)
    {
        $article->is_accepted = false;
        $article->save();

        return redirect( route('revisor.dashboard'))->with('message', 'Hai rifiutato l\'articolo scelto');
    }


    public function undoArticle(Article $article)
    {
        $article->is_accepted = NULL;
        $article->save();

        return redirect( route('revisor.dashboard'))->with('message', 'Hai riportato l\'articolo scelto in revisione');
    }
}
