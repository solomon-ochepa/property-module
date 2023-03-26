<div class="card-body">
    <x-alert />

    {{-- Filter --}}
    <section class="row">
        {{-- Limit --}}
        <div class="col-sm-12 col-md-6">
            <div class="dataTables_length" id="maintable_length">
                <label class="d-flex justify-content-start align-items-center">
                    <span class="me-1">Show</span>
                    <select wire:model.lazy="limit"
                        class="custom-select custom-select-sm form-control form-control-sm w-25 me-1">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="_col-auto">entries</span>
                </label>
            </div>
        </div>

        {{-- Search --}}
        <div class="col-sm-12 col-md-6">
            <div id="maintable_filter" class="dataTables_filter">
                <label class="d-flex justify-content-start align-items-center">
                    <span class="me-1">Search:</span>
                    <input type="search" class="form-control form-control-sm" placeholder="" wire:model="search">
                </label>
            </div>
        </div>
    </section>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    {{-- <th class="checkbox-area" scope="col">
                            <div class="form-check form-check-primary">
                                <input class="form-check-input" id="custom_mixed_parent_all" type="checkbox">
                            </div>
                        </th> --}}
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th class="text-center" scope="col">Status</th>
                    <th class="text-center" scope="col"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($properties ?? [] as $property)
                    <tr>
                        {{-- <td>
                                <div class="form-check form-check-primary">
                                    <input class="form-check-input custom_mixed_child" type="checkbox">
                                </div>
                            </td> --}}
                        <td>
                            <div class="media">
                                <div class="avatar me-2">
                                    @if ($property->hasMedia(['image']))
                                        <img alt="avatar" src="{{ $property->media('image')->first()->getUrl() }}"
                                            class="rounded-circle" />
                                    @else
                                        <i class="fa fa-home rounded-circle"></i>
                                    @endif
                                </div>

                                <div class="media-body align-self-center">
                                    <h6 class="mb-0" style="white-space: normal">{{ $property->title }}</h6>
                                    <span class="small" style="white-space: normal">
                                        <i class="fa fa-map-marker text-muted"></i>
                                        {{ $property->address->address }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="mb-0">{{ number_format($property->price, 2) }}</p>
                        </td>
                        <td class="text-center">
                            <span class="badge badge-light {{ $property->status->color }}">
                                @if ($property->status->icon)
                                    <i class="{{ $property->status->icon }} me-1"></i>
                                @endif
                                {{ $property->status->name }}
                            </span>
                        </td>

                        <!-- Actions -->
                        <td class="text-center">
                            <div class="action-btns">
                                {{-- <a href="{{ route('admin.property.show', $property->id) }}"
                                    class="action-btn btn-view bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="View">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </a> --}}

                                <a href="{{ route('admin.property.edit', $property->id) }}"
                                    class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip"
                                    data-placement="top" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                        </path>
                                    </svg>
                                </a>

                                <form class="d-inline" method="POST"
                                    action="{{ route('admin.property.destroy', $property->id) }}">
                                    @method('delete')
                                    @csrf

                                    <button type="submit"
                                        class="btn btn-sm bg-transparent px-2 action-btn btn-delete bs-tooltip"
                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                        {{-- <i class="fas fa-trash text-danger"></i> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17">
                                            </line>
                                            <line x1="14" y1="11" x2="14" y2="17">
                                            </line>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (!$properties->count())
            <p class="text-center py-4">
                No record found.
            </p>
        @endif
    </div>
</div>
