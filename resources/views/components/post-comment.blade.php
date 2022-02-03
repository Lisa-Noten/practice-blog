@props(['comment'])
<article class="flex bg-gray-100 p-6 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="/images/lary-head.svg" alt="avatar" width='60'>
    </div>
    <div>
        <header>
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <p class="text-xs">
                Posted on
                <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
            </p>
        </header>
            <p>
               {{ $comment->body }}
            </p>
    </div>
</article>