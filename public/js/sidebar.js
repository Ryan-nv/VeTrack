const sidebar = document.getElementById('sidebar');
const toggle = document.querySelector('#sidebar-toggle');
const content = document.querySelector('#content');

toggle.addEventListener('click', () => {
    sidebar.classList.toggle('open');


});
