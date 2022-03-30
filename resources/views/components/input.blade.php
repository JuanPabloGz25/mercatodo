@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-blue-300 rounded-md shadow-sm border-black border-4 focus:border-blue-900 focus:ring focus:ring-white focus:ring-opacity-50']) !!}>
