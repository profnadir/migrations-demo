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
                    {{ __("Latest News") }}
                </div>
            </div>
            <div class="mt-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div>
                            <div class="title">{{ $post->title }}</div>
                            <div class="Description"> {{ $post->description }}</div>
                            <div class="by">Created by : {{ $post->user->name }} at {{ $post->created_at }} </div>
                        </div>
                </div>
            </div>
            <div class="mt-5 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2>{{ $post->commentaires->count() }} Commentaires </h2>
                    <h2>{{ $post->commentaires_count }} Commentaires </h2>
                    @foreach ($post->commentaires as $commentaire)
                        <div>
                            <div class="message">{{ $commentaire->message }}</div>
                            <div class="at">{{ $commentaire->created_at }} </div>
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
                            <div>
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10"></textarea>
                            </div>
                            <div>
                                <input type="submit" value="Ajouter votre commentaire">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
