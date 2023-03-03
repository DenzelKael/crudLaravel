class Caja{
    constructor (){
        this._fecha = '#fecha_apertura_caja'
        this._monto_inicial = '#monto_inicial_caja'
        this._total_productos = '#total_productos_caja'
        this._total_impresiones = '#total_impresiones_caja'
        this._total_recargas = '#total_recargas_caja'
        this._extractos = '#extractos'
        this._form = '#form-apertura-caja'
        this._cajaModal = '#cajaModal'
        this._totalComision = 0;
        this._totalCapitalUtilizado = 0;
        this._totalDepositos = 0;

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
                console.log(data);
                const bancos = data.bancos
                this._totalComision = data.total_comision
                this._totalCapitalUtilizado = data.total_capital_utilizado
                this._totalDepositos = data.total_depositos
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
                total_productos: $(this._total_productos).val(),
                total_impresiones: $(this._total_impresiones).val(),
                total_recargas: $(this._total_recargas).val(),
                total_capital_utilizado: this._totalCapitalUtilizado,
                total_comision: this._totalComision,
                total_depositos: this._totalDepositos
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
            html=`<div><span class="btn btn-primary">${banco.plataforma.nombre}</span>| 
            <span class="btn btn-warning">Bs. ${banco.total_comision}</span>|
            <span class="btn btn-info">Bs. ${banco.total_capital_utilizado}</span>|
            <span class="btn btn-danger">Bs. ${banco.total_depositos}</span></div>`
            $(this._extractos).append(html)
        });
       

    }


}

$(()=>{

    let MVC = {}
    MVC.Caja = new Caja()
    MVC.Caja.init()

})