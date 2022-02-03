
    <div x-data="{ show: false }"> {{-- x-data using alpine --}}
        <button @click="show = ! show" class="py-2 pl-3 pr-9 text-sm font-semibold">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
        </button>
        <div x-show="show" class="py-2 absolute">
            @foreach ($categories as $category)
                <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category')) }}" class="block text-left px-3 text-sm leading-6 hover:bg-gray-300">{{ $category->name }}</a>
            @endforeach
        </div>