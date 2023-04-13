<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des stagiaires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-3">
                <a href="{{ route('stagiaires.create') }}" class="btn btn-primary">{{ __('Ajouter un stagiaire') }}</a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('Nom') }}</th>
                            <th>{{ __('Prenom') }}</th>
                            <th>{{ __('Age') }}</th>
                            <th>{{ __('Date de création') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stagiaires as $stagiaire)
                            <tr>
                                <td>{{ $stagiaire->id }}</td>
                                <td>{{ $stagiaire->nom }}</td>
                                <td>{{ $stagiaire->prenom }}</td>
                                <td>{{ $stagiaire->age }}</td>
                                {{-- <td>{{ $stagiaire->created_at->format('d/m/Y') }}</td> --}}
                                <td>{{ $stagiaire->created_at }}</td>
                                <td>
                                    <a href="{{ route('stagiaires.show', $stagiaire->id) }}" class="btn btn-primary">{{ __('Afficher') }}</a>
                                    <a href="{{ route('stagiaires.edit', $stagiaire->id) }}" class="btn btn-warning">{{ __('Modifier') }}</a>
                                    <form action="{{ route('stagiaires.destroy', $stagiaire->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Êtes-vous sûr de vouloir supprimer ce stagiaire ?') }}')">{{ __('Supprimer') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <div>
                            {{ $moy}}
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
