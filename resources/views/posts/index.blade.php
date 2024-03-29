{{-- @extends('layout')


@section('content') --}}

<x-layout>
    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-grid :posts="$posts" />

            {{ $posts->links() }}
        @else
            <p class="text-center">No posts yet</p>
        @endif
    </main>

    {{-- <body>
        @foreach ($posts as $post)
            {{-- @dd($loop); Info about the loop ($loop variable in storage) --}}
    {{-- <article> --}}
    {{-- <h1>
                    <a href="/posts/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h1> --}}

    {{-- <p>
                   By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                </p> --}}

    {{-- <div>
                    {{ $post->excerpt }}
                </div>
            </article> --}}
    {{-- @endforeach --}}
    {{-- </body> --}}
</x-layout>

{{-- @endsection --}}
