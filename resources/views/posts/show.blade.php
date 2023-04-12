<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <span class="text-yellow-500">{{ __('CFPM News') }}</span>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <span class="text-xl font-bold">{{ __("Latest News") }}</span>
                </div>
            </div>
            <div class="mt-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <div class="text-2xl font-bold">{{ $post->title }}</div>
                        <div class="text-gray-500 text-sm">{{ $post->description }}</div>
                        <div class="text-gray-500 text-sm">Created by : {{ $post->user->name }} at {{ $post->created_at }}</div>
                        <div>
                            <label  class="text-lg font-medium mb-2">Catégories:</label>
                            @foreach($post->categories as $category)
                                <div>
                                    <label for="{{ $category->id }}">
                                        <input type="checkbox" disabled name="categories[]" id="{{ $category->id }}" value="{{ $category->id }}" {{ in_array($category->id, $post->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        {{ $category->title }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-3">{{ $post->commentaires_count }} Commentaires </h2>
                    @foreach ($post->commentaires as $commentaire)
                        <div class="mb-3">
                            <div class="text-lg font-bold">{{ $commentaire->message }}</div>
                            <div class="text-gray-500 text-sm">{{ $commentaire->created_at }}</div>
                        </div>
                    @endforeach
                        
                </div>
            </div>
            <div class="mt-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('commentaires.store') }}" method="POST">
                        @csrf
                        <div class="">
                            <input type="hidden" name="post_id" value={{$post->id}}>
                            <div class="mb-3">
                                <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                                <textarea name="message" id="message" class="border-2 border-gray-400 p-2 w-full h-32" placeholder="Votre commentaire..."></textarea>
                            </div>
                            <div>
                                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Ajouter votre commentaire</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>    