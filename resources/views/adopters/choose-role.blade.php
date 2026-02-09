<x-intro>
    <header>
        <h1>Welcome to FureverHome</h1>
    </header>

    <main>
        <section>
            <h2>Get started</h2>
            <p>Pick your role to create your profile.</p>

            <nav aria-label="Role selection">
                <ul>
                    <li>
                        <a href="{{ route('register') }}">
                            <button type="button">I'm an adopter</button>
                        </a>
                    </li>

                    <li>
                        <button type="button" disabled>I'm a shelter</button>
                    </li>
                </ul>
            </nav>

        </section>
    </main>
</x-intro>
