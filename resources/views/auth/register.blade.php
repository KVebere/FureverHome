<x-intro>
    <header>
        <h1>Create account</h1>
    </header>

    <main>
        <section class="profile">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}" required>

                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Password
                    <input type="password" name="password" required>

                    @error('password')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <label>
                    Confirm password
                    <input type="password" name="password_confirmation" required>

                    @error('password_confirmation')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </label>

                <button type="submit">Create account</button>
            </form>

            <p>
                Already have an account?
                <a href="{{ route('login') }}">Sign in</a>
            </p>
        </section>
    </main>
</x-intro>
