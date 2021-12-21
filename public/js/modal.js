const open = document.getElementById('open');
const modal_container = document.getElementById('modal_container');
const close = document.getElementById('close');
const cancel = document.getElementById('cancel');

    open.addEventListener('click', () => {
        modal_container.classList.add('show');
        });

    close.addEventListener('click', () => {
        modal_container.classList.remove('show');
        });

    cancel.addEventListener('click', () => {
        modal_container.classList.remove('show');
    });