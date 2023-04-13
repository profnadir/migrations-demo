<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un stagiaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('stagiaires.store') }}" method="POST" class="p-5">
                    @csrf

                    <div class="mb-3">
                        <label for="nom" class="form-label">{{ __('Nom') }}</label>
                        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">{{ __('prenom') }}</label>
                        <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">{{ __('age') }}</label>
                        <input type="text" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age') }}" />
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        <a href="{{ route('stagiaires.index') }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
