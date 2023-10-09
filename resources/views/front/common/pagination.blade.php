@if ($paginator->hasPages())
<nav class="paginationBox" aria-label="Page navigation example">
    <ul class="pagination">

        @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="#">
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M-7.78848e-08 6.49988C-7.6074e-08 6.651 0.058649 6.80227 0.175799 6.91765L6.17578 12.8267C6.41023 13.0576 6.78988 13.0576 7.02418 12.8267C7.25848 12.5958 7.25863 12.2219 7.02418 11.9912L1.44839 6.49988L7.02418 1.00859C7.25863 0.777695 7.25863 0.403798 7.02418 0.17305C6.78973 -0.0576991 6.41008 -0.057847 6.17578 0.17305L0.175799 6.08211C0.058649 6.19748 -7.96956e-08 6.34875 -7.78848e-08 6.49988ZM4.97578 6.08211L10.9758 0.17305C11.2102 -0.057847 11.5899 -0.057847 11.8242 0.17305C12.0585 0.403946 12.0586 0.777843 11.8242 1.00859L6.24838 6.49988L11.8242 11.9912C12.0586 12.2221 12.0586 12.596 11.8242 12.8267C11.5897 13.0575 11.2101 13.0576 10.9758 12.8267L4.97578 6.91765C4.85863 6.80227 4.79999 6.651 4.79999 6.49988C4.79999 6.34875 4.85863 6.19748 4.97578 6.08211Z" fill="#1E1F1F" />
                </svg>
            </a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ config('app.locale') == 'ja' ? '前のページ' : 'to previous page' }}">
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M-7.78848e-08 6.49988C-7.6074e-08 6.651 0.058649 6.80227 0.175799 6.91765L6.17578 12.8267C6.41023 13.0576 6.78988 13.0576 7.02418 12.8267C7.25848 12.5958 7.25863 12.2219 7.02418 11.9912L1.44839 6.49988L7.02418 1.00859C7.25863 0.777695 7.25863 0.403798 7.02418 0.17305C6.78973 -0.0576991 6.41008 -0.057847 6.17578 0.17305L0.175799 6.08211C0.058649 6.19748 -7.96956e-08 6.34875 -7.78848e-08 6.49988ZM4.97578 6.08211L10.9758 0.17305C11.2102 -0.057847 11.5899 -0.057847 11.8242 0.17305C12.0585 0.403946 12.0586 0.777843 11.8242 1.00859L6.24838 6.49988L11.8242 11.9912C12.0586 12.2221 12.0586 12.596 11.8242 12.8267C11.5897 13.0575 11.2101 13.0576 10.9758 12.8267L4.97578 6.91765C4.85863 6.80227 4.79999 6.651 4.79999 6.49988C4.79999 6.34875 4.85863 6.19748 4.97578 6.08211Z" fill="#1E1F1F" />
                </svg>
            </a>
        </li>
        @endif

        @foreach ($elements as $element)

        @if (is_string($element))
        <li class="page-item disabled"><a class="page-link">{{ $element }}</a></li>
        @endif




        @if (is_array($element))
        @foreach ($element as $page => $url)

        @php
        $pageNumber = $page;
        $page = str_pad($pageNumber, 2, '0', STR_PAD_LEFT);
        @endphp

        @if ($page == $paginator->currentPage())
        <li class="page-item"><a class="page-link active">{{ $page }}</a></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ config('app.locale') == 'ja' ? '次のページ' : 'to next page' }}">
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6.49988C12 6.651 11.9414 6.80227 11.8242 6.91765L5.82422 12.8267C5.58977 13.0576 5.21012 13.0576 4.97582 12.8267C4.74152 12.5958 4.74137 12.2219 4.97582 11.9912L10.5516 6.49988L4.97582 1.00859C4.74137 0.777695 4.74137 0.403798 4.97582 0.17305C5.21027 -0.0576991 5.58992 -0.057847 5.82422 0.17305L11.8242 6.08211C11.9414 6.19748 12 6.34875 12 6.49988ZM7.02422 6.08211L1.02423 0.17305C0.789785 -0.057847 0.410136 -0.057847 0.175837 0.17305C-0.0584622 0.403946 -0.0586122 0.777843 0.175837 1.00859L5.75162 6.49988L0.175837 11.9912C-0.0586123 12.2221 -0.0586123 12.596 0.175837 12.8267C0.410286 13.0575 0.789935 13.0576 1.02423 12.8267L7.02422 6.91765C7.14137 6.80227 7.20001 6.651 7.20001 6.49988C7.20001 6.34875 7.14137 6.19748 7.02422 6.08211Z" fill="#1E1F1F" />
                </svg>
            </a>
        </li>
        @else
        <li class="page-item disabled">
            <a class="page-link" href="#">
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6.49988C12 6.651 11.9414 6.80227 11.8242 6.91765L5.82422 12.8267C5.58977 13.0576 5.21012 13.0576 4.97582 12.8267C4.74152 12.5958 4.74137 12.2219 4.97582 11.9912L10.5516 6.49988L4.97582 1.00859C4.74137 0.777695 4.74137 0.403798 4.97582 0.17305C5.21027 -0.0576991 5.58992 -0.057847 5.82422 0.17305L11.8242 6.08211C11.9414 6.19748 12 6.34875 12 6.49988ZM7.02422 6.08211L1.02423 0.17305C0.789785 -0.057847 0.410136 -0.057847 0.175837 0.17305C-0.0584622 0.403946 -0.0586122 0.777843 0.175837 1.00859L5.75162 6.49988L0.175837 11.9912C-0.0586123 12.2221 -0.0586123 12.596 0.175837 12.8267C0.410286 13.0575 0.789935 13.0576 1.02423 12.8267L7.02422 6.91765C7.14137 6.80227 7.20001 6.651 7.20001 6.49988C7.20001 6.34875 7.14137 6.19748 7.02422 6.08211Z" fill="#1E1F1F" />
                </svg>
            </a>
        </li>
        @endif
    </ul>
</nav>
@endif



{{-- @if ($paginator->hasPages())
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
@endif --}}