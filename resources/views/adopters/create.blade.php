<x-layout>
    <header>
        <h1>Create your adopter profile</h1>
    </header>

    <main class="profile">
        <form method="POST" action="{{ route('adopters.store') }}">
            @csrf

            <label>
                First name *
                <input type="text" name="adopter_first_name" value="{{ old('adopter_first_name') }}" required>
            </label>

            <label>
                Middle name
                <input type="text" name="adopter_middle_name" value="{{ old('adopter_middle_name') }}">
            </label>

            <label>
                Last name *
                <input type="text" name="adopter_last_name" value="{{ old('adopter_last_name') }}" required>
            </label>

            <label>
                Email *
                <input type="email" name="adopter_email" value="{{ old('adopter_email') }}" required>
            </label>

            <label>
                Phone number *
                <input type="text" name="adopter_phone" value="{{ old('adopter_phone') }}" required>
            </label>

            <label>
                Address line 1 *
                <input type="text" name="adopter_address_1" value="{{ old('adopter_address_1') }}" required>
            </label>

            <label>
                Address line 2
                <input type="text" name="adopter_address_2" value="{{ old('adopter_address_2') }}">
            </label>

            <label>
                City *
                <input type="text" name="adopter_city" value="{{ old('adopter_city') }}" required>
            </label>

            <label>
                Postcode *
                <input type="text" name="adopter_postcode" value="{{ old('adopter_postcode') }}" required>
            </label>

            @php
                $experienceLevels = ['None', 'Semi-Experienced', 'Experienced', 'Advanced Experience'];
                $homeTypes = ['Apartment', 'House with garden', 'Farm', 'Other'];
                $workSchedules = ['Home Full-Time', 'Home Part-Time', 'Away Full-Time', 'Away Part-Time'];
                $activityLevels = ['Low', 'Medium', 'High'];
            @endphp

            <label>
                Experience level *
                <select name="experience_level" required>
                    <option value="">Select one</option>
                    @foreach ($experienceLevels as $level)
                        <option value="{{ $level }}" @selected(old('experience_level') === $level)>{{ $level }}</option>
                    @endforeach
                </select>
            </label>

            <label>
                Home type *
                <select name="adopter_home_type" required>
                    <option value="">Select one</option>
                    @foreach ($homeTypes as $type)
                        <option value="{{ $type }}" @selected(old('adopter_home_type') === $type)>{{ $type }}</option>
                    @endforeach
                </select>
            </label>

            <label>
                Work schedule *
                <select name="work_schedule" required>
                    <option value="">Select one</option>
                    @foreach ($workSchedules as $schedule)
                        <option value="{{ $schedule }}" @selected(old('work_schedule') === $schedule)>{{ $schedule }}</option>
                    @endforeach
                </select>
            </label>

            <label>
                Activity level *
                <select name="adopter_activity_level" required>
                    <option value="">Select one</option>
                    @foreach ($activityLevels as $level)
                        <option value="{{ $level }}" @selected(old('adopter_activity_level') === $level)>{{ $level }}</option>
                    @endforeach
                </select>
            </label>

            <label>
                <input type="checkbox" name="has_children" value="1" @checked(old('has_children'))>
                I have children at home
            </label>

            <label>
                <input type="checkbox" name="has_cats" value="1" @checked(old('has_cats'))>
                I have cats at home
            </label>

            <label>
                <input type="checkbox" name="has_dogs" value="1" @checked(old('has_dogs'))>
                I have dogs at home
            </label>

            <label>
                <input type="checkbox" name="has_other_pets" value="1" @checked(old('has_other_pets'))>
                I have other pets at home
            </label>

            <label>
                Additional info
                <textarea name="adopter_additional_info">{{ old('adopter_additional_info') }}</textarea>
            </label>

            <button type="submit">Save profile</button>
        </form>
    </main>
</x-layout>
