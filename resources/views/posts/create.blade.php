<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CFPM News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-gray-900 dark:text-gray-100">
                    {{ __("Create") }}
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="">
                            <div class="flex flex-col">
                                <label for="title" class="text-lg font-medium mb-2">Titre</label>
                                <input type="text" name="title" id="title" class="py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div class="flex flex-col">
                                <label for="description" class="text-lg font-medium mb-2">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>
                            <div>
                                <label for="categories">Categories</label>
                                {{-- <select name="categories[]" id="categories" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select> --}}
                                @foreach($categories as $category)
                                    <div>
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                                        <label>{{ $category->title }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="flex justify-end">
                                <input type="submit" value="Enregistrer" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
