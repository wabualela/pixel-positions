@props(['size' => 'base', 'tag' => \App\Models\Tag::first()])

@php
    $classes = 'bg-white/10 hover:bg-white/25 rounded-xl font-bold transition-colors duration-300';
    if ($size === 'sm') {
        $classes .= ' px-3 py-1 text-2xs';
    }

    if ($size === 'base') {
        $classes .= ' px-5 py-1 text-sm';
    }
@endphp
<a href="/tags/{{ $tag->name }}" class="{{ $classes }}">{{ $tag->name }}</a>
