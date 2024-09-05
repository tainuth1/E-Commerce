<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Login</title>
</head>
<body>
  <div class="h-[100vh] flex justify-center items-center">
    <div class="max-w-[500px] rounded-lg bg-white shadow-lg">
        <h2 class="text-center font-bold text-[35px] py-3">
          Login
        </h2>
        @if (session('fail'))
            <center>
              <p class="text-red-700">{{ session('fail') }}</p>
            </center>
        @endif
        <form action="{{ route('auth.login') }}" method="POST" class="px-14 pb-12"> 
            @csrf
            <x-label class="">Email <span class="text-red-600">*</span></x-label>
              @error('email')
                <x-label class="text-red-600">{{ $message }}</x-label>
              @enderror
            <x-input type="email" name="email" value="{{ old('email') }}" class="w-full mb-3"/>
            <x-label class="">Password <span class="text-red-600">*</span></x-label>
              @error('password')
                <x-label class="text-red-600">{{ $message }}</x-label>
              @enderror
            <x-input type="password" name="password" class="w-full mb-3"/>
            <div class="flex items-center justify-end gap-6">
              <x-label>Don't have account yet. <a href="{{ route('register') }}" class="underline"> Register</a></x-label>
              <x-button type="submit" class="">Login</x-button>
            </div>
        </form>
    </div>
  </div>
  <div class=""></div>
</body>
</html>