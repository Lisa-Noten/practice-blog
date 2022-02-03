<x-layout>
    <x-setting :heading="'Edit post: ' . $post->title" >
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data"> {{-- enctype ensures I can upload the image--}}
            @csrf
            @method('PATCH')
                <x-form.input name="title" :value="old('title', $post->title)"/>
     
                <x-form.input name="slug" :value="old('slug', $post->slug)"/>
     
                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                    </div>
        
                    <img src="{{ asset('public/storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
                </div>

                <x-form.textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
                
                <x-form.textarea name="body" required>{{ old('body', $post->body) }}</x-form.textarea>
    
                <div class="mb-6">
                    <x-form.label name="category" />
    
                    <select name="category_id" id="category_id">
    
                        @foreach (\App\Models\Category::all(); as $category)
                            <option value="{{ $category->id}}" 
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                                {{ ucwords($category->name)}}</option>
                        @endforeach
                     </select>
    
                    <x-form.error name="category"/>
                </div>
    
                <x-submit-button>Publish</x-submit-button>
        </form>
    </x-setting>


</x-layout>