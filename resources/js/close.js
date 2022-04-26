let closeBtns = document.querySelectorAll('.close')


closeBtns.forEach(item => {
    item.addEventListener('click', function () {
        let modalWrap = this.closest('.modal-overlay')
        modalWrap.style.visibility = 'hidden'
    })
})
