@props(['comment'])

<article class="flex bg-gray-100 p-6 border border-gray-200 rounded-xl space-x-4">
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{ $comment->id }}" class="bg-gray-200" width="60" height="60" alt="" >
    </div>

    <div>
        <header>
            <h3 class="font-bold">{{ $comment->author->name }}</h3>
            <p class="text-xs">
                Posted <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>

        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>
