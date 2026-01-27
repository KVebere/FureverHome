<x-layout>
    <header>
        <h1>Saved Matches</h1>
    </header>

    <main>
        <section>
            @if(($saved ?? collect())->isEmpty())
                <p>No saved matches yet. Like a pet to save it here.</p>
            @else
                <ul class="animal-grid">
                    @foreach($saved as $match)
                        <li class="animal-card group">
                            <a href="{{ route('animals.show', $match->animal->animal_id) }}">
                                <figure class="relative">
                                    @if($match->animal->primaryImage)
                                        <img
                                            src="{{ asset('storage/' . $match->animal->primaryImage->image_path) }}"
                                            alt="{{ $match->animal->animal_name }}"
                                            class="animal-image w-full h-48 object-cover rounded-lg"
                                        >
                                    @else
                                        <figcaption class="w-full h-48 flex items-center justify-center bg-gray-200 rounded-lg text-gray-500">
                                            No image available
                                        </figcaption>
                                    @endif

                                    <figcaption class="overlay flex flex-col justify-end p-2">
                                        <span class="font-bold">{{ $match->animal->animal_name }}</span>
                                        <span>Age: {{ $match->animal->animal_age }} years</span>
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
