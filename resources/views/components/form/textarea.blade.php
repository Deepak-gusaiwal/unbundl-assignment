@props([
    'inputBoxStyle' => '',
    'label' => '',
    'live' => 'false'
])

@php
    $name = $attributes->get('name');
    $id = $attributes->get('id', $name);
@endphp

<div class="inputBox mb-2 {{ $inputBoxStyle }}" >
    @if($label)
        <label
            for="{{ $id }}"
            class="capitalize block mb-2 w-full text-sm font-medium text-gray-900 select-none"
        >
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <textarea
            wire:model{{ $live ? '.live' : '' }}="{{ $name }}"
            id="{{ $id }}"
            {{ $attributes->merge([
                'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'
                            
            ]) }}
        ></textarea>
    </div>

    @error($name)
        <p class="text-red-500 italic mt-1 text-sm">{{ $message }}</p>
    @enderror
</div>
