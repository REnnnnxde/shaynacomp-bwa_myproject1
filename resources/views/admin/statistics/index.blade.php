<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                {{ __('Manage Statistics') }}
            </h2>
            <a href="{{ route('admin.statistics.create') }}" class="font-bold py-3 px-6 bg-indigo-600 hover:bg-indigo-500 hover:scale-105 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                Add New Statistics
            </a>
        </div>
    </x-slot>
    
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-8 space-y-6">

                @forelse($statistics as $statistic)
                    <div class="flex flex-col md:flex-row justify-between items-center bg-gray-50 p-4 rounded-lg shadow-md">
                        <div class="flex flex-row items-center gap-x-4">
                            <img src="{{ Storage::url($statistic->icon) }}" alt="" class="rounded-full object-cover w-24 h-24">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-900 text-xl font-semibold">{{ $statistic->name }}</h3>
                            </div>
                        </div>
                        <div class="mt-4 md:mt-0 flex flex-col md:flex-row items-center gap-x-4">
                            <div class="hidden md:flex flex-col">
                                <p class="text-gray-500 text-sm">Date</p>
                                <h3 class="text-indigo-900 text-xl font-semibold">{{ $statistic->created_at->format('d M, Y') }}</h3>
                            </div>
                            <div class="flex gap-x-4">
                                <a href="{{ route('admin.statistics.edit', $statistic) }}" class="font-bold py-2 px-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                                    Edit
                                </a>
                                <form action="{{ route('admin.statistics.destroy', $statistic) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this statistic?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-bold py-2 px-4 bg-red-600 hover:bg-red-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-600">Belum ada data terbaru!</p>
                @endforelse

            </div>
        </div>
    </div>
</x-app-layout>
