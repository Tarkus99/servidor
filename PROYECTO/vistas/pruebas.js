alert("HOLA");
const form = document.querySelector('form');
const user = document.querySelector('#user');
const pass = document.querySelector('#pass');
form.addEventListener('submit', (e) => {
    e.preventDefault();


    fetch(`../servicioClientes/service.php?email=${user.value}&pass=${pass.value}`)
        .then(response => {
            if (!response.ok) {
                response.json().then(errorData => alert(errorData.detalle));
                return;
            }
            return response.json();
        })
        .then(data => {
            alert();
            location.reload();
        })


})