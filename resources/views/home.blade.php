<x-layout>
    <header>
        <h1>Welcome to FureverHome!</h1>
    </header>

    <main>
        <section>
            <h2>New Additions</h2>

            <ul class="animal-list">
                @foreach($animals as $animal)
                    <li class="animal-card">

                        {{-- Animal Image --}}
                        @if($animal->primaryImage)
                            <img
                                src="{{ asset('storage/' . $animal->primaryImage->image_path) }}"
                                alt="{{ $animal->animal_name }}"
                                class="animal-image"
                            >
                        @else
                            <div class="animal-placeholder">
                                No image available
                            </div>
                        @endif

                        {{-- Animal Info --}}
                        <div class="animal-info">
                            <h3>{{ $animal->animal_name }}</h3>
                            <p>Age: {{ $animal->animal_age }} years</p>
                            <p>Breed: {{ $animal->animal_breed }}</p>
                            <p>Status: {{ $animal->animal_status }}</p>
                        </div>

                    </li>
                @endforeach
            </ul>
        </section>

        <section>
            <h2>Recommended for You</h2>
        </section>
    </main>
</x-layout>
