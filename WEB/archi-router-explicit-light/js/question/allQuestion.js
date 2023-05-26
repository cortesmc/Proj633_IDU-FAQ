
const filterBtn = document.querySelector('#filterBtn');
const allCategories = document.querySelector('#allCategories');

filterBtn.addEventListener('click', () => {
    allCategories.classList.toggle('display_none');
})