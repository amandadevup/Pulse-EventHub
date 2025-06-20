<?php
// Importa o model de eventos
require_once __DIR__ . '/../models/Event.php';

class EventController{
    // Lista todos os eventos, com opção de filtro por cidade
    public function list(){
        // Aqui vamos buscar eventos e carregar a view de listagem
    }

    // Exibe o formulário para criar um novo evento
    public function createForm(){
        // Aqui vamos carregar a view do formulário de evento
    }

    // Processa o formulário e salva um novo evento no banco
    public function create (){
        // Aqui vamos receber os dados do formulário e salvar o evento
    }

    // Exibe o formulário para editar um evento existente
    public function editForm($id){
        // Aqui vamos buscar o evento pelo id e carregar a view de edição
    }

    // Processa o formulário e atualiza o evento no banco
    public function update($id){
        // Aqui vamos receber os dados do formulário e atualizar o evento
    }

    // Deleta um evento do banco de dados
    public function delete($id){
        // Aqui vamos deletar o evento pelo id
    }
}