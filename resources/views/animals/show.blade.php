<x-layout>
    <header>
        <h1>{{ $animal->animal_name }}</h1>
    </header>

    <main>
        <figure class="animal-hero">
            @if($animal->primaryImage)
                <img src="{{ asset('storage/' . $animal->primaryImage->image_path) }}" alt="{{ $animal->animal_name }}">
            @else
                <figcaption>No image available</figcaption>
            @endif
        </figure>

        <section class="profile animal-profile">
            <h2 class="profile-name">{{ $animal->animal_name }}</h2>

            <section>
                <h3>Description</h3>
                <p>{{ $animal->animal_description }}</p>
            </section>

            <section>
                <h3>Temperament</h3>
                <p>{{ $animal->animal_temperament }}</p>
            </section>
            <ul class="profile-summary">
                <li>
                    <strong>Age:</strong>
                    {{ $animal->animal_age }} years
                </li>
                <li>
                    <strong>Species:</strong>
                    {{ $animal->animal_species }}
                </li>
                <li>
                    <strong>Breed:</strong>
                    {{ $animal->animal_breed }}
                </li>
                <li>
                    <strong>Gender:</strong>
                    {{ $animal->animal_gender }}
                </li>
                <li>
                    <strong>Status:</strong>
                    {{ $animal->animal_status }}
                </li>
                <li>
                    <strong>Home type:</strong>
                    {{ $animal->animal_home_type }}
                </li>
                <li>
                    <strong>Energy level:</strong>
                    {{ $animal->animal_energy_level }}
                </li>
                <li>
                    <strong>Good with children:</strong>
                    {{ $animal->good_with_children ? 'Yes' : 'No' }}
                </li>
                <li>
                    <strong>Good with dogs:</strong>
                    {{ $animal->good_with_dogs ? 'Yes' : 'No' }}
                </li>
                <li>
                    <strong>Good with cats:</strong>
                    {{ $animal->good_with_cats ? 'Yes' : 'No' }}
                </li>
                <li>
                    <strong>Can be left alone:</strong>
                    {{ $animal->can_be_left_alone ? 'Yes' : 'No' }}
                </li>
                <li>
                    <strong>Working animal:</strong>
                    {{ $animal->working_animal ? 'Yes' : 'No' }}
                </li>
                <li>
                    <strong>Needs garden:</strong>
                    {{ $animal->needs_garden ? 'Yes' : 'No' }}
                </li>
                <li>
                    <strong>Medical notes:</strong>
                    {{ $animal->medical_notes ?? 'None' }}
                </li>
            </ul>

        </section>
    </main>
</x-layout>
