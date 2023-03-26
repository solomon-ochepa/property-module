<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 fw-normal m-0 text-uppercase">
            {{ $head['title'] ?? __('Create Property') }}
        </h2>
    </x-slot>

    <section class="layout-top-spacing mb-4">
        <div class="card">
            <form method="POST" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <x-alert />

                            <div class="row gy-3">
                                {{-- Title --}}
                                <div class="col-col-12">
                                    <input type="text" class="form-control" name="property[title]"
                                        placeholder="Title" value="{{ old('property.title') }}" required />
                                    @error('property.title')
                                        <div class="text-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Description --}}
                                <div class="col-col-12">
                                    <textarea rows="4" class="form-control" name="property[description]" placeholder="Description"
                                        value="{{ old('property.description') }}" required></textarea>
                                    @error('property.description')
                                        <div class="text-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Address --}}
                                <div class="container">
                                    <div class="row mt-0 gy-3">
                                        {{-- Address --}}
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="address[description]"
                                                placeholder="Address" value="{{ old('address.description') }}" />
                                            @error('address.description')
                                                <div class="text-danger form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Area --}}
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="address[area]"
                                                placeholder="Area" value="{{ old('address.area') }}" />
                                            @error('address.area')
                                                <div class="text-danger form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- City --}}
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="address[city]"
                                                placeholder="City" value="{{ old('address.city') }}" />
                                            @error('address.city')
                                                <div class="text-danger form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- State --}}
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="address[state]"
                                                placeholder="State" value="{{ old('address.state') }}" />
                                            @error('address.state')
                                                <div class="text-danger form-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- Country --}}
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="address[country]"
                                                placeholder="Country" value="{{ old('address.country') }}" />
                                            @error('address.country')
                                                <div class="text-danger form-text">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- Price --}}
                                <div class="col-md-6">
                                    <input type="number" min="1" step="1" class="form-control"
                                        name="property[price]" placeholder="Price"
                                        value="{{ old('property.price') }}" />
                                    @error('property.price')
                                        <div class="text-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="category" placeholder="Category" />
                                    @error('category')
                                        <div class="text-danger form-text">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <livewire:property.admin.create.attributes />
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
