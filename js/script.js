const hamburgerMenu = document.querySelector(".hamburger-menu");
const nav = document.querySelector("nav");
const wrapper = document.querySelector(".wrapper");

hamburgerMenu.addEventListener("click", () => {
    nav.classList.toggle("collapse");
    wrapper.classList.toggle("collapse");
});

const btnModals = document.querySelectorAll('[data-btn-modal="true"]')
btnModals.forEach(element => {
    element.addEventListener("click", (e) => {
        e.preventDefault;
        const idModal = element.getAttribute("data-modal");
        const modalWrapper = document.querySelector(idModal);
        const modal = document.querySelector(`${idModal} .modal`);
        modalWrapper.classList.add("visible");
        modal.classList.add("visible");
    });
});

const btnCloseModal = document.querySelectorAll('[data-btn-close="modal"]');
btnCloseModal.forEach(element => {
    const modalWrapper = element.parentNode.parentNode.parentNode;
    modalWrapper.addEventListener("click", (e) => {
        e.preventDefault;
        const modal = element.parentNode.parentNode;
        if (e.target === element || e.target === modalWrapper) {
            modalWrapper.classList.remove("visible");
            modal.classList.remove("visible");
        }
    });
});

const btnCancelModal = document.querySelectorAll('[data-btn-cancel="modal"]');
btnCancelModal.forEach(element => {
    const modalWrapper = element.parentNode.parentNode.parentNode.parentNode;
    modalWrapper.addEventListener("click", (e) => {
        e.preventDefault;
        const modal = element.parentNode.parentNode.parentNode;
        if (e.target === element || e.target === modalWrapper) {
            modalWrapper.classList.remove("visible");
            modal.classList.remove("visible");
        }
    });
});