@php
    $options = [
        'feedback',
        'video',
        'slides',
        'notes',
        'book',
        'code',
    ];

    $alternatives = array_merge([null], $options);
@endphp
<div class="form-group">
    <label for="type">Type</label>
    <div class="form-row">
        <div class="col">
            <select name="type" class="form-control" aria-describedby="type-help" data-link-type-select>
                @foreach ($options as $option)
                    <option value="{{ $option }}"
                        @if ($type === $option)
                            selected="selected"
                        @endif
                    >{{ $option }}</option>
                @endforeach
                <option value="other"
                    @if (!in_array($type, $alternatives))
                        selected="selected"
                    @endif
                >other</option>
            </select>
        </div>
        <div class="col">
            <input type="text" class="form-control" aria-describedby="type-help" name="type-other" value="{{ $type }}" placeholder="Enter a type" data-link-type-other
                @if (in_array($type, $alternatives))
                    style="display: none"
                @endif
            />
        </div>
    </div>
    <small id="type-help" class="form-text text-muted">What type of link is this?</small>
</div>
@push('scripts')
    <script>
        var select = document.querySelector("[data-link-type-select]")
        var other = document.querySelector("[data-link-type-other]")

        var value = select.value

        var onChange = function(e) {
            other.style.display = "none"

            if (select.value === "other") {
                if (value === other.value) {
                    other.value = ""
                }

                other.style.display = "inline"
            }
        }

        if (select) {
            select.addEventListener('focus', onChange)
            select.addEventListener('click', onChange)
            select.addEventListener('change', onChange)
        }
    </script>
@endpush
