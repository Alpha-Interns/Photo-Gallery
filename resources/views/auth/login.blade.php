
<x-layout>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="email">Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    
    <label for="password">Password</label>
    <input type="password" name="password" required>
    
    <button type="submit">Login</button>
</form>
</x-layout>