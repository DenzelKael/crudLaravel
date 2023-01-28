const inputNombre = document.getElementById('nombre')

const date = new Date();
if (inputNombre) {
    inputNombre.addEventListener('click', (e) => {
            e.target.value = `${date.getFullYear()}_${date.getMonth()+1}_${date.getDate()}_${date.getDay()}_${date.getHours()}_${date.getMinutes()}`

            //Date.now()
            //date.getDay().toString() + date.getDate().toString() + date.getMonth().toString() + date.getFullYear().toString()
        })
        //`${date.getDay()}_${date.getDay()} `
}