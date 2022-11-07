const sendMessage = (data) => {
    // console.log(data);

    axios.post('/api/contato/adicionar', {
        data,
    })
    .then(function (response) {
        if(response.status === 200){
            let message = document.getElementById('campos-form').innerHTML = `<h5>Mensagem enviada com sucesso! 😄</h5>`
        }else{
            let message = document.getElementById('campos-form').innerHTML = `<h5>Falha ao enviar a mensagem, tente novamente. 😄</h5>`
        }
    })
    .catch(function (error) {
        console.error(error.response);
    });
}
