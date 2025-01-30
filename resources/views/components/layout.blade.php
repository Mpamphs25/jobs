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
        {{$slot}}
        <script src="//unpkg.com/alpinejs" defer></script>
    </body>
</html>
