@auth
    <x-panel>
        <form
            method="POST"
            action="/posts/{{ $post->slug }}/comments"
        >
            @csrf

            <header class="flex items-center">
                <img
                    src="https://i.pravatar.cc/100?u={{ auth()->id() }}"
                    class="bg-gray-200"
                    width="40"
                    height="40"
                    alt=""
                >

                <h2 class="ml-3">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring p-1"
                    rows="5"
                    placeholder="Quick, thing of something to say!"
                    required
                ></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-4 pt-4 border-t border-gray-200">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p>
        <a
            href="/register"
            class="font-bold hover:underline"
        >Register</a> or <a
            href="/login"
            class="font-bold hover:underline"
        >Log In</a> to leave a comment.
    </p>
@endauth
