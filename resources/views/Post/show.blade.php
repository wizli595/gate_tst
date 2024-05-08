<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>

        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
                        <p class="text-lg">{{ $post->content }}</p>
                        <div class="mt-4">
                            <div>
                                <button class="bg-gray-500 hover:bg-red-700 font-bold py-2 px-4 rounded">
                                    <a href="{{ route('posts.edit', $post) }}" >Edit</a>
                                </button>
                            </div>
                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                    <div>
                        likes: {{ count($post->likes) }} 
                    </div>
                    <div class="p-6 text-gray-900">
                        <h1 class="text-3xl font-bold">Comments</h1>
                        <div class="mt-4">
                          
                            <table class="table-auto w-full">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2">Content</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post->comments as $comment)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $comment->content }}</td>
                                            @can(['update','delete'], $comment)
                                                
                                            <td class="border px-4 py-2">
                                                <form action="{{ route('comments.update', [$post, $comment]) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" name="content" class="form-control py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-transparent" value="{{ $comment->content }}">
                                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">update</button>
                                                </form>
                                    
                                                <form action="{{ route('comments.destroy', [$post, $comment]) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                                                </form>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

