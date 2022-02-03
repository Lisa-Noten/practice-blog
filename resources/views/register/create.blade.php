<x-layout>
    <section class="px-6 py-8">
        <main class='max-w-lg mx-auto'>
            <h1 class='pb-6 bg-gray-100'>Register</h1>
            <form  method="POST" action="/register">
                @csrf {{-- Adds a unique hidden input with a token that allows you to make requests like vardump inside a form--}}
                <div class="mb-6">
                    <label for="username">
                        username
                    </label>

                    <input class='border' type="text" name="username" id="username" value="{{ old('username') }}" required>
                </div>

                @error('username')
                    <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                @enderror

                <div class="mb-6">    
                    <label for="name">
                        Name
                    </label>
                    <input class='border' type="text" name="name" id="name" value="{{ old('name') }}" required>
                </div>

                @error('name')
                    <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                @enderror

                <div class="mb-6">    
                    <label for="email">
                        Email
                    </label>
                    <input class='border' type="text" name="email" id="email" value="{{ old('email') }}" required>
                </div>

                @error('email')
                    <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <label for="password">
                        Password
                    </label>

                    <input class='border' type="password" name="password" id="password" required>
                </div>

                @error('password')
                    <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                @enderror

                <div class="mb-6">
                    <button type="submit">
                        Submit
                    </button>
                </div>

                {{-- @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500 text-xs">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif --}}
            </form>
        </main>
    </section>
</x-layout>