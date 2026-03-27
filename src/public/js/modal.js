document.querySelectorAll('.js-modal-open').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.dataset.id;
        const modal = document.querySelector(`#modal-${id}`);
        modal.showModal();
    });
});

document.querySelectorAll('.js-modal-close').forEach(button => {
    button.addEventListener('click', () => {
        button.closest('dialog').close();
    });
});
