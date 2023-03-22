<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="my-3">
        <div class="card">
            @can('room.create')
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <a class="navbar-brand d-md-none" href="javascript://" data-bs-toggle="collapse"
                                data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false">Menu</a>

                            <button class="navbar-toggler border-none outline-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarScroll">
                                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                                    style="--bs-scroll-height: 100px;">
                                    <li class="nav-item">
                                        <a class="nav-link{{ request()->routeIs('admin.property.create') ? ' active' : '' }}"
                                            @if (request()->routeIs('admin.property.create')) aria-current="page" @endif
                                            href="{{ route('admin.property.create') }}">Create</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            @endcan

            <livewire:property.admin.index />
        </div>
    </div>
</x-app-layout>
