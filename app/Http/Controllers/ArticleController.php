<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function store(Request $request)
    {
        // Valider les entrées du formulaire
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'title_ar' => 'required|max:255',
            'body' => 'required',
            'body_ar' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        // Rediriger l'utilisateur vers le formulaire s'il y a des erreurs de validation
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Télécharger l'image du formulaire et la stocker dans le stockage public
        $path = $request->file('image')->store('public/images');
        $filename = str_replace('public/', '', $path);

        // Créer un nouvel article en utilisant les entrées du formulaire et le chemin de l'image téléchargée
        $article = new Article;
        $article->title = $request->input('title');
        $article->title_ar = $request->input('title_ar');
        $article->body = $request->input('body');
        $article->body_ar = $request->input('body_ar');
        $article->image = $filename;
        $article->date = now();
        $article->save();

        // Rediriger l'utilisateur vers la liste des articles après avoir enregistré l'article
        return redirect()->route('articles.index');
}

    }


Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
