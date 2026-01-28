<x-intro>
    <header>
        <h1>Sign in</h1>
    </header>

    <main>
        <section class="profile">
            @if($errors->any())
                <p>{{ $errors->first() }}</p>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>

                <label>
                    Password
                    <input type="password" name="password" required>
                </label>

                <label>
                    <input type="checkbox" name="remember" value="1">
                    Remember me
                </label>

                <button type="submit">Sign in</button>
            </form>

            <p>
                No account yet?
                <a href="{{ route('register') }}">Create one</a>
            </p>
        </section>
    </main>
</x-intro>
