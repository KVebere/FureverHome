<x-layout>
    <section class="swiper" aria-label="Animal matching">
        <section class="swiper-wrapper">

            @foreach($animals as $animal)
                <article class="swiper-slide">
                    <figure>
                        <img
                            src="{{ asset('storage/' . $animal->primaryImage->image_path) }}"
                            alt="Photo of {{ $animal->animal_name }}">

                        <figcaption>
                            <h3>{{ $animal->animal_name }}</h3>
                            <p>{{ $animal->animal_age }} years · {{ $animal->animal_species }}</p>
                        </figcaption>
                    </figure>
                </article>
            @endforeach

        </section>
    </section>
</x-layout>
