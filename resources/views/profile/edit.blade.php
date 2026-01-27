<x-layout>
    <main>
        <section class="profile">

            <h1 class="profile-title">Your Profile</h1>

            @if(session('success'))
                <p>{{ session('success') }}</p>
            @endif

            {{-- DISPLAY NAME --}}
            <h2 class="profile-name">
                {{ ($adopter->adopter_first_name ?? 'First') }}
                {{ ($adopter->adopter_last_name ?? 'Last') }}
            </h2>

            {{-- PROFILE SUMMARY LIST --}}
            <ul class="profile-summary">
                <li>
                    <strong>Activity level:</strong>
                    {{ $adopter->adopter_activity_level ?? 'Not set' }}
                </li>
                <li>
                    <strong>Has dogs:</strong>
                    {{ ($adopter->has_dogs ?? false) ? 'Yes' : 'No' }}
                </li>
                <li>
                    <strong>Has children:</strong>
                    {{ ($adopter->has_children ?? false) ? 'Yes' : 'No' }}
                </li>
            </ul>

            {{-- EDIT FORM --}}
            <form method="POST" action="/profile">
                @csrf
                @method('PATCH')

                <label>
                    Experience level
                    <select name="experience_level">
                        @foreach(['None','Semi-Experienced','Experienced','Advanced Experience'] as $level)
                            <option value="{{ $level }}"
                                @selected(($adopter->experience_level ?? '') === $level)>
                                {{ $level }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    Activity level
                    <select name="adopter_activity_level">
                        @foreach(['Low','Medium','High'] as $level)
                            <option value="{{ $level }}"
                                @selected(($adopter->adopter_activity_level ?? '') === $level)>
                                {{ $level }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    <input type="checkbox" name="has_children" value="1"
                        @checked($adopter->has_children ?? false)>
                    Has children
                </label>

                <label>
                    <input type="checkbox" name="has_dogs" value="1"
                        @checked($adopter->has_dogs ?? false)>
                    Has dogs
                </label>

                <button type="submit">Save profile</button>
            </form>

        </section>
    </main>
</x-layout>
