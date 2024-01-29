<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <form
                    class="mt-10"
                    method="POST"
                    action="/register"
                >
                    @csrf
                    <h1 class="text-center font-bold text-xl">Register!</h1>

                    <x-form.input name="name" />

                    <x-form.input
                        name="username"
                        autocomplete="username"
                    />

                    <x-form.input
                        name="email"
                        type="email"
                        autocomplete="email"
                    />

                    <x-form.input
                        name="password"
                        type="password"
                        autocomplete="new-password"
                    />

                    <x-form.submit-button>Register</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
