@props(['heading'])
<section class="py-8 max-w-sm mx-auto">
    <h1 class="text-lg font-bold mb-4 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>                
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : ''}}">All Posts</a>
                </li>
                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : ''}}">New post</a>
                </li>
            </ul>
        </aside>
    </div>

    <div class="flex-1">
        <x-panel>
            {{ $slot }}
        </x-panel>
    </div>
</section>