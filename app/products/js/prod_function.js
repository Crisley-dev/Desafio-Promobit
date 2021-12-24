jQuery(function(){

    /* ------------------------------ prod_reg.php ------------------------------ */

    jQuery('button[type="submit"').on("click", function(e){
        e.preventDefault();
        var product = jQuery('#product_name').val();
        var tag = jQuery('#product_tag').val().toString();

        jQuery.ajax({
            type: "post",
            url: "../products/control/insert_products.php",
            data: {"product" : product, 
                    "tag": tag},
            dataType: "html",
            success: function (response) {
                if(response == 'success'){
                    jQuery.alert({
                        title: "Sucesso",
                        content: "Operação Realizada com Sucesso",
                        type: 'green',
                        buttons: {
                            ok: {
                                text: "OK",
                                btnClass: 'btn-green',
                                action: () => {
                                    location.reload();
                                }
                            }
                        }
                    });

                } else {
                    jQuery.alert({
                        title: "Erro",
                        content: "Ocorreu um erro inesperado",
                        type: 'red',
                        buttons: {
                            ok: {
                                text: "OK",
                                btnClass: 'btn-red',
                                action: () => {
                                    console.log(response);
                                    location.reload();
                                }
                            }
                        }
                    });
                }
            }
        });
    })

/* ------------------------------ prod_list.php ----------------------------- */

    jQuery("#tb_list_products").DataTable({
        searching: false,
        "info": false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json"
        },
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });

    jQuery('tr').click(function(){
        Swal.fire({
            html: '<form method="post" name="form_products">    <div class="form-outline form-white mb-4">        <div class="row p-3">            <div class="col col-sm-6 text-center">                <label class="form-label" style="font-size: 22px;" for="product_name">Nome do                    Produto</label>            </div>            <div class="col col-sm-6">                <input type="text" id="product_name" name="product_name"                    class="form-control form-control-md"  />            </div>        </div>        <div class="row p-3">            <div class="col col-sm-6 ">                <label class="form-label" style="font-size: 22px;" for="product_tag">Tag do                    Produto</label>            </div>            <div class="col col-sm-6">                <select name="product_tag" id="product_tag" multiple="multiple" class="form-control">                                                </select>            </div>        </div>        <div class="col p-5">        </div>            <button type="submit" class="btn btn-primary btn-lg" id="bt_submit">Cadastrar</button>    </div></form>'
        })
    })

    })