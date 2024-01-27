@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img
                src="https://i.pravatar.cc/100?u={{ $comment->id }}"
                class="bg-gray-200"
                width="60"
                height="60"
                alt=""
            >
        </div>

        <div>
            <header>
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <p class="text-xs">
                    Posted <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
