
<x-layout>
    <header>
        <h1>Welcome to FureverHome!</h1>
    </header>

    <main>
        <section>
            <h2>New Additions</h2>
            <ul>
                @foreach($animals as $animal)
                    <li>
                        {{ $animal['animal_name'] }}: {{$animal['animal_age']}} years old
                    </li>
                @endforeach
            </ul>
        </section>
        <section>
            <h2>Recommended for You</h2>
        </section>
    </main>
</x-layout>
