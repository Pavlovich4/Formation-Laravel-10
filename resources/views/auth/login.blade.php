<x-layout title="Connexion">
    <div class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
        <div class="relative bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10 w-1/3 h-65">
            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mx-auto max-w-md flex flex-col gap-2">
                    <h4 class="text-3xl mb-4">Connexion</h4>
                    <div class="flex flex-col">
                        <label for="title" class="font-semibold">Email</label>
                        <input type="email" value="{{ old('email') }}" id="email" name="email" class="border rounded py-2 px-2 shadow">
                        @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="password" class="font-semibold">Mot de passe</label>
                        <input type="password" value="{{ old('password') }}" id="password" name="password" class="border rounded py-2 px-2 shadow">
                        @error('password')
                        <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="bg-blue-500 text-white p-1 rounded text-xl hover:bg-blue-600 rounded">Submit</button>
                </div>
            </form>
        </div>
    </div>



</x-layout>
