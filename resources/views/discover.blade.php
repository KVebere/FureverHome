<x-layout>
    <header>
        <h1>Discover Pets</h1>
    </header>

    <main class="discover-page">
        <section class="discover-filters">
            <h2>Find your perfect pet</h2>

            <form method="GET" action="{{ route('discover') }}">
                <label>
                    Species
                    <select name="species">
                        <option value="">Any species</option>
                        @foreach(['Dog', 'Cat', 'Other'] as $species)
                            <option value="{{ $species }}" @selected(($filters['species'] ?? '') === $species)>
                                {{ $species }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    Energy level
                    <select name="energy">
                        <option value="">Any energy level</option>
                        @foreach(['Low', 'Medium', 'High'] as $energy)
                            <option value="{{ $energy }}" @selected(($filters['energy'] ?? '') === $energy)>
                                {{ $energy }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    Home type
                    <select name="home_type">
                        <option value="">Any home type</option>
                        @foreach(['Apartment', 'House with garden', 'Farm', 'Other'] as $homeType)
                            <option value="{{ $homeType }}" @selected(($filters['home_type'] ?? '') === $homeType)>
                                {{ $homeType }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label class="filter-checkbox">
                    <input type="checkbox" name="good_with_children" value="1" @checked(($filters['good_with_children'] ?? '') === '1')>
                    Good with children
                </label>

                <label class="filter-checkbox">
                    <input type="checkbox" name="good_with_dogs" value="1" @checked(($filters['good_with_dogs'] ?? '') === '1')>
                    Good with dogs
                </label>

                <label class="filter-checkbox">
                    <input type="checkbox" name="good_with_cats" value="1" @checked(($filters['good_with_cats'] ?? '') === '1')>
                    Good with cats
                </label>

                <div class="discover-filter-actions">
                    <button type="submit">Apply filters</button>
                    <a href="{{ route('discover') }}">Reset</a>
                </div>
            </form>
        </section>

        <section>
            <h2>
                Available pets
                <span class="discover-count">({{ $animals->count() }})</span>
            </h2>

            @if($animals->isEmpty())
                <p>No pets matched those filters. Try changing your search.</p>
            @else
                <ul class="animal-grid">
                    @foreach($animals as $animal)
                        <li class="animal-card group">
                            <a href="{{ route('animals.show', $animal->animal_id) }}">
                                <figure class="relative">
                                    @if($animal->primaryImage)
                                        <img
                                            src="{{ asset('storage/' . $animal->primaryImage->image_path) }}"
                                            alt="{{ $animal->animal_name }}"
                                            class="animal-image w-full h-48 object-cover rounded-lg"
                                        >
                                    @else
                                        <figcaption class="w-full h-48 flex items-center justify-center bg-gray-200 rounded-lg text-gray-500">
                                            No image available
                                        </figcaption>
                                    @endif

                                    <figcaption class="overlay flex flex-col justify-end p-2">
                                        <span class="font-bold">{{ $animal->animal_name }}</span>
                                        <span>{{ $animal->animal_species }} · {{ $animal->animal_age }} years</span>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
</x-layout>
