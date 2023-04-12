<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter une catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('categories.store') }}" method="POST" class="p-5">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">{{ __('Titre') }}</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
