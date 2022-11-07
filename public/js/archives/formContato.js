const formulario = (event)=>{
    if(event.target.tagName === 'A'){
        var contactar = event.target;
        var cod = contactar.getAttribute("data-value");
        if (cod){
            let formContato = document.getElementById('campos-form');

            if(formContato.children.length <=1){
                formContato.innerHTML=  `
                        <h5>Mande sua mensagem</h5>
                        <input type="hidden"    id="codImovel"  name="codImovel">
                        <input type="text"      id="nome"       name="nome"     placeholder="Seu nome"          required>
                        <input type="email"     id="email"      name="email"    placeholder="E-mail"            required>
                        <input type="tel"       id="telefone"   name="telefone" placeholder="Telefone"          required>
                        <textarea               id="mensagem"   name="mensagem" placeholder="Mensagem"          required></textarea>

                        <input type="submit" value="Receber informações" >
                    `;
            }
            let codImovel = document.getElementById('codImovel').value = cod;
        }
    }
}
