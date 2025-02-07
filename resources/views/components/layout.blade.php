<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>  {{$title ?? 'Hello World'}}</title>
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    </head>
    <body
  class="from-10% via-30% to-90% mx-auto mt-10 max-w-2xl bg-gradient-to-r from-indigo-100 via-sky-100 to-emerald-100 text-slate-700">
  <ul class="flex space-x-2 justify-between">
    @auth
    <p>
      {{ auth()->user()->name ?? 'Anynomus' }}
    </li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-slate-500 hover:bg-slate-600 px-3 p-2 cursor-pointer rounded-lg border border-slate-700 text-white">
                Logout
            </button>
        </form>
    </li>
  @else
    <p class="bg-slate-500 hover:bg-slate-600 px-3 p-1 cursor-pointer rounded-lg border border-slate-700 text-white mb-5">
      <a href="{{ route('auth.create') }}">Sign in</a>
    </li>
  @endauth
</ul>
        {{$slot}}
        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>
