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
                <li>
                    <strong>Has cats:</strong>
                    {{ ($adopter->has_cats ?? false) ? 'Yes' : 'No' }}
                </li>
                <li>
                    <strong>Other pets:</strong>
                    {{ ($adopter->has_other_pets ?? false) ? 'Yes' : 'No' }}
                </li>
            </ul>

            {{-- EDIT FORM --}}
            <form method="POST" action="/profile">
                @csrf
                @method('PATCH')

                <label>
                    First name
                    <input type="text" name="adopter_first_name" value="{{ old('adopter_first_name', $adopter->adopter_first_name ?? '') }}" required>

                    @error('adopter_first_name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Middle name
                    <input type="text" name="adopter_middle_name" value="{{ old('adopter_middle_name', $adopter->adopter_middle_name ?? '') }}">
                </label>

                <label>
                    Last name
                    <input type="text" name="adopter_last_name" value="{{ old('adopter_last_name', $adopter->adopter_last_name ?? '') }}" required>

                    @error('adopter_last_name')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Email
                    <input type="email" name="adopter_email" value="{{ old('adopter_email', $adopter->adopter_email ?? '') }}" required>

                    @error('adopter_email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Phone number
                    <input type="number" name="adopter_phone" value="{{ old('adopter_phone', $adopter->adopter_phone ?? '') }}" required>

                    @error('adopter_phone')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Address line 1
                    <input type="text" name="adopter_address_1" value="{{ old('adopter_address_1', $adopter->adopter_address_1 ?? '') }}" required>

                    @error('adopter_address_1')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Address line 2
                    <input type="text" name="adopter_address_2" value="{{ old('adopter_address_2', $adopter->adopter_address_2 ?? '') }}">
                </label>

                <label>
                    City
                    <input type="text" name="adopter_city" value="{{ old('adopter_city', $adopter->adopter_city ?? '') }}" required>

                    @error('adopter_city')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Postcode
                    <input type="text" name="adopter_postcode" value="{{ old('adopter_postcode', $adopter->adopter_postcode ?? '') }}" required>

                    @error('adopter_postcode')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Experience level
                    <select name="experience_level">
                        @foreach(['None','Semi-Experienced','Experienced','Advanced Experience'] as $level)
                            <option value="{{ $level }}"
                                @selected((old('experience_level', $adopter->experience_level ?? '')) === $level)>
                                {{ $level }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    Home type
                    <select name="adopter_home_type">
                        @foreach(['Apartment','House with garden','Farm','Other'] as $type)
                            <option value="{{ $type }}"
                                @selected((old('adopter_home_type', $adopter->adopter_home_type ?? '')) === $type)>
                                {{ $type }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    Work schedule
                    <select name="work_schedule">
                        @foreach(['Home Full-Time','Home Part-Time','Away Full-Time','Away Part-Time'] as $schedule)
                            <option value="{{ $schedule }}"
                                @selected((old('work_schedule', $adopter->work_schedule ?? '')) === $schedule)>
                                {{ $schedule }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    Activity level
                    <select name="adopter_activity_level">
                        @foreach(['Low','Medium','High'] as $level)
                            <option value="{{ $level }}"
                                @selected((old('adopter_activity_level', $adopter->adopter_activity_level ?? '')) === $level)>
                                {{ $level }}
                            </option>
                        @endforeach
                    </select>
                </label>

                <label>
                    <input type="checkbox" name="has_children" value="1"
                        @checked(old('has_children', $adopter->has_children ?? false))>
                    Has children
                </label>

                <label>
                    <input type="checkbox" name="has_dogs" value="1"
                        @checked(old('has_dogs', $adopter->has_dogs ?? false))>
                    Has dogs
                </label>

                <label>
                    <input type="checkbox" name="has_cats" value="1"
                        @checked(old('has_cats', $adopter->has_cats ?? false))>
                    Has cats
                </label>

                <label>
                    <input type="checkbox" name="has_other_pets" value="1"
                        @checked(old('has_other_pets', $adopter->has_other_pets ?? false))>
                    Has other pets
                </label>

                <label>
                    Additional info
                    <textarea name="adopter_additional_info">{{ old('adopter_additional_info', $adopter->adopter_additional_info ?? '') }}</textarea>
                </label>

                <button type="submit">Save profile</button>
            </form>

        </section>
    </main>
</x-layout>
