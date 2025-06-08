<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Support\Facades\Http;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function (BotMan $botman, $message) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                    'Content-Type' => 'application/json',
                ])->post('https://api.groq.com/openai/v1/chat/completions', [
                    'model' => 'llama3-70b-8192', // modèle supporté par Groq
                    'messages' => [
                        ['role' => 'system', 'content' => "Tu es une assistante médicale virtuelle professionnelle et bienveillante. Donne des réponses claires, précises et adaptées à la santé féminine, sans jamais poser de diagnostic médical. Oriente vers un professionnel de santé si nécessaire."],
                        ['role' => 'user', 'content' => $message],
                    ],
                    'max_tokens' => 200,
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $reply = $data['choices'][0]['message']['content'] ?? "Je n'ai pas compris.";
                    $botman->reply($reply);
                } else {
                    $botman->reply("Erreur API Groq : " . $response->body());
                }
            } catch (\Exception $e) {
                $botman->reply("Erreur technique : " . $e->getMessage());
            }
        });

        $botman->listen();
    }
}
