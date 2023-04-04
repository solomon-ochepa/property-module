<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-normal m-0 text-uppercase">
            {{ $head['title'] ?? __('Create Property') }}
        </h2>
    </x-slot>

    <section class="layout-top-spacing mb-4">
        <div class="card">
            <livewire:property::admin.create />
        </div>
    </section>
</x-app-layout>
