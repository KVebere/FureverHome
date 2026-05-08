<x-intro>
    <header>
        <h1>Log in</h1>
    </header>

    <main>
        <section class="profile">

            <form method="POST" action="{{ route('login') }}">
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

                <label class="checkbox-label">
                    Remember me
                    <input type="checkbox" name="remember" value="1">
                </label>

                <button type="submit">Log in</button>
            </form>

            <p>
                No account yet?
                <a href="{{ route('register') }}">Create one</a>
            </p>
        </section>
    </main>
</x-intro>
