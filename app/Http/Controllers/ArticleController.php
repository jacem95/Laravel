<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Manager\ArticleManager;
use App\Models\Article;

class ArticleController extends Controller
{
    private $articleManager;

    public function __construct(ArticleManager $articleManager)
    {
        $this->articleManager = $articleManager;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        //on précise qu'on veut valider ou non les datas
        $validated = $request->validated();

        $this->articleManager->build(new Article(), $request);
        return redirect()->route('articles.index')->with('success', 'L article a bien été ajouté sauvegardé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {

        $this->articleManager->build($article, $request);

        return redirect()->route('articles.index')->with('success', 'L article a bien été modifié !');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with("success", "L'article a bien été supprimé !");
    }
}
