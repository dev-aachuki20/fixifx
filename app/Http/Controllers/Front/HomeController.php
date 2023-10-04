<?php

namespace App\Http\Controllers\Front;

use App\Models\Faq;
use App\Models\Menu;
use App\Models\Share;
use App\Models\Spread;
use App\Models\Article;
use App\Models\Country;
use App\Models\Section;
use App\Models\MenuPage;
use App\Models\ContactUs;
use App\Models\NewsLetter;
use App\Models\ContactPage;
use App\Models\PaymentType;
use App\Models\PostComment;
use Illuminate\Http\Request;
use App\Models\ArticleAuthor;
use App\Models\ShareCategory;
use App\Models\SpreadCategory;
use App\Models\ArticleCategory;
use App\DataTables\CfdDataTable;
use App\DataTables\ForexDataTable;
use App\DataTables\ShareDataTable;
use Illuminate\Support\Facades\DB;
use App\DataTables\SpreadDataTable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\ContactRequest;

class HomeController extends Controller
{
    public function changeLanguage(Request $request, $lang)
    {
        session()->put('locale', $lang);
        App::setlocale(session()->get('locale'));
        $thisUrl = url()->previous();
        if ($lang == 'en') {
            $newUrl = str_replace('/ja/', '/en/', $thisUrl);
        } else {
            $newUrl  = str_replace('/en/', '/ja/', $thisUrl);
        }
     
        return redirect($newUrl);
    }

    public function page($locale, $slug, $article_id = NULL, SpreadDataTable $spreadTable, ShareDataTable $shareDataTable,ForexDataTable $forexDataTable,CfdDataTable $cfdDataTable)
    {
        $home_articles = Article::where('page_id', 0)->where('status', 1)->orderBy('id', 'DESC')->get();
        $common = Section::where('page_id', '-1')->get();

        if (($slug == 'home') && !$article_id) {
            $section = Section::where('status', 1)->where('page_id', 0)->get();
            $currency_changes = getAllChangeCurrency();
            return view('front.page.home', compact('section', 'home_articles', 'common', 'currency_changes'));
        }

        $page = MenuPage::where('slug', $slug)/* ->pluck('id') */->first();
        if ($page) {
            $menu = Menu::where('id', $page->menu_id)->first();
            $section = Section::where('page_id', $page->id)->get();
            $articles = Article::where('page_id', $page->id)->where('status', 1)->orderBy('id', 'DESC');
            if (request()->tag) {
                $articles = $articles->whereRaw('FIND_IN_SET(?, tags)', [request()->tag]);
            }
            $author = NULL;
            if (request()->author) {
                $author = ArticleAuthor::where('id', request()->author)->first();
                $articles = $articles->where('author_id', request()->author);
            }
            if (request()->category) {
                $articles = $articles->where('category_id', request()->category);
            }
            $articles = $articles->paginate(5)->onEachSide(1);
            $random_articles = Article::where('page_id', $page->id)->where('status', 1)->inRandomOrder()->take(8)->get();

            $article_tag = Article::where('page_id', $page->id)->where('status', 1)->select(DB::raw("group_concat(tags SEPARATOR ',') as all_tags"))->pluck('all_tags');
            $tags = array_unique(explode(',', $article_tag[0]));

            $faqs = Faq::where('page_id', $page->id)->get()->groupBy('section_no');
            $payments = PaymentType::where('page_id', $page->id)->where('status', 1)->get();
            $countries = Country::all();
            $categories = ArticleCategory::all();

            $contacts = ContactPage::where('page_id', $page->id)->get();

            if ($article_id) {
                $article = Article::where('id', $article_id)->where('page_id', $page->id)->first();
                if($article) {
                    if (($slug == 'event-news') || ($slug == 'company-news')) {
                        return view('front.page.event_detail', compact('slug', 'section', 'page', 'menu', 'articles', 'article', 'tags', 'common'));
                    }
                    return view('front.page.article_detail', compact('slug', 'section', 'page', 'menu', 'articles', 'article', 'tags', 'home_articles', 'contacts', 'common', 'author', 'random_articles', 'countries'));
                }
                abort(404);
            }

            if ($slug == "spread-list") {
                $spread_categories = SpreadCategory::all();
                $spreads = Spread::all();

                return $spreadTable->render('front.page.' . $slug, compact('slug', 'section', 'page', 'menu', 'tags', 'faqs', 'countries', 'contacts', 'common', 'spread_categories', 'spreads'));
            }
            if ($slug == "shares-bonds") {
                $share_categories = ShareCategory::all();
                $shares = Share::all();

                return $shareDataTable->render('front.page.' . $slug, compact('slug', 'section', 'page', 'menu', 'tags', 'faqs', 'countries', 'contacts', 'common', 'share_categories', 'shares'));
            }
            if ($slug == "forex") {
                return $forexDataTable->render('front.page.' . $slug, compact('slug', 'section', 'page', 'menu', 'tags', 'faqs', 'countries', 'contacts', 'common'));
            }
            if ($slug == "index-cfds") {
                return $cfdDataTable->render('front.page.' . $slug, compact('slug', 'section', 'page', 'menu', 'tags', 'faqs', 'countries', 'contacts', 'common'));
            }

            return view('front.page.' . $slug, compact('slug', 'section', 'page', 'menu', 'articles', 'tags', 'faqs', 'countries', 'payments', 'contacts', 'common', 'random_articles', 'author', 'categories'));
        } else {
            abort(404);
        }
    }

