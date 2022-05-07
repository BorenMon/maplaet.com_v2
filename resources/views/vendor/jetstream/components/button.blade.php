<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-maplaet-1 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-maplaet-1 active:bg-maplaet-1 focus:outline-none focus:bg-maplaet-1 focus:ring focus:ring-maplaet-1 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
