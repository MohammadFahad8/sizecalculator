@if ($paginator->hasPages())
<div class="row">
    <div class="col-full">
        <nav class="pgn">
            <ul>
                @if ($paginator->onFirstPage())
                <li class="disabled"><span>← Prev </span></li>
                @else
                <li><a class="pgn__prev" href="{{ $paginator->previousPageUrl() }}">Prev</a></li>
                @endif
                @foreach ($elements as $element)
                @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                       <li class="pgn__num  " style="font-family: metropolis-bold, sans-serif;
                       font-size: 18px;
                       line-height: 2.4rem;
                       display: inline-block;
                       padding: .6rem 1.2rem;
                       height: 3.6rem;
                       margin: .3rem .15rem;
                       color: #151515;
                       border-radius: 3px;
                       -webkit-transition: all 0.3s ease-in-out;
                       transition: all 0.3s ease-in-out;
                       background-color: #151515;
                        color: #FFFFFF !important;
                       "><span>{{ $page }}</span></li>
                      
                    @else
                        <li><a class="pgn__num" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
                @endforeach
              
                
        @if ($paginator->hasMorePages())
        
        <li><a class="pgn__next" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
    @else
        <li class="disabled"><span>Next →</span></li>
    @endif
                
            </ul>
        
        </nav>
    </div>
</div>
@endif

