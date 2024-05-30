document.addEventListener("DOMContentLoaded", function() {
    // Adicionar evento de clique ao botão de cadastrar
    document.getElementById("btn-cadastrar").addEventListener("click", function(event) {
        event.preventDefault(); // Impedir o envio padrão do formulário

        // Obter os dados do formulário
        var nome = document.getElementById("nome").value;
        var email = document.getElementById("email").value;
        var telefone = document.getElementById("telefone").value;
        var endereco = document.getElementById("endereco").value;
        var nomedopet = document.getElementById("nomedopet").value;

        // Criar um objeto FormData para enviar os dados
        var formData = new FormData();
        formData.append("nome", nome);
        formData.append("email", email);
        formData.append("telefone", telefone);
        formData.append("endereco", endereco);
        formData.append("nomedopet", nomedopet);

        // Enviar uma requisição AJAX para o PHP para cadastrar o cliente
        fetch("cadastrar_cliente.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Exibir mensagem de sucesso ou erro
            alert(data);
            // Recarregar a lista de clientes
            carregarClientes();
        })
        .catch(error => {
            console.error("Erro ao cadastrar cliente:", error);
        });
    });

    // Carregar a lista de clientes quando a página é carregada
    carregarClientes();
});

// Função para carregar a lista de clientes
function carregarClientes() {
    fetch("visualizar_clientes.php")
    .then(response => response.json())
    .then(data => {
        // Selecionar o elemento da lista de clientes
        var listaClientes = document.getElementById("lista-clientes");
        listaClientes.innerHTML = ""; // Limpar conteúdo anterior

        // Iterar sobre os clientes e adicionar cada um à lista
        data.forEach(cliente => {
            var divCliente = document.createElement("div");
            divCliente.innerHTML = `
                <p><strong>ID:</strong> ${cliente.id}</p>
                <p><strong>Nome:</strong> ${cliente.nome}</p>
                <p><strong>Email:</strong> ${cliente.email}</p>
                <p><strong>Telefone:</strong> ${cliente.telefone}</p>
                <p><strong>Endereço:</strong> ${cliente.endereco}</p>
                <p><strong>Nome do Pet:</strong> ${cliente.nomedopet}</p>
                <button onclick="removerCliente(${cliente.id})">Remover</button>
            `;
            listaClientes.appendChild(divCliente);
        });
    })
    .catch(error => {
        console.error("Erro ao carregar clientes:", error);
    });
}

// Função para remover um cliente
function removerCliente(id) {
    fetch(`remover_cliente.php?id=${id}`, {
        method: "GET"
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Exibir mensagem de sucesso ou erro
        carregarClientes(); // Recarregar a lista de clientes
    })
    .catch(error => {
        console.error("Erro ao remover cliente:", error);
    });
}
