<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
                {{ __('Manage Products') }}
            </h2>
            <a href="{{ route('admin.products.create') }}" class="font-bold py-3 px-6 bg-indigo-600 hover:bg-indigo-500 hover:scale-105 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                Add New Product
            </a>
        </div>
    </x-slot>
    
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-8 space-y-6">
 
                @forelse ($products as $product)
                    <div class="flex flex-col md:flex-row justify-between items-center bg-gray-50 p-4 rounded-lg shadow-md">
                        <div class="flex flex-row items-center gap-x-4">
                            <img src="{{ Storage::url($product->thumbnail) }}" alt="" class="rounded-2xl object-cover w-24 h-24">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-900 text-xl font-semibold">{{ $product->name }}</h3>
                            </div>
                        </div> 
                        <div class="mt-4 md:mt-0 flex gap-x-4">
                            <div class="hidden md:flex flex-col">
                                <p class="text-slate-500 text-sm">Date</p>
                                <h3 class="text-indigo-900 text-xl font-semibold">{{ $product->created_at }}</h3>
                            </div>
                            <a href="{{ route('admin.products.edit', $product) }}" class="font-bold py-2 px-4 bg-indigo-600 hover:bg-indigo-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                                Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');"> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-2 px-4 bg-red-600 hover:bg-red-500 text-white rounded-full shadow-md transition duration-300 ease-in-out">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div> 
                @empty
                    <p class="text-center text-gray-600">No products found</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
