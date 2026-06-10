<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Редактировать пост') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="title" value="Заголовок" />
                            <x-text-input id="title" name="title" value="{{ old('title', $post->title) }}" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('title')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="slug" value="Slug" />
                            <x-text-input id="slug" name="slug" value="{{ old('slug', $post->slug) }}" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('slug')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="category_id" value="Категория" />
                            <select id="category_id" name="category_id"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="short_description" value="Краткое описание" />
                            <textarea id="short_description" name="short_description" rows="2"
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('short_description', $post->short_description) }}</textarea>
                        </div>

                        <div>
                            <x-input-label for="full_description" value="Полное описание" />
                            <textarea id="full_description" name="full_description" rows="6"
                                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('full_description', $post->full_description) }}</textarea>
                        </div>

                        <div>
                            <x-input-label for="image" value="Изображение" />
                            @if($post->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->image) }}" class="h-20 rounded">
                                </div>
                            @endif
                            <input id="image" type="file" name="image"
                                   class="mt-1 block w-full text-gray-700 dark:text-gray-300">
                            <x-input-error :messages="$errors->get('image')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="published_at" value="Дата публикации" />
                            <input id="published_at" type="datetime-local" name="published_at"
                                   value="{{ old('published_at', $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}"
                                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        </div>

                        <div class="flex gap-2 mt-4">
                            <x-primary-button>Сохранить</x-primary-button>
                            <a href="{{ route('admin.posts.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Отмена
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
