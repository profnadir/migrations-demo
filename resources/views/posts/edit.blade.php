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
                    {{ __("Edit") }} {{$post->title}}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.update',$post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="">
                            <div>
                                <label for="title">Tite</label>
                                <input type="text" name="title" id="title" value="{{ $post->title }}">
                            </div>
                            <div>
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>
                            </div>
                            <div>
                                <input type="submit" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
