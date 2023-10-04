@php $submenu = App\Models\SubMenu::get() @endphp

<div class="innare-page-banner" style="background-image: url('{{ asset($page->bg_img) }}')">
    <div class="uk-container">
        @if(isset($blog_detail))
        <p class="page-header-h1">{{ $page->{config('app.locale').'_name'} }}</p>
        @else
        <h1 class="page-header-h1">{{ $page->{config('app.locale').'_name'} }}</h1>
        @endif
        <ol class="uk-breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="{{ route('page', [config('app.locale'), 'home']) }}">
                    <span itemprop="name">{{--config('app.name')--}}FiXi FX{{ config('app.locale') == 'ja' ? '（フィクシーFX）' : '' }}</span>
                </a>
                 <meta itemprop="position" content="1" />
            </li>
            <!-- <li><span>Forex Trading</span></li>
            <li><span>Trading Platforms</span></li> -->
            @if($page->sub_menu_id == 2)
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span itemprop="name">{{ $submenu->get(0)->{config('app.locale').'_name'} }}</span>
                 <meta itemprop="position" content="2" />
            </li>
            @else
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span itemprop="name">{{ $page->subMenu->{config('app.locale').'_name'} }}</span>
                 <meta itemprop="position" content="2" />
            </li>
            @endif
        </ol>
    </div>
</div>

@push('scripts')
<script>
    setTimeout(() => {
        $('.inner-features-wrap').find('ul').not('.in-faq-5, .blog-list-wrap, .uk-list-divider, .uk-pagination, .uk-slider-items').addClass('uk-list theme_bullet_list');
    }, 500);
</script>
@endpush