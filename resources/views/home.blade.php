<x-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

    <header>
        <h1>Welcome to FureverHome!</h1>
    </header>

    <main>
        <section>
            <h2>New Additions</h2>

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
                                    <span>Age: {{ $animal->animal_age }} years</span>
                                </figcaption>
                            </figure>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
        <section>
            <h2>Recommended for you</h2>
        </section>
    </main>
</x-layout>
