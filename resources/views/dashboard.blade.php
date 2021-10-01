<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-jet-welcome /> -->
                <div class="col-md-12">
                <x-jet-button class="bg-gray-800 hover:bg-white hover:text-gray-900">
                <a href="{{ route('products') }}">
                    {{ __('Products Managment') }}
                </a>
                </x-jet-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
