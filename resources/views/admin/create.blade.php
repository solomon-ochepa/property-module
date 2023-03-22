<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <section class="layout-top-spacing mb-4">
        <div class="card">
            <h2 class="card-header mb-0 border-bottom ">{{ $title }}</h2>

            <form method="POST" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card-body px-0 pt-3 pb-0">
                                <x-alert />

                                <div class="row mb-4 gy-3">
                                    <div class="col-col-12">
                                        <input type="text" class="form-control" name="property[name]"
                                            placeholder="Name" value="{{ old('property.name') }}" required />
                                        @error('property.name')
                                            <div class="text-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-col-12">
                                        <textarea rows="4" class="form-control" name="property[description]" placeholder="Description"
                                            value="{{ old('property.description') }}" required></textarea>
                                        @error('property.description')
                                            <div class="text-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <h6 class="mb-0">Address</h6> --}}
                                    <div class="col-col-12">
                                        <input type="text" class="form-control" name="property[address]"
                                            placeholder="Address" value="{{ old('property.address') }}" />
                                        <div class="form-text text-muted">
                                            Address, Area / Town / L.G.A / City, State, Country
                                        </div>
                                        @error('property.address')
                                            <div class="text-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <input type="number" min="1" step="1" class="form-control"
                                            name="property[price]" placeholder="Price"
                                            value="{{ old('property.price') }}" />
                                        @error('property.price')
                                            <div class="text-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="category"
                                            placeholder="Category" />
                                        @error('category')
                                            <div class="text-danger form-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer px-0 pt-3">
                                <input type="submit" class="btn btn-primary" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card-body px-0 pt-3 pb-0">
                                <livewire:property.admin.create.attributes />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
