<?php
namespace Repositories;

use Models\Contatos;

class ContatosRepository {
    // pegando contatos
    public static function getContatos() {
        return Contatos::where('idcontatos', '1')->first();
    }

    // atualizando contatos
    public static function update($data) {

        $update = Contatos::where('idcontatos', '1')->update([
            'instagram' => $data['instagram'],
            '_instagram' => $data['@_instagram'],
            'facebook' => $data['facebook'],
            '_facebook' => $data['@_facebook'],
            'linkedin' => $data['linkedin'],
            '_linkedin' => $data['@_linkedin'],
            'email_clientes' => $data['email-clientes'],
            'email_fornecedor' => $data['email-fornecedor'],
            'telefone_clientes' => $data['telefone-clientes'],
            'telefone_fornecedor' => $data['telefone-fornecedor'],
        ]);

        if($update){
            return true;
        } else {
            return false;
        }

    }
}