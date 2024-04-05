<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatGPTController extends Controller
{
    public function ask(Request $request)
    {
        $client = new Client();
        
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'gpt-3.5-turbo', // または他のモデル
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => $request->input('question')],
                ],
            ],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        return view('answer', ['answer' => $body['choices'][0]['message']['content']]);
    }
}