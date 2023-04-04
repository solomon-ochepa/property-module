<section class="row gy-3">
    <div class="col-md-12">
        <h6 class="border-bottom">Media</h6>

        <input type="file" class="form-control" name="images" multiple required />
        @error('images')
            <div class="text-danger form-text">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12">
        <h6 class="border-bottom _d-flex">
            <span>Attributes</span>
        </h6>
    </div>

    @foreach ($attributes as $key => $attribute)
        <div class="col-md-7">
            <input type="text" class="form-control form-control-sm" name="attributes[{{ $key }}][name]"
                placeholder="Attribute" />
            @error('attributes.{{ $key }}.name')
                <div class="text-danger form-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-md-5">
            <div class="input-group">
                <input type="text" class="form-control form-control-sm" name="attributes[{{ $key }}][value]"
                    placeholder="Value" />
                @if ($key !== 0 and !Arr::has($attributes, $key + 1))
                    <button wire:click="remove({{ $key }})" type="button" class="input-group-text">
                        <i class="fas fa-times"></i>
                    </button>
                @endif
            </div>
            @error('attributes.{{ $key }}.value')
                <div class="text-danger form-text">{{ $message }}</div>
            @enderror
        </div>
    @endforeach

    <div class="col-md-12">
        <button wire:click="add()" type="button" class="btn _btn-sm">+</button>
    </div>
</section>
