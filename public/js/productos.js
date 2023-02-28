class Productos{
    constructor (){


    }

    init(){
        const self = this;
        $(this._fecha).on('change',()=>{
            self.getComission()
        })
        /* $(this._form).on('submit',(e)=>{
            e.preventDefault()
            self.save(this)
        }) */
       this.getComission()

    }

    getComission(){
        $.ajax({
            url: 'caja/productos',
            method: 'GET',
            success: (response)=>{
                console.log(response)
            },
                       
        })

    }

    save(form){
        $.ajax({
            url: 'caja',
            method: 'POST',
            dataType: 'JSON', 
            headers: {'X-CSRF-TOKEN': window.Laravel.csrfToken},
            data: {
                fecha: $(this._fecha).val(),
                monto_apertura: $(this._monto_inicial).val(),
                total_comision: this._totalComision
            },
            success: ()=>{
                
                $(this._cajaModal).modal('hide')
                location.reload()
            },
            error: (error)=>{
              alert(error.responseJSON.message)
            }
            

        })

    }



    setHTMLBancos(bancos){
        $(this._extractos).empty()
        let html ='';
        bancos.forEach(banco => {
            html=`<div  class="alert alert-info">${banco.plataforma.nombre} | Bs. ${banco.total_comision}</div>`
            $(this._extractos).append(html)
        });
       

    }


}

$(()=>{

    let MVC = {}
    MVC.Caja = new Productos()
    MVC.Caja.init()

})