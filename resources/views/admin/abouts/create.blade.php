<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ __('New About') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-lg sm:rounded-lg">
                

                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                
                <form method="POST" action="{{ route('admin.abouts.store') }} " enctype="multipart/form-data" class="space-y-6"> 
                @csrf
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-gray-700 font-medium" />
                        <x-text-input id="name" class="block mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-indigo-500 focus:border-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('Thumbnail')" class="text-gray-700 font-medium" />
                        <x-text-input id="thumbnail" class="block mt-2 w-full border border-gray-300 rounded-md p-3 focus:ring-indigo-500 focus:border-indigo-500" type="file" name="thumbnail" required autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Type')" class="text-gray-700 font-medium" />
                        
                        <select name="type" id="type" class="py-3 rounded-lg pl-3 w-full border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Choose type</option>
                            <option value="Visions">Visions</option>
                            <option value="Missions">Missions</option>
                        </select>

                        <x-input-error :messages="$errors->get('type')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <h3 class="text-indigo-700 text-lg font-bold mt-6">Keypoints</h3>

                    <div class="mt-4">
                        <div class="flex flex-col gap-y-4">
                            @for ($i = 0; $i < 3; $i++)
                            <input type="text" class="py-3 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Write your keypoint" name="keypoints[]">
                            
                            @endfor
                            
                        </div>
                        <x-input-error :messages="$errors->get('keypoints')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="flex items-center justify-end mt-6">
                        <button type="submit" class="font-bold py-3 px-8 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                            Add New About
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
