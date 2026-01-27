<x-layout>
    <header>
        <h1>Create account</h1>
    </header>

    <main>
        <section class="profile">
            @if($errors->any())
                <p>{{ $errors->first() }}</p>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label>
                    Name
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </label>

                <label>
                    Email
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </label>

                <label>
                    Password
                    <input type="password" name="password" required>
                </label>

                <label>
                    Confirm password
                    <input type="password" name="password_confirmation" required>
                </label>

                <button type="submit">Create account</button>
            </form>

            <p>
                Already have an account?
                <a href="{{ route('login') }}">Sign in</a>
            </p>
        </section>
    </main>
</x-layout>
