<div id="form-modal" class="modal-overlay">
    <div class="modal-wrap">
        <div class="btn-wrap">
            <button type="button" class="close">
                <img src="{{ asset('/images/close.png') }}" alt="close">
            </button>
        </div>
        <h2></h2>
        <form action="" method="">
            @csrf
            @include('layouts.form_fields.input', ['id' => 'article', 'name' => 'article', 'label' => 'Артикул' ,'value' => ''])
            @include('layouts.form_fields.input', ['id' => 'name', 'name' => 'name', 'label' => 'Название' ,'value' => ''])
            @include('layouts.form_fields.select', ['id' => 'status', 'name' => 'status', 'label' => 'Статус' ,'value' => '', 'items' => \App\Models\Product::$statuses])
            <h4>Атрибуты</h4>
            <div class="additional-fields-wrap"></div>
            <button class="additional-field" type="button">Добавить атрибут</button>
            @include('layouts.form_fields.submit', ['label' => 'Сохранить'])
        </form>
    </div>
</div>

@push('scripts')
    <script>
        function deleteAdditionalFields(id) {
            let additionalFields = document.querySelectorAll('.additional-fields-wrap > .wrap')
            additionalFields.forEach(field => {
                if(field.dataset.count == id) {
                    field.remove()
                }
            })
        }
    </script>
@endpush
