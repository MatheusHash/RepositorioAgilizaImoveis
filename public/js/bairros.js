$(".cidade-item").each(function(index, ul) {
    $(this).children().on('click',function(){
        if( $(this).data('name') == 'cidade' ){
                var idCidade = $(this).data('value');
                console.log($('#bairros').find('h5'));
                $('#filtro-bairro').find('h5').html("Bairros" + '<i><svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 451.85 257.57"><path d="M225.92,354.71a31.59,31.59,0,0,1-22.37-9.27L9.27,151.16A31.64,31.64,0,0,1,54,106.41l171.9,171.91L397.83,106.41a31.64,31.64,0,0,1,44.74,44.75L248.29,345.45A31.54,31.54,0,0,1,225.92,354.71Z" transform="translate(0 -97.14)"></path></svg></i>')

                $.ajax({
                    url: `/api/municipios/${idCidade}/bairros`,
                    success: function(bairros){
                        $('#bairros').empty();
                        if(bairros.length){
                            $('#bairros').append(`<li> <a data-value="todosBairros" data-tipo="Todos Bairros" data-name="bairro">Todos os bairros </a> </li>`);

                            $.each(bairros, function(key, value){

                                $('#bairros').append(`<li> <a data-value="${value.id}" data-tipo="${value.nome}" data-name="bairro"> ${value.nome} </a> </li>`);

                            });
                        }else{
                            $('#bairros').append(`<li>Sem bairros...</li>`);
                        }

                    },
                    error: function(){
                        $("#bairros").html("Error ao carregar bairros!!");
                    },
                });
        }
    });
});
