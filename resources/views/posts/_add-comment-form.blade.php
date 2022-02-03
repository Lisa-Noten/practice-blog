@auth
    <form method="POST" action="/posts/{{ $post->slug }}/comments" class="border border-gray-100 p-6 rounded-xl space-x-4">
        @csrf
        <header class="flex items-center">
            <img src="/images/lary-head.svg" alt="avatar" width='40'>
            <h2 class="ml-4">Post a comment</h2>
        </header>
        <div class="mt-6">
            <textarea name="body" class='w-full text-sm' cols="30" rows="10" placeholder="Comment..." required></textarea>

            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flext justify-end">
            <button type="submit">Post</button>
        </div>
    </form>
@else
    <p>
        <br><a href="/login" class="hover:underline">Login</a> or <a href="/register" class="hover:underline">register</a> to
        comment
    </p>
@endauth
