<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                {{ __('Manage Hero Sections') }}
            </h2>
            <a href="{{ route('admin.hero_sections.create') }}" class="font-bold py-3 px-6 bg-indigo-600 hover:bg-indigo-500 hover:scale-105 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                Add New Hero Section
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-8 space-y-6">

                @forelse ($hero_sections as $hero_section)
                    <div class="flex flex-col md:flex-row justify-between items-center bg-gray-50 p-4 rounded-lg shadow-md">
                        <div class="flex flex-row items-center gap-x-4">
                            <img src="{{ Storage::url($hero_section->banner) }}" alt="" class="rounded-xl object-cover w-24 h-24">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-900 text-xl font-semibold">{{ $hero_section->subheading }}</h3>
                                <p class="text-gray-600 text-sm">{{ $hero_section->created_at }}</p>
                            </div>
                        </div>
                        <div class="mt-4 md:mt-0 flex gap-x-4">
                            <a href="{{ route('admin.hero_sections.edit', $hero_section) }}" class="font-bold py-2 px-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                                Edit
                            </a>
                            <form action="{{ route('admin.hero_sections.destroy', $hero_section) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Hero Section?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-2 px-4 bg-red-600 hover:bg-red-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-600">No Hero Sections found.</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
