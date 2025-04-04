<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All comments') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="comment-list">
                        <ul>
                            @foreach($comments as $comment)
                            <li>
                                <h2>
                                    <a href="{{ route('posts.show', $comment->post->id) }}">
                                        {{ $comment->post->title }}
                                    </a>
                                    <p>Author: {{ $comment->post->user->name }}</p>
                                    @if ($comment->post->isPrivate)
                                        <span class="inline-block bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                                            private
                                        </span>
                                    @endif
                                </h2>

                                <h3>by {{ $comment->user->name }}</h3>
                                <p>{{ $comment->content }}</p>
                                
                                @if ($comment->user_id === auth()->id() || $comment->post->user_id === auth()->id())
                                    <div class="min-w-fit min-h-fit my-3">
                                        <form action="{{ route('comment.destroy', [$comment->post, $comment]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                x
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>