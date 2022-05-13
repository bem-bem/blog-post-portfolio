@props(['color' => 'btn-primary'])

<button {{ $attributes->merge(['class' => "btn $color"]) }} type="submit">
  {{ $slot }}
</button>