<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\Spread;
use App\Models\Article;
use App\Models\Section;
use App\Models\Setting;
use App\Models\MenuPage;
use App\Models\Share;
use App\Models\SubSection;
use App\Models\ContactPage;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use App\Models\ArticleAuthor;
use App\Models\SpreadCategory;
use App\Models\ArticleCategory;
use App\DataTables\SpreadDataTable;
use App\DataTables\ArticleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpreadRequest;
use App\DataTables\NewsLetterDataTable;
use App\DataTables\ContactUsersDataTable;
use App\DataTables\ArticleCategoryDataTable;
use App\DataTables\CfdDataTable;
use App\DataTables\ForexDataTable;
use App\DataTables\ShareCategoryDataTable;
use App\DataTables\ShareDataTable;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ShareCategoryRequest;
use App\Http\Requests\ShareRequest;
use App\Models\Cfd;
use App\Models\Forex;
use App\Models\ShareCategory;

class HomeController extends Controller
{
    public function page(ArticleDataTable $dataTable, $slug, SpreadDataTable $spreadTable, ArticleCategoryDataTable $articleCategoryDataTable, ShareDataTable $shareDataTable, ShareCategoryDataTable $shareCategoryDataTable, ForexDataTable $forexDataTable, CfdDataTable $cfdDataTable)
    {
        if ($slug == 'home') {
            $section = Section::where('page_id', 0)->get();
            // dd($section);
            return $dataTable->with(['page_id' => 0, 'slug' => 'home'])->render('admin.page.home', compact('section'));
        } elseif ($slug == 'common') {
            $common = Section::where('page_id', '-1')->get();
            return view('admin.common.common_section', compact('common'));
        }

        $page = MenuPage::where('slug', $slug)/* ->pluck('id') */->first();
        $contact_data = ContactPage::all();
        $section = $faqs = $payment_types = $payments = [];
        $page_id = NULL;
        if ($page) {
            $section = Section::where('page_id', $page->id)->get();
            $page_id = $page->id;
            $faqs = Faq::where('page_id', $page_id)->get()->groupBy('section_no');
            $payments = PaymentType::where('page_id', $page_id)->get();
            $article_count = Article::where('page_id', $page->id)->count();

            if (($slug == 'event-news') || ($slug == 'market-news') || ($slug == 'company-news') || ($slug == 'trading-strategy') || ($slug == 'tutorials') || ($slug == 'prex-blogs')) {
                return $dataTable->with(['page_id' => $page_id, 'slug' => $slug])->render('admin.page.' . $slug, compact('slug', 'section', 'page', 'page_id'));
            }
        }

        if ($slug == "spread-list") {
            $spread_categories = SpreadCategory::all();

            return $spreadTable->render('admin.page.' . $slug, compact('slug', 'section', 'page', 'page_id', 'faqs', 'spread_categories'));
        }
        if ($slug == "shares-bonds") {
            $share_categories = ShareCategory::all();
            return $shareDataTable->render('admin.page.' . $slug, compact('slug', 'section', 'page', 'page_id', 'faqs', 'share_categories'));
        }
        if ($slug == "forex") {
            return $forexDataTable->render('admin.page.' . $slug, compact('slug', 'section', 'page', 'page_id', 'faqs'));
        }
        if ($slug == "index-cfds") {
            return $cfdDataTable->render('admin.page.' . $slug, compact('slug', 'section', 'page', 'page_id', 'faqs'));
        }
        if ($slug == "setting") {
            return $shareCategoryDataTable->render('admin.page.setting');
        }
        return view('admin.page.' . $slug, compact('slug', 'section', 'page', 'page_id', 'faqs', 'payments', 'contact_data'));
    }

