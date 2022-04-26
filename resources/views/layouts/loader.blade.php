<div class="loader-wrap">
    <div class="loader">
        <img src="{{ asset('/images/logo.svg') }}" alt="PIN">
        <h2>{{ __('Потому что Интернет Нужен') }}</h2>
    </div>
</div>

@push('scripts')
    <script>
        let loader = document.querySelector('.loader-wrap')
        window.addEventListener('load', function () {
            setTimeout(removeLoader, 1000)
        })
        function removeLoader() {
            loader.style.display = 'none'
        }
    </script>
@endpush
