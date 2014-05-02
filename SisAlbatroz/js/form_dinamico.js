// JavaScript Document

//Executa quando todo DOM(Árvore de elementos HTML) for carregado 
$(function(){
        
        $.AddRow();
        
        $('#button-add').click(function(e){
                
                e.preventDefault(); //anula a ação padrão do elemento, neste caso impede que o formulario seja enviado ao click deste botão
                
                $.AddRow(); // chamada da função que insere a nova linha;
                
        });

})



/* 
* Função: AddRow ( Adiciona Linha )
* Descrição: Insere uma nova linha no formulário 
*/
$.AddRow = function(){
        
        //Recuperando o tbody da table onde será inserido a nova linha
        $target = $('#grid-produtos');
        
        html_nova_linha = '';
        html_nova_linha = '<input type="text" name="preda[]" />';
                                                
        //inserindo na tabela a nova linha
        $target.append( html_nova_linha );

        /*
        //Montando o html da nova linha
        html_nova_linha = '';
        html_nova_linha =         '<tr>' +
                                                        '<td>' +
                                                                '<input type="text" name="nome[]" />' +
                                                        '</td>' + 
                                                        '<td>' +
                                                                '<input type="text" name="preco[]" />' +
                                                        '</td>' + 
                                                        '<td>' +
                                                                '<input type="text" name="quantidade[]" />' +
                                                        '</td>' + 
                                                '</tr>';
                                                
        //inserindo na tabela a nova linha
        $target.append( html_nova_linha );
        */
}