    public function saveSection(Request $request, $sec_no)
    {
        $section = Section::where(['section_no' => $sec_no, 'page_id' => $request->page_id])->first();
        if (!$section) {
            $section = new Section();
        }
        if ($request->section_id) {
            $section = Section::where('id', $request->section_id)->first();
        }

        $section->page_id       =  $request->page_id;
        $section->section_no    =  $sec_no;
        $section->en_title      =  $request->en_title;
        $section->ja_title      =  $request->ja_title;
        $section->en_desc       =  $request->en_desc;
        $section->ja_desc       =  $request->ja_desc;
        $section->en_count_text =  $request->en_count_text;
        $section->ja_count_text =  $request->ja_count_text;
        $section->en_short_text =  $request->en_short_text;
        $section->ja_short_text =  $request->ja_short_text;
        $section->status        =  isset($request->status) ? 1 : 0;



        if ($request->image && ($request->hasFile('image'))) {
            $section->image = uploadFile($request->image, 'Section');
        } else if ($request->image == null) {
            $section->image = NULL;
        }

        //for ja_image in copy trading
        if ($request->ja_image && ($request->hasFile('ja_image'))) {
            $section->ja_image = uploadFile($request->ja_image, 'Section');
        } else if ($request->ja_image == null) {
            $section->ja_image = NULL;
        }
        if ($request->page_id == 23 || $request->page_id == 24 || $request->page_id == 18 || $request->page_id == 17) {
            $section->video_url     =  $request->video_url ? getYouTubeUniqueString($request->video_url) : NULL;
        } else if ($request->video && ($request->hasFile('video'))) {
            $section->video_url = uploadFile($request->video, 'Video');
        }
        $section->save();

        if ($request->spread && count($request->spread)) {
            foreach ($request->spread['en_name'] as $key => $en_cat) {
                $spread_cat = new SpreadCategory();
                if (isset($request->spread['spread_cat_id']) && $request->spread['spread_cat_id'][$key]) {
                    $spread_cat = SpreadCategory::find($request->spread['spread_cat_id'][$key]);
                }
                $spread_cat->en_name = $en_cat;
                $spread_cat->ja_name = $request->spread['ja_name'][$key];

                $spread_cat->save();
            }
        }


        if (isset($request->contact_remove_ids)) {
            ContactPage::whereIn('id', explode(',', $request->contact_remove_ids))->delete();
        }

        if (isset($request->contact)) {
            foreach ($request->contact as $key => $value) {
                $contact = new ContactPage();

                if (isset($value['contact_id']) && $value['contact_id']) {
                    $contact = ContactPage::where('id', $value['contact_id'])->first();
                }
                $contact->page_id   =  $request->page_id;
                $contact->en_title  =  $value['en_title'];
                $contact->ja_title  =  $value['ja_title'];
                $contact->value     =  $value['value'];

                $contact->save();
            }
        }

        if (isset($request->remove_subsec_ids)) {
            SubSection::whereIn('id', explode(',', $request->remove_subsec_ids))->delete();
        }

        if (isset($request->remove_legel_document_id)) {
            SubSection::whereIn('id', explode(',', $request->remove_legel_document_id))->delete();
        }

        if (isset($request->legel_document) && count($request->legel_document)) {

            foreach ($request->legel_document as $key => $value) {
                $sub = new SubSection();
                if (isset($value['section_ids']) && $value['section_ids']) {
                    $sub = SubSection::where('id', $value['section_ids'])->first();
                }

                if (isset($value['type']) && ($value['type'] == 2)) {
                    $sub->image = $value['image'] ?: $sub->image;
                } else if (isset($value['image']) && (getType($value['image']) == "object")) {
                    $sub->image = uploadFile($value['image'], 'SubSection');
                }

                $sub->section_id    =  $section->id;
                $sub->page_id       =  $request->page_id;
                $sub->en_title      =  $value['en_title'] ?? '';
                $sub->ja_title      =  $value['ja_title'] ?? '';
                $sub->save();
            }
        }

        if (isset($request->sub_section) && count($request->sub_section)) {
            foreach ($request->sub_section as $key => $value) {
                // if($value['en_desc'] || $value['ja_desc']) {
                $sub = new SubSection();
                if (isset($value['sub_section_id']) && $value['sub_section_id']) {
                    $sub = SubSection::where('id', $value['sub_section_id'])->first();
                }
                if (isset($value['image']) && (getType($value['image']) == "object")) {
                    $sub->image = uploadFile($value['image'], 'SubSection');
                } else if (isset($value['image'])) {
                    $sub->image = $value['image'];
                }

                if (isset($value['ja_image'])) {
                    $sub->ja_image = uploadFile($value['ja_image'], 'SubSection');
                }
                $sub->section_id    =  $section->id;
                $sub->page_id       =  $request->page_id;
                $sub->en_title      =  $value['en_title'] ?? '';
                $sub->ja_title      =  $value['ja_title'] ?? '';
                $sub->en_desc       =  $value['en_desc'] ?? '';
                $sub->ja_desc       =  $value['ja_desc'] ?? '';
                $sub->en_count_text =  isset($value['en_count_text']) ? $value['en_count_text'] : '';
                $sub->ja_count_text =  isset($value['ja_count_text']) ? $value['ja_count_text'] : '';
                $sub->en_short_text =  isset($value['en_short_text']) ? $value['en_short_text'] : '';
                $sub->ja_short_text =  isset($value['ja_short_text']) ? $value['ja_short_text'] : '';
                $sub->icon          =  isset($value['icon']) ? $value['icon'] : '';
                $sub->status        =  isset($value['status']) ? 1 : 0;

                $sub->save();
                // }
            }
        }

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    public function uploadPageBackground(Request $request, $slug)
    {
        $page = MenuPage::where('slug', $slug)->first();

        if ($request->bg_image && ($request->hasFile('bg_image'))) {
            $page->bg_img = uploadFile($request->bg_image, 'PageCover');
        } else if (!$request->bg_image) {
            $page->bg_img = null;
        }

        $page->save();

        return redirect()->back();
    }

    public function addUpdateFaq(Request $request)
    {
        if (isset($request->faq_remove_id)) {
            Faq::whereIn('id', explode(',', $request->faq_remove_id))->delete();
        }

        foreach ($request->faq as $key => $value) {
            if ($value['en_question'] || $value['ja_question'] || $value['en_answer'] || $value['ja_answer']) {
                $faq = new Faq();

                if (isset($value['faq_id']) && $value['faq_id']) {
                    $faq = Faq::where('id', $value['faq_id'])->first();
                }

                $faq->page_id   =   $request->page_id;
                $faq->en_question = $value['en_question'];
                $faq->ja_question = $value['ja_question'];
                $faq->en_answer = $value['en_answer'];
                $faq->ja_answer = $value['ja_answer'];

                $faq->save();
            } else {
                $faq = Faq::where('id', $value['faq_id'])->delete();
            }
        }

        return redirect()->back()->with('success', 'Faq updated successfully');
    }

    public function saveMultipleSection(Request $request)
    {
        if (isset($request->remove_sec_ids)) {
            Section::whereIn('id', explode(',', $request->remove_sec_ids))->delete();
        }
        if (isset($request->remove_faq_ids)) {
            Faq::whereIn('id', explode(',', $request->remove_faq_ids))->delete();
        }

        if (isset($request->section)) {
            foreach ($request->section as $key => $value) {
                $section = new Section();

                if (isset($value['section_id']) && $value['section_id']) {
                    $section = Section::where('id', $value['section_id'])->first();
                }

                $section->page_id       =  $request->page_id;
                $section->section_no    =  $value['sec_no'];
                $section->en_title      =  $value['en_title'];
                $section->ja_title      =  $value['ja_title'];
                $section->en_desc       =   isset($value['en_desc']) ? $value['en_desc'] : '';
                $section->ja_desc       =   isset($value['ja_desc']) ? $value['ja_desc'] : '';
                $section->en_count_text =  isset($value['en_count_text']) ? $value['en_count_text'] : '';
                $section->ja_count_text =  isset($value['ja_count_text']) ? $value['ja_count_text'] : '';
                $section->en_short_text =  isset($value['en_short_text']) ? $value['en_short_text'] : '';
                $section->ja_short_text =  isset($value['ja_short_text']) ? $value['ja_short_text'] : '';
                $section->status        = isset($value['status']) ? 1 : 0;
                if (isset($value['type']) && $value['type'] == 2) {
                    $section->image = $value['image'];
                } else {
                    if (isset($value['image']) && getType($value['image']) == "object") {
                        $section->image = uploadFile($value['image'], 'Section');
                    }
                }
                $section->save();
            }

            return redirect()->back()->with('success', 'Data updated successfully');
        }

        if (isset($request->faq)) {
            $sectionData = Section::updateOrCreate(
                [
                    'page_id'    => $request->page_id,
                    'section_no' => $request->section_no,
                ],
                [
                    'en_title'      =>  $request->en_title,
                    'ja_title'      =>  $request->ja_title,
                ]
            );

            foreach ($request->faq as $key => $value) {

                $faq = new Faq();

                if (isset($value['faq_id']) && $value['faq_id']) {
                    $faq = Faq::where('id', $value['faq_id'])->first();
                }

                $faq->page_id       =  $request->page_id;
                $faq->section_id    =  $sectionData->id;
                $faq->section_no    =  $request->section_no;
                $faq->en_question   =  $value['en_question'];
                $faq->ja_question   =  $value['ja_question'];
                $faq->en_answer     =  $value['en_answer'];
                $faq->ja_answer     =  $value['ja_answer'];

                $faq->save();
            }

            return redirect()->back()->with('success', 'Data updated successfully');
        }
    }

    public function savePaymentType(Request $request)
    {
        if (isset($request->remove_payment_id)) {
            PaymentType::whereIn('id', explode(',', $request->remove_payment_id))->delete();
        }

        foreach ($request->section as $value) {
            $section = new PaymentType();

            if (isset($value['payment_id'])) {
                $section = PaymentType::where('id', $value['payment_id'])->first();
            }

            $section->page_id       =  $request->page_id;
            $section->section_no    =  $value['sec_no'] ?? NULL;
            $section->payment_name  =  $value['payment_name'] ?? NULL;
            $section->ja_payment_name  =  $value['ja_payment_name'] ?? NULL;
            $section->payment_link  =  $value['payment_link'] ?? NULL;
            $section->en_desc       =  $value['en_desc'] ?? NULL;
            $section->ja_desc       =  $value['ja_desc'] ?? NULL;
            $section->status        =  !isset($value['status']) ? 0 : (!$value['status'] ? 0 : 1);

            if (isset($value['logo'])) {
                $section->logo = uploadFile($value['logo'], 'Payment');
            }

            $section->save();
        }

        return redirect()->back()->with('success', 'Data updated successfully');
    }

    public function article($slug, $article = NULL)
    {
        $page = MenuPage::where('slug', $slug)/* ->pluck('id') */->first();
        $page_id = $page ? $page->id : 0;
        $article = Article::find($article);
        $authors = ArticleAuthor::all();
        $categories = ArticleCategory::all();

        return view('admin.common.article_form', compact('page_id', 'slug', 'article', 'authors', 'categories'));
    }

    public function articleSave(Request $request)
    {
        $article = new Article();
        if ($request->article_id) {
            $article = Article::find($request->article_id);
        }
        $article->page_id = $request->page_id;
        $article->en_title = $request->en_title;
        $article->ja_title = $request->ja_title;
        $article->en_desc = $request->en_desc;
        $article->ja_desc = $request->ja_desc;
        $article->tags    = $request->tags;
        $article->event_date  = $request->event_date;
        $article->category = $request->category;
        $article->author_id = $request->author_id;
        $article->category_id = $request->category_id;

        /* if ($request->hasFile('image')) {
            $article->image = uploadFile($request->image, 'Article');
        } else if ($request->image == null) {
            $article->image = null;
        } */

        if ($request->hasFile('image')) {
            $article->thumb_img = uploadFile($request->image, 'ArticleThumb');
            $article->image = uploadFile($request->image, 'Article');
        } else if ($request->thumb_img == null) {
            $article->thumb_img = null;
        }

        if ($request->hasFile('sub_image')) {
            $article->sub_image = uploadFile($request->sub_image, 'Article');
        } else if ($request->sub_image == null) {
            $article->sub_image = null;
        }

        $article->save();

        return redirect()->back()->with('success', 'Successfully update');
    }

    public function faqPage($slug)
    {
        $page_id = MenuPage::where('slug', $slug)->pluck('id')->first();
        $faqs = Faq::where('page_id', $page_id)->get();
        return view('admin.common.faq', compact('page_id', 'faqs'));
    }

    public function updateSetting(Request $request)
    {
        if ($request->remove_sec_ids != '') {
            Setting::whereIn('id', explode(',', $request->remove_sec_ids))->delete();
        }
        if ($request->remove_platform_ids != '') {
            Setting::whereIn('id', explode(',', $request->remove_platform_ids))->delete();
        }
        if ($request->setting != null) {
            foreach ($request->setting as $key => $value) {
                $data = Setting::where('key', $key)->first();
                if (!$data) {
                    $data = new Setting();
                    $data->key = $key;
                } else {
                    $data->key = $key;
                }

                if (($key == 'terms_header_img') || ($key == 'privacy_header_img') || ($key == 'blog_bottom_banner') || ($key == 'blog_side_banner') || (str_contains($key, 'payment_')) || (str_contains($key, 'platform_'))) {
                    $data->value = uploadFile($value, 'Setting');
                } else {
                    $data->value = $value ?: NULL;
                }
                $data->save();
            }
        }

        return redirect()->back()->with('success', 'Data updated..');
    }

    public function newsLetter(NewsLetterDataTable $dataTable)
    {
        return $dataTable->render('admin.newsletter');
    }

    public function contactUser(ContactUsersDataTable $dataTable)
    {
        return $dataTable->render('admin.contact_users');
    }

    public function commonSection()
    {
        return view('admin.common.common_section');
    }

    public function articleeChangeStatus(Request $request)
    {
        $article = Article::where('id', $request->article_id)->first();
        if ($article) {
            $article->status = $request->status;
            $article->save();

            return true;
        }
        return false;
    }

    public function addUpdateSpread(SpreadRequest $request)
    {
        $spread = new Spread();
        if ($request->spread_id) {
            $spread = Spread::find($request->spread_id);
        }

        $spread->category_id        =   $request->category_id;
        $spread->symbol             =   $request->symbol;
        $spread->ja_symbol          =   $request->ja_symbol;
        $spread->ultimate_account   =   $request->ultimate_account;
        $spread->premium_account    =   $request->premium_account;
        $spread->starter_account    =   $request->starter_account;

        $spread->save();

        return 1;
    }

    public function getSpread(Request $request)
    {
        $spread = Spread::find($request->id);

        return $spread;
    }

    public function deleteSpread(Request $request)
    {
        $spread = Spread::find($request->id);

        return $spread->delete();
    }

    public function viewCategory(ArticleCategoryDataTable $articleCategoryDataTable)
    {
        return $articleCategoryDataTable->render('admin.page.setting');
    }

    public function editCategory(Request $request)
    {
        $category = ArticleCategory::find($request->id);
        return $category;
    }

    public function deleteCategory(Request $request)
    {
        $category = ArticleCategory::find($request->id);

        $category->delete();
        return 1;
    }

    public function viewShareCategory(ShareCategoryDataTable $shareCategoryDataTable)
    {

        return $shareCategoryDataTable->render('admin.page.setting');
    }

    public function addShareCategory(ShareCategoryRequest $request)
    {
        $cat = new ShareCategory();
        if (isset($request->share_category_id)) {
            $cat = ShareCategory::find($request->share_category_id);
        }

        $cat->en_name = $request->en_name;
        $cat->ja_name = $request->ja_name;

        $cat->save();
        return 1;
    }

    public function editShareCategory(Request $request)
    {
        $category = ShareCategory::find($request->id);
        return $category;
    }

    public function deleteShareCategory(Request $request)
    {
        $category = ShareCategory::find($request->id);

        return $category->delete();
    }

    public function addUpdateForex(Request $request)
    {
        $share = new Forex();
        if ($request->forex_id) {
            $share = Forex::find($request->forex_id);
        }

        $share->symbol   =   $request->symbol;
        $share->ja_symbol   =   $request->ja_symbol;

        $share->description             =   $request->description;
        $share->ja_description             =   $request->ja_description;

        $share->currency_base        =   $request->currency_base;
        $share->ja_currency_base        =   $request->ja_currency_base;

        $share->margin_currency          =   $request->margin_currency;
        $share->ja_margin_currency          =   $request->ja_margin_currency;

        $share->contract_size    =   $request->contract_size;
        $share->ja_contract_size    =   $request->ja_contract_size;

        $share->max_levarage          =   $request->max_levarage;
        $share->ja_max_levarage          =   $request->ja_max_levarage;

        $share->max_volume_trade    =   $request->max_volume_trade;
        $share->ja_max_volume_trade    =   $request->ja_max_volume_trade;

        $share->min_volume_trade             =   $request->min_volume_trade;
        $share->ja_min_volume_trade             =   $request->ja_min_volume_trade;

        $share->long_swap    =   $request->long_swap;
        $share->ja_long_swap    =   $request->ja_long_swap;

        $share->short_swap    =   $request->short_swap;
        $share->ja_short_swap    =   $request->ja_short_swap;

        $share->holding_period    =   $request->holding_period;
        $share->ja_holding_period    =   $request->ja_holding_period;

        $share->grant_date    =   $request->grant_date;
        $share->ja_grant_date    =   $request->ja_grant_date;

        $share->trading_hours    =   $request->trading_hours;
        $share->ja_trading_hours    =   $request->ja_trading_hours;

        $share->save();

        return redirect()->back();
    }

    public function addUpdateCfd(Request $request)
    {
        $share = new Cfd();
        if ($request->cfd_id) {
            $share = Cfd::find($request->cfd_id);
        }

        $share->symbol   =   $request->symbol;
        $share->ja_symbol   =   $request->ja_symbol;

        $share->description             =   $request->description;
        $share->ja_description             =   $request->ja_description;

        $share->type             =   $request->type;
        $share->ja_type             =   $request->ja_type;

        $share->currency_base        =   $request->currency_base;
        $share->ja_currency_base        =   $request->ja_currency_base;

        $share->margin_currency          =   $request->margin_currency;
        $share->ja_margin_currency          =   $request->ja_margin_currency;

        $share->max_levarage          =   $request->max_levarage;
        $share->ja_max_levarage          =   $request->ja_max_levarage;

        $share->contract_size    =   $request->contract_size;
        $share->ja_contract_size    =   $request->ja_contract_size;

        $share->max_volume_trade    =   $request->max_volume_trade;
        $share->ja_max_volume_trade    =   $request->ja_max_volume_trade;

        $share->min_volume_trade             =   $request->min_volume_trade;
        $share->ja_min_volume_trade             =   $request->ja_min_volume_trade;

        $share->day_swap    =   $request->day_swap;
        $share->ja_day_swap    =   $request->ja_day_swap;

        $share->trading_hours    =   $request->trading_hours;
        $share->ja_trading_hours    =   $request->ja_trading_hours;

        $share->save();

        return redirect()->back();
    }

    public function addUpdateShare(ShareRequest $request)
    {
        $share = new Share();
        if ($request->share_id) {
            $share = Share::find($request->share_id);
        }

        $share->category_id        =   $request->category_id;
        $share->symbol   =   $request->symbol;
        $share->ja_symbol   =   $request->ja_symbol;

        $share->description             =   $request->description;
        $share->ja_description             =   $request->ja_description;

        $share->type    =   $request->type;
        $share->ja_type    =   $request->ja_type;

        $share->currency_base        =   $request->currency_base;
        $share->ja_currency_base        =   $request->ja_currency_base;

        $share->margin          =   $request->margin;
        $share->ja_margin          =   $request->ja_margin;

        $share->max_levarage    =   $request->max_levarage;
        $share->ja_max_levarage    =   $request->ja_max_levarage;

        $share->contract    =   $request->contract;
        $share->ja_contract    =   $request->ja_contract;

        $share->min_trade_size             =   $request->min_trade_size;
        $share->ja_min_trade_size             =   $request->ja_min_trade_size;

        $share->max_trade_size          =   $request->max_trade_size;
        $share->ja_max_trade_size          =   $request->ja_max_trade_size;

        $share->short_swap    =   $request->short_swap;
        $share->ja_long_swap    =   $request->ja_long_swap;

        $share->long_swap    =   $request->long_swap;
        $share->ja_short_swap    =   $request->ja_short_swap;

        $share->holding_period    =   $request->holding_period;
        $share->ja_holding_period    =   $request->ja_holding_period;

        $share->day_swap    =   $request->day_swap;
        $share->ja_day_swap    =   $request->ja_day_swap;

        $share->trading_hours    =   $request->trading_hours;
        $share->ja_trading_hours    =   $request->ja_trading_hours;

        $share->save();

        return 1;
    }

    public function getShare(Request $request)
    {
        $share = Share::find($request->id);

        return $share;
    }

    public function getCfd(Request $request)
    {
        $share = Cfd::find($request->id);

        return $share;
    }

    public function getForex(Request $request)
    {
        $forex = Forex::find($request->id);

        return $forex;
    }

    public function deleteShare(Request $request)
    {
        $share = Share::find($request->id);

        return $share->delete();
    }

    public function deleteCfd(Request $request)
    {
        $share = Cfd::find($request->id);

        return $share->delete();
    }

    public function deleteForex(Request $request)
    {
        $share = Forex::find($request->id);

        return $share->delete();
    }
}
