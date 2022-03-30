@props(['value'])

<label {{ $attributes->merge(['class' => 'mt-1 block font-medium text-lg text-white text-center font-bold']) }}>
    {{ $value ?? $slot }}
</label>
