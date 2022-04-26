<div id="show-modal" class="modal-overlay">
    <div class="modal-wrap">
        <h2></h2>
        <div class="text-wrap">
            <p class="article">{{ __('Артикул') }}:<span></span></p>
            <p class="name">{{ __('Название') }}:<span></span></p>
            <p class="status">{{ __('Статус') }}:<span></span></p>
            <p class="attribute">{{ __('Атрибуты') }}:</p>
        </div>
        <div class="btn-wrap">
            <div id="edit-item" class="icons">
                <img src="{{ asset('/images/edit.png') }}">
            </div>
            <div id="remove-item" class="icons">
                <img src="{{ asset('/images/remove.png') }}">
            </div>
            <button type="button" class="close">
                <img src="{{ asset('/images/close.png') }}" alt="close">
            </button>
        </div>
    </div>
</div>
