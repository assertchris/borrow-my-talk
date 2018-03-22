@php
    $options = [
        'conference',
        'meet-up',
        'magazine',
        'book',
        'podcast',
    ];

    $alternatives = array_merge([null], $options);
@endphp
<div class="form-group">
    <label for="medium">Medium</label>
    <div class="form-row">
        <div class="col">
            <select name="medium" class="form-control" aria-describedby="medium-help" data-presentation-medium-select>
                @foreach ($options as $option)
                    <option value="{{ $option }}"
                        @if ($medium === $option)
                            selected="selected"
                        @endif
                    >{{ $option }}</option>
                @endforeach
                <option value="other"
                    @if (!in_array($medium, $alternatives))
                        selected="selected"
                    @endif
                >other</option>
            </select>
        </div>
        <div class="col">
            <input type="text" class="form-control" aria-describedby="medium-help" name="medium-other" value="{{ $medium }}" placeholder="Enter a medium" data-presentation-medium-other
                @if (in_array($medium, $alternatives))
                    style="display: none"
                @endif
            />
        </div>
    </div>
    <small id="medium-help" class="form-text text-muted">What type of presentation was this?</small>
</div>
@push('scripts')
    <script>
        var select = document.querySelector("[data-presentation-medium-select]")
        var other = document.querySelector("[data-presentation-medium-other]")

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
