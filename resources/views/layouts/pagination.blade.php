
<nav aria-label="...">
    <ul class="pagination">

        <li class="page-item {{ $paginator-> previousPageUrl()?'':'disabled' }}">
            <a class="page-link" href="{{ $paginator->previousPageUrl()?:'#' }}"><< Précédent</a>
        </li>


        @for($i=1;$i<=$paginator->lastPage();$i++)
        <li class="page-item {{ ($paginator->currentPage() == $i)?'active':'' }}" aria-current="page">
            <a class="page-link" href="{{ ($paginator->currentPage() == $i)?'#':$paginator->url($i) }}">{{ $i }}</a>
        </li>
        @endfor


        <li class="page-item">
            <a class="page-link {{ $paginator->nextPageUrl()?'':'disabled' }}" href="{{ $paginator->nextPageUrl()?:'#' }}">Suivant >></a>
        </li>
    </ul>
</nav>