    public function contactUs(ContactRequest $request)
    {
        $contact = new ContactUs();

        $contact->first_name    = $request->first_name;
        $contact->last_name     = $request->last_name;
        $contact->company_name  = $request->company_name;
        $contact->email         = $request->email;
        $contact->already_customer = $request->already_customer;
        $contact->account_no    = $request->account_no;
        $contact->country       = $request->country;
        $contact->phone_no      = $request->phone_no;
        $contact->question      = $request->question;
        $contact->message       = $request->message;

        $contact->save();

        return 1;
    }

    public function postComment(CommentRequest $request)
    {
        $comment = new PostComment();

        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->url = $request->url;
        $comment->message = $request->message;

        $comment->save();

        return redirect()->back()->with('success', 'Post comment add successfully..');
    }

    public function newsLetter(Request $request)
    {
        $request->validate([
            'email' => 'required|regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}/'
        ]);
        $data = new NewsLetter();

        $data->email = $request->email;
        $data->save();

        return 1;
    }

    public function privacyPage()
    {
        return view('front.privacy');
    }

    public function termsPage()
    {
        return view('front.terms');
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function getMedia(Request $request)
    {
        $data = Section::where('page_id', $request->page_id)->where('section_no', $request->sec_no)->first();

        return $data;
    }

    public function list($slug, $category_id)
    {
        $page = MenuPage::where('slug', $slug)->first();
        $articles = Article::where('page_id', $page->id)->where('status', 1)->orderBy('id', 'DESC')->where('category_id', $category_id);
        $articles = $articles->paginate(5)->onEachSide(1);

        $article_tag = Article::where('page_id', $page->id)->where('status', 1)->select(DB::raw("group_concat(tags SEPARATOR ',') as all_tags"))->pluck('all_tags');
        $tags = array_unique(explode(',', $article_tag[0]));
        $section = Section::where('page_id', $page->id)->get();

        return view('front.page.' . $slug, compact('slug',  'articles', 'page', 'tags', 'section'));
    }

    public function getChangeRate(Request $request)
    {
        $access_key = env('CURRENCY_KEY');
        $response  = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get('https://api.currencylayer.com/change?access_key='.$access_key.'&source='.$request->source.'&currencies='.$request->currencies);
        $response = json_decode($response->body());
        $data = [];
        $currency = (array) $response->quotes;
        
        foreach ($currency as $key => $value) {
            $data[$key]['start_rate'] = number_format($value->start_rate, 6-(strlen((int)$value->start_rate)));
            $data[$key]['end_rate'] = number_format($value->end_rate, 6-(strlen((int)$value->end_rate)));
            $data[$key]['change_pct'] = number_format($value->change_pct, 2);
            $data[$key]['flag_1'] = getCurrencyFlag(substr($key, 0, 3));
            $data[$key]['flag_2'] = getCurrencyFlag(substr($key, 3, 6));
        }

        return $data;
    }
    
    
    public function searchFaqs(Request $request)
    {
        $searchTerm = $request->query('keyword');
        
        // Get the first few letters of the search term.
        $firstFewLetters = mb_substr($searchTerm, 0, 3);

        $relatedFaqs = Faq::with('menuPage', 'section')->where(config('app.locale').'_question', 'LIKE', '%'.$firstFewLetters.'%')->get();

        // $relatedFaqs = Faq::with('menuPage', 'section')->where(config('app.locale').'_question', 'LIKE', "{$request->query('keyword')}%")
        // ->get();
        
        // Order the results by the position of the search term in the results.
        $relatedFaqs->sortBy(function ($relatedFaqs, $searchTerm) {
            return mb_strpos($relatedFaqs->name, $searchTerm);
        });

       $relatedFaqsHtml = view('front.layouts.partials.related_faqs', compact('relatedFaqs'))->render();

        return response()->json([
        'success' => true,
        'relatedFaqs' =>  $relatedFaqs,
        'relatedFaqsHtml' => $relatedFaqsHtml,
        ]);
    }
}
