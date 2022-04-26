<div class="field-wrap">
    <label for="{{ $id }}">{{ __($label) }}</label>
    <div class="select-wrap">
        <input class="" id="{{ $id }}" type="text" name="{{ $name }}" value="{{ array_values($items)[0] }}" data-type="select">
        <div class="dropdown">
            @foreach($items as $key => $item)
                <div onclick='addValue("{{ $item }}")'>{{ $item }}</div>
            @endforeach
        </div>
    </div>
</div>


@push('scripts')
    <script>
        let inputSelect = document.querySelector('[data-type="select"]'),
            selectWrap = document.querySelector('.select-wrap')

        inputSelect.addEventListener('click', function () {
            this.classList.toggle('active')
            selectWrap.classList.toggle('active')
        })
        function addValue(value) {
            inputSelect.value = value
            inputSelect.classList.remove('active')
            selectWrap.classList.remove('active')
        }
    </script>
@endpush
