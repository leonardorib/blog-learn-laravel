<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold text-left flex lg:inline-flex w-full lg:w-32">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="request()->routeIs('home') && is_null(request()->query('category'))">
        All
    </x-dropdown-item>
    @foreach ($categories as $category)
    <x-dropdown-item href="?category={{ $category->slug }}" :active="request()->query('category') === $category->slug">
        {{ ucwords($category->name) }}
    </x-dropdown-item>
    @endforeach
</x-dropdown>
