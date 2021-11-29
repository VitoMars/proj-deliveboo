require('./bootstrap');

const deleteForm = document.querySelectorAll('.delete-form');

deleteForm.forEach(item => {
    item.addEventListener('submit', function(e) {
        const resp = confirm('Vuoi cancellare?')

        if(!resp) {
            e.preventDefault();
        }
    })
})

