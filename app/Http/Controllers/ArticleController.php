<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consoles = Console::all();
        return view('articles.create', compact('consoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $article = Article::create([
            'title' => $request->input('title'), // Variable in line, cioè sto recuperando l'input dalla request direttamente dall'oggetto
            'category' => $request->input('category'),
            // 'author' => $request->input('author'),
            // 'author' => Auth::user()->name, //! NON MI SERVE PIù perchè ho la relazione
            'user_id' => Auth::id(), // Qui sto inserendo dentro la tabella articles nel nuovo record che sto creando, esattamente nella colonna 'user_id',
            // l'id dell'utente autenticato
            'body' => $request->input('body'),
            'img' => $request->file('img')->store('public/images')
        ]);

        $article->consoles()->attach($request->consoles);

        return redirect(route('homepage'))->with('message', 'Articolo inserito con successo');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article) //DEPENDENCY INJECTION
    {
         return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $consoles = Console::all();

        return view('articles.edit', compact('article', 'consoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if($request->file('img')){
            $img = $request->file('img')->store('public/images');
        }
        else{
            $img = $article->img;
        }

      $article->update([
        'title' => $request->input('title'),
        'category' => $request->input('category') ,
        'body' => $request->input('body'),
        'img' => $img,
    ]);

    $article->consoles()->sync($request->consoles);

    return redirect(route('articles.index'))->with('message', 'Articolo modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->consoles()->detach($article->consoles);
        $article->delete();
        return redirect(route('articles.index'))->with('message', 'Articolo eliminato');
    }
}
