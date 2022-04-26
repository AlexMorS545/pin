import {products} from "./products";

document.addEventListener('DOMContentLoaded', function() {
    showItem.init()
})

let itemLinks = document.querySelectorAll('.item-link'),
    showModal = document.querySelector('#show-modal.modal-overlay')

const showItem = {
    init() {
        itemLinks.forEach(item => {
            item.addEventListener('click', function (event) {
                showItem.show(parseInt(this.dataset.id))
            })
        })
    },

    show(id) {
        let item = products.data.find(el => el.id === id)
        showModal.querySelector('h2').innerHTML = 'Редактировать ' + item.name
        showModal.querySelector('#edit-item').setAttribute('data-id', item.id)
        showModal.querySelector('#remove-item').setAttribute('data-id', item.id)
        showModal.querySelector('.article > span').innerHTML = item.article
        showModal.querySelector('.name > span').innerHTML = item.name
        showModal.querySelector('.status > span').innerHTML = products.statuses[item.status]
        showModal.style.visibility = 'visible'
        if (item.data) {
            let block = document.createElement('div')
            showModal.querySelector('.attribute').appendChild(block)
            for (let el in item.data) {
                block.insertAdjacentHTML('beforeend', `<span>${el}: ${item.data[el]}</span>`)
            }
        }
    },
}
