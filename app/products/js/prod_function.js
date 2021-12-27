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
       let id = jQuery(this).find("td:eq(0)").text();
       let name = jQuery(this).find("td:eq(1)").text();

       jQuery.dialog({
        content: function () {
            var self = this;
            return jQuery.ajax({
                url: "",
                dataType: "html",
                method: "post",
                data: {
                  "id":id,
                  "name":name
                }
            }).done(function (response) {
                self.setContent(response);
                self.setTitle('Editar Funcionario');
            }).fail(function () {

                self.setContent('Ocorreu um erro.');
            });
        },
       })
    })

})