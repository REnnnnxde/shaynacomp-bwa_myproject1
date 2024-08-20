<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('New Client') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-lg sm:rounded-lg">
                <form method="POST" action=" " enctype="multipart/form-data" class="space-y-6">

                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
                        <x-text-input id="name" class="block mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="occupation" :value="__('Occupation')" class="text-gray-700 font-medium" />
                        <x-text-input id="occupation" class="block mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-indigo-500 focus:border-indigo-500" type="text" name="occupation" :value="old('occupation')" required autofocus autocomplete="occupation" />
                        <x-input-error :messages="$errors->get('occupation')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="avatar" :value="__('Avatar')" class="text-gray-700 font-medium" />
                        <x-text-input id="avatar" class="block mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-indigo-500 focus:border-indigo-500" type="file" name="avatar" required autofocus autocomplete="avatar" />
                        <x-input-error :messages="$errors->get('avatar')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('Logo')" class="text-gray-700 font-medium" />
                        <x-text-input id="logo" class="block mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-indigo-500 focus:border-indigo-500" type="file" name="logo" required autofocus autocomplete="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="font-bold py-3 px-8 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                            Add New Client
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
