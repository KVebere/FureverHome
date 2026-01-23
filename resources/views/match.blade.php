<x-layout>
    <section class="card-stack" id="cardStack" aria-label="Animal matching">
        @foreach($animals as $animal)
            <article class="card" data-id="{{ $animal->animal_id }}">
                <figure>
                    <img
                        src="{{ asset('storage/' . $animal->primaryImage->image_path) }}"
                        alt="{{ $animal->animal_name }}">

                    <figcaption>
                        <h3>{{ $animal->animal_name }}</h3>
                        <p>{{ $animal->animal_age }} years · {{ $animal->animal_species }}</p>
                    </figcaption>
                </figure>
            </article>
        @endforeach
    </section>
</x-layout>
