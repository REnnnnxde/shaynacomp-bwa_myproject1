<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('New Hero Section') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-8 space-y-6">
                
                @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
                <form method="POST" action="{{ route('admin.hero_sections.store') }} " enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="heading" :value="__('Heading')" />
                        <x-text-input id="heading" class="block mt-1 w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="heading" :value="old('heading')" required autofocus autocomplete="heading" />
                        <x-input-error :messages="$errors->get('heading')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="banner" :value="__('Banner')" />
                        <x-text-input id="banner" class="block mt-1 w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="file" name="banner" required autofocus autocomplete="banner" />
                        <x-input-error :messages="$errors->get('banner')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="subheading" :value="__('Subheading')" />
                        <x-text-input id="subheading" class="block mt-1 w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="subheading" :value="old('subheading')" required autofocus autocomplete="subheading" />
                        <x-input-error :messages="$errors->get('subheading')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="achievement" :value="__('Achievement')" />
                        <x-text-input id="achievement" class="block mt-1 w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="achievement" :value="old('achievement')" required autofocus autocomplete="achievement" />
                        <x-input-error :messages="$errors->get('achievement')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="path_video" :value="__('Video Path')" />
                        <x-text-input id="path_video" class="block mt-1 w-full py-3 px-4 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="path_video" :value="old('path_video')" required autofocus autocomplete="path_video" />
                        <x-input-error :messages="$errors->get('path_video')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="font-bold py-3 px-6 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                            Add New Hero Section
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
