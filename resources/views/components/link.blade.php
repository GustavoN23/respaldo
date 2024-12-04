<div>
    <a {{ $attributes->merge(['class' => 'flex flex-col py-2 px-4 w-full']) }}><!--Tambien podemos psar un href personalizado-->
        {{ $slot }}
    </a>
</div>