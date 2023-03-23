<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <section class="layout-top-spacing mb-4">
        <div class="card">
            <h2 class="card-header mb-0 border-bottom ">{{ $title }}</h2>

            <livewire:property.admin.edit :property="$property" />
        </div>
    </section>
</x-app-layout>
