@if($paginator->hasPages())
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if(is_array($elements[0]) && count($elements[0]) > 1 )
                    @if($paginator->onFirstPage())
                        <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"><i class="fa fa-chevron-left"></i></a></li>
                    @else
                        <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"  data-href="{{$paginator->previousPageUrl()}}"><i class="fa fa-chevron-left"></i></a></li>
                    @endif

                    @if(is_array($elements[0]))
                        @foreach($elements[0] as $page => $url)

                                <li class="page-item {{ ( (!isset($_GET['page']) && $page == 1) || (isset($_GET['page']) && $_GET['page'] == $page)) ? "active" : "" }}"><a class="page-link" href="javascript:void(0);" data-id="{{$page}}" data-href="{{$url}}">{{$page}}</a></li>
                        @endforeach
                    @endif

                    @if($paginator->hasMorePages())
                            <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);" data-href="{{$paginator->previousPageUrl()}}"><i class="fa fa-chevron-right"></i></a></li>
                    @else
                            <li class="page-item page-prvnxt-btn"><a class="page-link" href="javascript:void(0);"><i class="fa fa-chevron-right"></i></a></li>
                    @endif
                @endif
            </ul>
        </nav>
@endif
