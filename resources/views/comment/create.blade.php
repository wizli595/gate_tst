<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Comment') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
         
                    <form method="POST" action="{{ route('posts.comments.store',$post) }}">
                        @csrf
                        <div class="p-6">
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-transparent" id="content" name="content" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="post_id" class="form-label">Post</label>
                                <input type="text" class="form-control py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-transparent" id="post_id" name="post_id" value="{{ $post->id }}" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary py-2 px-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-md">Submit</button>
                        </div>
                    </form>
        </div>
    </div>

</x-app-layout>