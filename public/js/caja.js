class Caja{
    constructor (){
        this._fecha = '#fecha_apertura_caja'
        this._monto_inicial = '#monto_inicial_caja'
        this._extractos = '#extractos'
        this._form = '#form-apertura-caja'
        this._cajaModal = '#cajaModal'
        this._totalComision = 0;

    }

    init(){
        const self = this;
        $(this._fecha).on('change',()=>{
            self.getComission()
        })
        $(this._form).on('submit',(e)=>{
            e.preventDefault()
            self.save(this)
        })
       this.getComission()

    }

    getComission(){
        $.ajax({
            url: 'banco/comission?fecha='+$(this._fecha).val(),
            method: 'GET',
            success: (response)=>{
                const data = response.data
                const bancos = data.bancos
                this._totalComision = data.total_comision
                this.setHTMLBancos(bancos)
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
            html=`<div><span class="btn btn-primary">${banco.plataforma.nombre}</span> | 
            <span class="btn btn-warning">Bs. ${banco.total_comision}</span></div></br>`
            $(this._extractos).append(html)
        });
       

    }


}

$(()=>{

    let MVC = {}
    MVC.Caja = new Caja()
    MVC.Caja.init()

})