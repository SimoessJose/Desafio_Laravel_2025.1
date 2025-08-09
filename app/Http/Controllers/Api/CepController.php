<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;

class CepController extends Controller
{
    public function show($cep)
    {
        // Valida o CEP (formato: 8 dígitos, sem traço)
        if (!preg_match('/^[0-9]{8}$/', $cep)) {
            return response()->json([
                'error' => 'CEP inválido! Use 8 dígitos (ex: 01001000).'
            ], 400); // HTTP 400 = Bad Request
        }

        $client = new Client();
        $url = "https://viacep.com.br/ws/{$cep}/json/";

        try {
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);

            // Se o CEP não existir, a API retorna { "erro": true }
            if (isset($data['erro'])) {
                return response()->json([
                    'error' => 'CEP não encontrado.'
                ], 404); // HTTP 404 = Not Found
            }

            return response()->json($data); // Retorna os dados do CEP

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Erro ao consultar CEP. Tente novamente.'
            ], 500); // HTTP 500 = Internal Server Error
        }
    }
}