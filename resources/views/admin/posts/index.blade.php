<x-layout>
    <x-setting heading="Manage Posts">
        <div class="flex justify-between items-center">
            <p class="text-gray-500">Posts</p>

            <a
                href="/admin/posts/create"
                class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600"
            >New Post</a>
        </div>

        @if ($posts->count())
            <table class="table-auto w-full mt-4">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Date</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="border px-4 py-2">
                                <a
                                    href="/post/{{ $post->slug }}"
                                    class="text-blue-500 hover:text-blue-600"
                                >{{ $post->title }}</a>
                            </td>
                            <td class="border px-4 py-2">{{ $post->category->name }}</td>
                            <td class="border px-4 py-2">{{ $post->created_at->format('M d, Y') }}</td>
                            <td class="border px-4 py-2">
                                <a
                                    href="/admin/posts/{{ $post->id }}/edit"
                                    class="text-blue-500 hover:text-blue-600"
                                >Edit</a>
                                <form
                                    action="/admin/posts/{{ $post->id }}"
                                    method="POST"
                                    class="inline-block"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="text-gray-400 hover:text-red-500"
                                    >Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="mt-4">No posts yet. <a
                    href="/admin/posts/create"
                    class="text-blue-500 hover:text-blue-600"
                >Create one!</a></p>
        @endif


    </x-setting>
</x-layout>
