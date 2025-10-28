@if($linkto)
    <a href="{{ route($linkto) }}">
        <button {{ $attributes->merge(['class' => '']) }}>
            {{ $slot }}
        </button>
    </a>
@else
    <button {{ $attributes->merge(['class' => '']) }}>
        {{ $slot }}
    </button>
@endif
