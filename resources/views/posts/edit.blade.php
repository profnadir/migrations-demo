<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CFPM News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Edit") }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.update', $post) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div class="flex flex-col">
                                <label for="title"  class="text-lg font-medium mb-2">Tite</label>
                                <input type="text" name="title" id="title" class="py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" value="{{ old('title', $post->title) }}">
                            </div>
                            <div class="flex flex-col"  class="text-lg font-medium mb-2">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $post->description) }}</textarea>
                            </div>
                            <div>
                                <label  class="text-lg font-medium mb-2">Catégories:</label>
                                @foreach($categories as $category)
                                    <div>
                                        <label for="{{ $category->id }}">
                                            <input type="checkbox" name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}" 
                                                {{ in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'checked' : '' }}
                                            >
                                            {{ $category->title }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div>
                                <input type="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
