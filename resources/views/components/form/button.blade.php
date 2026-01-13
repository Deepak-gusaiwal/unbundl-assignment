@props([
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
    'type' => 'button',
    'rounded' => 'full',
])

@php
    // Variants
    $variantClasses = match ($variant) {
        'primary' => 'bg-primary-500 text-white hover:bg-primary-600',
        'secondary' => 'bg-secondary-500 text-white hover:bg-secondary-600',
        'accent' => 'bg-teal-500 text-white hover:bg-teal-600',
        'destructive' => 'bg-red-500 text-white hover:bg-red-600',
        default => 'bg-gray-500 text-white hover:bg-gray-600',
    };

    // Sizes
    $sizeClasses = match ($size) {
        'sm' => 'px-3 py-1 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
        default => 'px-4 py-2',
    };

    // Rounded
    $roundedClasses = match ($rounded) {
        'sm' => 'rounded-sm',
        'md' => 'rounded-md',
        'lg' => 'rounded-lg',
        'full' => 'rounded-full',
        'none' => 'rounded-none',
        default => 'rounded-full',
    };

    $isDisabled = $disabled;
@endphp

<button
    type="{{ $type }}"
    @disabled($isDisabled)
    {{ $attributes->merge([
        'class' => "
            {$roundedClasses}
            {$sizeClasses}
            {$variantClasses}
            font-medium
            transition-colors
            focus:outline-none
            focus:ring-2
            focus:ring-primary-500
            flex
            items-center
            justify-center
            gap-2
            capitalize
            " . ($isDisabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer')
    ]) }}
>
    {{ $slot }}
</button>
