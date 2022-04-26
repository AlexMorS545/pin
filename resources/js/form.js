import {products} from "./products";
import axios from "axios";

document.addEventListener('DOMContentLoaded', function() {
    forms.init()
})

let createBtn = document.getElementById('create-btn'),
    formModal = document.querySelector('#form-modal.modal-overlay'),
    showModal = document.querySelector('#show-modal.modal-overlay'),
    form = formModal.querySelector('form'),
    addFieldsBtn = document.querySelector('.additional-field'),
    editBtn = document.getElementById('edit-item'),
    removeBtn = document.getElementById('remove-item'),
    loader = document.querySelector('.loader-wrap')


const forms = {
    count: 0,
    init() {
        createBtn.addEventListener('click', function () {
            forms.showForm()
        })

        form.addEventListener('submit', this.submitForm)

        addFieldsBtn.addEventListener('click', forms.addFields)

        editBtn.addEventListener('click', function () {
            formModal.style.visibility = 'visible'
            showModal.style.visibility = 'hidden'
            let item = products.data.find(el => el.id === parseInt(this.dataset.id))
            forms.showEditForm(item)
        })

        removeBtn.addEventListener('click', function () {
            forms.removeItem(parseInt(this.dataset.id))
        })
    },

    showForm() {
        let action = window.location.origin + '/products'
        form.setAttribute('action', action)
        form.setAttribute('method', 'POST')
        formModal.style.visibility = 'visible'
    },

    async submitForm(event) {
        event.preventDefault()
        let uri = '',
            token = form.querySelector('input[name="_token"]').value,
            method = form.getAttribute('method'),
            config = {
                _token: token,
                article: form.querySelector('input[name="article"]').value,
                name: form.querySelector('input[name="name"]').value,
                status: form.querySelector('input[name="status"]').value,
                data: forms.getData()
            }

        if (method === 'PUT') {
            let id = form.getAttribute('action').split('/').pop()
            uri = window.location.origin + '/products/' + id
            await axios.put(uri, config).then(res => {
                if (res.data.permission) {
                    let input = form.querySelector(`input[name="article"]`)
                    input.insertAdjacentHTML('afterend', `<div class="alert">${res.data.permission}</div>`)
                } else
                    forms.showSuccess(res.data)
            }).catch(err => forms.showRequestErrors(err))
        }
        else {
            uri = window.location.origin + '/products'
            await axios.post(uri, config).then(res => forms.showSuccess(res.data)).catch(err => forms.showRequestErrors(err))
        }
    },
    showRequestErrors(error) {
        let alertBlocks = document.querySelectorAll('.alert')
        if (alertBlocks)
            alertBlocks.forEach(el => el.remove())

        if (error.response) {
            console.log(error.response.data.errors)
            for (let er in error.response.data.errors) {
                forms.showErrors(er, error.response.data.errors[er])
            }
        }
    },

    getData() {
        let fields = form.querySelectorAll('.additional-fields-wrap .wrap'),
            obj = {}

        fields.forEach(item => {
            let keyObj = item.querySelector('input[name="data[name]"]').value,
                valueObj = item.querySelector('input[name="data[value]"]').value
                obj[keyObj] = valueObj
        })
        return obj
    },

    showErrors(inputName, text) {
        let input = form.querySelector(`input[name=${inputName}]`)
        input.insertAdjacentHTML('afterend', `<div class="alert">${text}</div>`)
    },

    showSuccess(data) {
        form.remove()
        formModal.querySelector('h2').innerHTML = data.success
        setTimeout(() => location.reload(), 1000)
    },

    addFields() {
        let fieldsWrap = document.querySelector('.additional-fields-wrap')
        fieldsWrap.insertAdjacentHTML('beforeend', forms.renderFields())
    },

    renderFields(name = '', value = '') {
        this.count++
        return `<div class="wrap" data-count="${this.count}">
                    <div class="field-wrap">
                        <label>Название</label>
                        <input type="text" name="data[name]" value="${name}">
                    </div>
                    <div class="field-wrap">
                        <label>Значение</label>
                        <input type="text" name="data[value]" value="${value}">
                    </div>
                    <img onclick="deleteAdditionalFields(${this.count})" class="delete-btn" src="/images/remove.png">
                </div>`
    },



    showEditForm(item) {
        let fieldsWrap = document.querySelector('.additional-fields-wrap')
        let action = window.location.origin + '/products/' + item.id
        form.setAttribute('action', action)
        form.setAttribute('method', 'PUT')
        form.querySelector('input[name="article"]').value = item.article
        form.querySelector('input[name="name"]').value = item.name
        form.querySelector('input[name="status"]').value = products.statuses[item.status]
        if (item.data) {
            fieldsWrap.innerHTML = ''
            for (let el in item.data) {
                fieldsWrap.insertAdjacentHTML('beforeend', forms.renderFields(el, item.data[el]))
            }
        }
    },

    async removeItem(id) {
        let result = await axios.delete('/products/' + id, {
            token: form.querySelector('input[name="_token"]').value
        })
        if (result.data.success) {
            showModal.querySelector('h2').innerHTML = result.data.success
            showModal.querySelector('.text-wrap').remove()
            showModal.querySelector('#edit-item').remove()
            showModal.querySelector('#remove-item').remove()
            let items = document.querySelectorAll('.item-link')
            items.forEach(function (item) {
                let itemId = parseInt(item.dataset.id)
                if (itemId === id)
                    item.remove()
            })
        }
    },
}

