<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage About') }}
            </h2>
            <a href="{{ route('admin.clients.create') }}" class="font-bold py-3 px-6 bg-indigo-600 hover:bg-indigo-500 hover:scale-105 text-white rounded-full shadow-md transition duration-300 ease-in-out">
            Add New About
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($abouts as $about)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <img src="{{ Storage::url($about->thumbnail) }}" alt="{{ $about->name }}" class="rounded-2xl object-cover w-[90px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold">{{ $about->name }}</h3>
                            </div>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Type</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $about->type }}</h3>
                        </div>
                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $about->created_at->format('d M, Y') }}</h3>
                        </div>
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.abouts.edit', $about) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>
                            <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-500">No About Found</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
