<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создать категорию') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
                        @csrf

                        <div>
                            <x-input-label for="name" value="Название" />
                            <x-text-input id="name" name="name" value="{{ old('name') }}" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('name')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="slug" value="Slug" />
                            <x-text-input id="slug" name="slug" value="{{ old('slug') }}" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('slug')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="description" value="Описание" />
                            <textarea id="description" name="description" rows="3"
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        </div>

                        <div class="mt-4">
                            <x-primary-button>Создать</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
