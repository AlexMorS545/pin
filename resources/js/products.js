import axios from "axios";

document.addEventListener('DOMContentLoaded', function() {
    products.init()
})

export const products = {
    data: [],
    statuses: {
        AVAILABLE: 'Доступен',
        NOT_AVAILABLE: 'Не доступен'
    },

    init() {
        this.getProducts()
    },
    async getProducts() {
        let result = await axios.get('/get-products')
        this.data = result.data
    },
}
