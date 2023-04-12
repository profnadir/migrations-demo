<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des catégories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">{{ __('Ajouter une catégorie') }}</a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Titre') }}</th>
                            <th>{{ __('Date de création') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">{{ __('Afficher') }}</a>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer cette catégorie ?') }}')">{{ __('Supprimer') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
