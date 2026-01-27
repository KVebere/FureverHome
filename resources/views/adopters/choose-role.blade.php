<x-layout>
    <header>
        <h1>Welcome to FureverHome</h1>
    </header>

    <main>
        <section>
            <h2>Get started</h2>
            <p>Pick your role to create your profile.</p>

            <div class="mt-4">
                <a href="{{ route('register') }}">
                    <button type="button">I'm an adopter</button>
                </a>
            </div>

            <div class="mt-3">
                <button type="button" disabled>I'm a shelter</button>
            </div>

        </section>
    </main>
</x-layout>
