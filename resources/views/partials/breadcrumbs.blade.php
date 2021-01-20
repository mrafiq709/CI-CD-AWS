<!-- begin:: Content Head -->
@if (count($breadcrumbs))
    <ul class="kt-menu__nav ">
    @foreach ($breadcrumbs as $breadcrumb)

        @if ($breadcrumb->url && !$loop->last)
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel">
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }} </a>
                <i class="la la-angle-right"></i>
            </li>
        @else
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel kt-menu__item--active">
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
            </li>
        @endif
    @endforeach
    </ul>
@endif
<!-- end:: Content Head -->
