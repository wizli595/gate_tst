<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('posts.create') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Post</a>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Content</th>
                                <th class="px-4 py-2">Likes</th>
                                <th class="px-4 py-2">comments</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td class="border px-4 py-2">{{ $post->title }}</td>
                                <td class="border px-4 py-2">{{ $post->content }}</td>
                                <td class="border px-4 py-2">{{ count($post->likes) }}</td>
                                <td class="border px-4 py-2">{{ count($post->comments) }}</td>
                                {{-- @can('view', $post) --}}
                                <td class="border px-4 py-2">
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700  font-bold py-2 px-4 rounded">View</a>
                                </td>
                                {{-- @endcan --}}
                                {{-- @cannot('view', $post) --}}
                                <td class="border px-4 py-2">
                                    <div>
                                        <button class="bg-gray-500 hover:bg-red-700 font-bold py-2 px-4 rounded">
                                            <a href="{{ route('posts.comments.create', $post) }}">
                                                Create Comment
                                            </a>
                                        </button>
                                    </div>
                                </td>
                                {{-- @endcannot --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
