<div class="breadcrumb-area">
    <h1>{{ $breadcrumb_name }}</h1>
    <ol class="breadcrumb">
        <li class="item"><a href="{{ $page_name_th_url }}">{{ $page_name_th }}</a></li>
        @if ($page_name_v1 != null)
            <li class="item"><a href="{{ $page_name_v1_url }}">{{ $page_name_v1 }}</a></li>
        @endif
        @if ($page_name_v2 != null)
            <li class="item"><a href="{{ $page_name_v2_url }}">{{ $page_name_v2 }}</a></li>
        @endif
    </ol>
</div>