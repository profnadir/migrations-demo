<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le stagiaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('stagiaires.update', $stagiaire->id) }}" method="POST" class="p-5">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nom" class="form-label">{{ __('Nom') }}</label>
                        <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom', $stagiaire->nom) }}" required>

                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="prenom" class="form-label">{{ __('Prenom') }}</label>
                        <input type="text" name="prenom" id="prenom" class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom', $stagiaire->prenom) }}" required>

                        @error('prenom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">{{ __('Titre') }}</label>
                        <input type="text" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $stagiaire->age) }}" required>

                        @error('age')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        <a href="{{ route('stagiaires.show', $stagiaire->id) }}" class="btn btn-secondary">{{ __('Annuler') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
