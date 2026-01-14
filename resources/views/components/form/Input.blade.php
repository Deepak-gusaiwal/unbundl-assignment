@props([
    'inputBoxStyle' => '',
    'label' => '',
    'type' => 'text',
    'live' => 'false' 
])

@php
    $name = $attributes->get('name');
    $id = $attributes->get('id', $name);
@endphp

<div
    class="inputBox mb-2 {{ $inputBoxStyle }}"
    @if($type === 'password')
        x-data="{ show: false }"
    @endif
>
    @if($label)
        <label
            for="{{ $id }}"
            class="capitalize block mb-2 w-full text-sm font-medium text-gray-900 select-none"
        >
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input
            @if($type === 'password')
                :type="show ? 'text' : 'password'"
            @else
                type="{{ $type }}"
            @endif

            wire:model{{ $live ? '.live' : '' }}="{{ $name }}"

            id="{{ $id }}"

            {{ $attributes->merge([
                'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                            focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'
                            . ($type === 'password' ? ' pr-10' : '')
            ]) }}
        />

        {{-- 👁 Password toggle --}}
        @if($type === 'password')
            <button
                type="button"
                @click="show = !show"
                class="absolute inset-y-0 right-2 flex items-center text-gray-500 hover:text-gray-700 cursor-pointer"
                tabindex="-1"
            >
                <!-- Eye open -->
                 <i x-show="!show" class="ri-eye-line"></i>
                <!-- Eye closed -->
                 <i x-show="show" class="ri-eye-off-line"></i>
            </button>
        @endif
    </div>

    @error($name)
        <p class="text-red-500 italic mt-1 text-sm">{{ $message }}</p>
    @enderror
</div>
