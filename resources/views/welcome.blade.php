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
                    
                    @foreach ($posts as $post)
                        <div>
                            <div class="title"><a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a></div>
                            <div class="Description"> {{ $post->description }}</div>
                            <div class="by">Created by : {{ $post->user->name }} at {{ $post->created_at }} </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
