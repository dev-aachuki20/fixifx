 @if ($paginator->hasPages())
<nav class="paginationBox" aria-label="Page navigation example">
<ul class="uk-pagination uk-flex-center" uk-margin>

    @if ($paginator->onFirstPage())
    <li class="disabled"><span><span uk-pagination-previous></span></span></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ config('app.locale') == 'ja' ? '前のページ' : 'to previous page' }}"><span uk-pagination-previous></span></a></li>
@endif

@foreach ($elements as $element)

@if (is_string($element))
<li class="disabled"><span>{{ $element }}</span></li>
@endif

@if (is_array($element))
@foreach ($element as $page => $url)
@if ($page == $paginator->currentPage())
<li class="uk-active"><span>{{ $page }}</span></li>
@else
<li><a href="{{ $url }}">{{ $page }}</a></li>
@endif
@endforeach
@endif
@endforeach

@if ($paginator->hasMorePages())
<li><a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ config('app.locale') == 'ja' ? '次のページ' : 'to next page' }}"><span uk-pagination-next></span></a></li>
@else
<li class="disabled"><span><span uk-pagination-next></span></span></li>
@endif
</ul>
</nav>
@endif