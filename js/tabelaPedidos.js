window.onload = () => {
    var url_atual = window.location.href;
    let array_url = url_atual.split("?");
    let substring = 'deletado=true';
    if(url_atual.includes(substring)) {
        alert("Pedido deletado com sucesso");
        window.location.href = array_url[0];
    }

    substring = 'editado=true';
    if(url_atual.includes(substring)) {
        alert("Pedido editado com sucesso");
        window.location.href = array_url[0];
    }
}