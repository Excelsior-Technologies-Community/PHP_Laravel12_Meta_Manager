@php
$meta = \App\Models\MetaTag::where('page_name', request()->path())->first();
@endphp

<title>{{ $meta->meta_title ?? 'Default Title' }}</title>
<meta name="description" content="{{ $meta->meta_description ?? '' }}">
<meta name="keywords" content="{{ $meta->meta_keywords ?? '' }}">
