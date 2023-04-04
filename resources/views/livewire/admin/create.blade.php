<form method="POST" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="card-body">
        <div class="row gy-md-0 gy-3">
            <div class="col-md-8">
                <x-alert />

                <div class="row gy-3">
                    {{-- Title --}}
                    <div class="col-col-12">
                        <input type="text" class="form-control" name="property[title]" placeholder="Title"
                            value="{{ old('property.title') }}" wire:model.lazy="property.title" required />
                        @error('property.title')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="col-col-12">
                        <textarea rows="4" class="form-control" name="property[description]" placeholder="Description"
                            value="{{ old('property.description') }}" wire:model.lazy="property.description" required></textarea>
                        @error('property.description')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="col-md-6">
                        <input type="number" min="1" step="1" class="form-control" name="property[price]"
                            placeholder="Price" value="{{ old('property.price') }}" wire:model.lazy="property.price"
                            required />
                        @error('property.price')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Type --}}
                    <div class="col-md-6">
                        <select class="form-control" name="property[type]" wire:model.lazy="property.type" required>
                            <option class="text-muted" value="">Type ...</option>
                            <option value="sale">Sale</option>
                            <option value="rent">Rent</option>
                        </select>
                        @error('property.type')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div>

                    @if ($property['type'] == 'rent')
                        {{-- duration --}}
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="number" min="1" step="1"
                                    class="form-control input-group-text" placeholder="Interval"
                                    name="property[interval]" wire:model.lazy="property.interval" required />

                                <select class="form-control" name="property[duration]"
                                    wire:model.lazy="property.duration" required>
                                    <option class="text-muted" value="">Duration ...</option>
                                    <option value="hour">Hour</option>
                                    <option value="day">Day</option>
                                    <option value="week">Week</option>
                                    <option value="month">Month</option>
                                    <option value="Year">Year</option>
                                </select>
                            </div>
                            @error('property.duration')
                                <div class="text-danger form-text">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    {{-- Category --}}
                    {{-- <div class="col-md-6">
                        <input type="text" class="form-control" name="category" placeholder="Category" />
                        @error('category')
                            <div class="text-danger form-text">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    {{-- Address --}}
                    <div class="container">
                        <div class="row mt-0 gy-3">
                            <div class="col-sm-12">
                                <h5 class="m-0 border-bottom">Address</h5>
                            </div>

                            {{-- Address --}}
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="address[description]"
                                    placeholder="Address" value="{{ old('address.description') }}" />
                                @error('address.description')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Street --}}
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="address[street]" placeholder="Street"
                                    value="{{ old('address.street') }}" />
                                @error('address.street')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Area --}}
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="address[area]" placeholder="Area"
                                    value="{{ old('address.area') }}" />
                                @error('address.area')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- City --}}
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="address[city]" placeholder="City"
                                    value="{{ old('address.city') }}" required />
                                @error('address.city')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- State --}}
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="address[state]" placeholder="State"
                                    value="{{ old('address.state') }}" required />
                                @error('address.state')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Country --}}
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="address[country]"
                                    placeholder="Country" value="{{ old('address.country') }}" required />
                                @error('address.country')
                                    <div class="text-danger form-text">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <livewire:property::admin.create-attributes />
            </div>
        </div>
    </div>

    <div class="card-footer">
        <input type="submit" class="btn btn-primary" />
    </div>
</form>
