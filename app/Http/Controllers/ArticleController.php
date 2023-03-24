<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function create()
    {
        $article = Article::create([
            'title' => 'Title in English',
            'title_ar' => 'Title in Arabic',
            'body' => 'Body in English',
            'body_ar' => 'Body in Arabic',
            'image' => 'path/to/image.jpg',
            'date' => '2023-03-24 12:00:00',
        ]);

        return "Article created successfully!";
    }
}

