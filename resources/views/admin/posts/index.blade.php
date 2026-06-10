<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Управление постами') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <a href="{{ route('admin.posts.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Создать пост
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Название</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Категория</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Изображение</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Дата</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Действия</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4">{{ $post->id }}</td>
                                    <td class="px-6 py-4">{{ $post->title }}</td>
                                    <td class="px-6 py-4">{{ $post->category->name }}</td>
                                    <td class="px-6 py-4">
                                        @if($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200">

                                        @else
                                            <span class="text-gray-400 text-sm">Нет фото</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">{{ $post->created_at->format('d.m.Y') }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <a href="{{ route('admin.posts.edit', $post) }}"
                                               class="inline-flex items-center px-3 py-1 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Редактировать</a>
                                                <form method="POST" action="{{ route('admin.posts.destroy', $post) }}"
                                                  onsubmit="return confirm('Удалить пост?')">
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button>Удалить</x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
