<x-layout>
    <header>
        <h1>{{ $animal->animal_name }}</h1>
    </header>

    <main>
        <figure>
            @if($animal->primaryImage)
                <img src="{{ asset('storage/' . $animal->primaryImage->image_path) }}" alt="{{ $animal->animal_name }}">
            @else
                <figcaption>No image available</figcaption>
            @endif
        </figure>

        <section>
            <p>Age: {{ $animal->animal_age }} years</p>
            <p>Breed: {{ $animal->animal_breed }}</p>
            <p>Status: {{ $animal->animal_status }}</p>
        </section>
    </main>
</x-layout>
