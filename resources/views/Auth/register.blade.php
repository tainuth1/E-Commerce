<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Register</title>
</head>
<body>
  <div class="h-[100vh] flex justify-center items-center">
    <div class="max-w-[500px] rounded-lg bg-white shadow-lg">
        <h2 class="text-center font-bold text-[35px] py-3">
          Register
        </h2>
        <form action="{{ route('auth.register') }}" method="POST" class="px-14 pb-12"> 
            @csrf
            <x-label class="">Username <span class="text-red-600">*</span> </x-label>
              @error('name')
                  <x-label class="text-red-600">{{ $message }}</x-label>
              @enderror
            <x-input type="text" name="name" value="{{ old('name') }}" class="w-full mb-3"/>
            <x-label class="">Email <span class="text-red-600">*</span></x-label>
              @error('email')
                  <x-label class="text-red-600">{{ $message }}</x-label>
              @enderror
            <x-input type="email" value="{{ old('email') }}" name="email" class="w-full mb-3"/>
            <x-label class="">Password <span class="text-red-600">*</span></x-label>
              @error('password')
                  <x-label class="text-red-600">{{ $message }}</x-label>
              @enderror
            <x-input type="password" name="password" id="password" class="w-full mb-3"/>
            <x-label class="">Confirm Password <span class="text-red-600">*</span></x-label>
              @error('password_confirmation')
                  <x-label class="text-red-600">{{ $message }}</x-label>
              @enderror
            <x-input type="password" name="password_confirmation" id="password_confirmation" class="w-full mb-3"/>
            <div class="flex items-center justify-end gap-6">
              <x-label>Already have an account. <a href="{{ route('login') }}" class="underline"> Login</a></x-label>
              <x-button type="submit">Register</x-button>
            </div>
        </form>
    </div>
  </div>
  <div class=""></div>
</body>
</html>