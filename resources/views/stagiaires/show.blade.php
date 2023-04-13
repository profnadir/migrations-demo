<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de la catégorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Titre') }}</label>
                    <div>{{ $category->title }}</div>
                </div>

                <div class="mb-3">
                    <label for="created_at" class="form-label">{{ __('Date de création') }}</label>
                    <div>{{ $category->created_at->format('d/m/Y H:i') }}</div>
                </div>

                <div class="mb-3">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette catégorie ?') }}')">{{ __('Supprimer') }}</button>
                    </form>
                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('Retour à la liste') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
