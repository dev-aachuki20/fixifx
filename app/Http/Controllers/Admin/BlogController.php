<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddAuthorRequest;
use App\DataTables\ArticleAuthorDataTable;
use App\Http\Requests\CategoryRequest;
use App\Models\Article;
use App\Models\ArticleAuthor;
use App\Models\ArticleCategory;

class BlogController extends Controller
{
    public function author(ArticleAuthorDataTable $dataTable, $id = NULL)
    {
        if($id) {
            $author = ArticleAuthor::where('id', $id)->first();
            return $author;
        }
        return $dataTable->render('admin.blog.author');
    }

    public function addAuthor(AddAuthorRequest $request)
    {
        $author = new ArticleAuthor();
        if(isset($request->author_id) && $request->author_id) {
            $author = ArticleAuthor::where('id', $request->author_id)->first();
        }

        if($request->hasFile('profile')) {
            $author->profile = uploadFile($request->profile, 'Profile');
        }
        $author->name           = $request->name;
        $author->en_description = $request->en_description;
        $author->ja_description = $request->ja_description;

        return $author->save();
    }

    public function category()
    {
        $categories = ArticleCategory::all();

        return view('admin.blog.category', compact('categories'));
    }

    public function addCategory(CategoryRequest $request)
    {
        foreach ($request->en_name as $key => $value) {
            if($value) {
                $cat = new ArticleCategory();
                if(isset($request->category_id[$key])) {
                    $cat = ArticleCategory::find($request->category_id[$key]);
                }
                
                $cat->en_name = $value;
                $cat->ja_name = $request->ja_name[$key] ?? '';
    
                $cat->save();
            }
            
        }

        return redirect()->back();
    }

    public function banner()
    {
        return view('admin.blog.banner');
    }

    public function deleteArticle(Request $request){
        $article = Article::find($request->id);
        return $article->delete();
    }
}
