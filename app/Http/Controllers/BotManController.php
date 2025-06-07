<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use Illuminate\Support\Facades\Http;

class BotManController extends Controller
{
    public function handle()
    {
        // Initialisation du bot
        $botman = app('botman');

        // Capture des messages utilisateurs
        $botman->hears('{message}', function (BotMan $botman, $message) {
            try {
                // Envoi de la requête à Hugging Face
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . env('HUGGINGFACE_API_KEY'),
                    'Content-Type' => 'application/json',
                ])->post('https://api-inference.huggingface.co/models/facebook/blenderbot-3B', [
                    'inputs' => $message,
                ]);

                // Vérification de la réponse API
                if ($response->successful()) {
                    $data = $response->json();
                    $text = $data['generated_text'] ?? "Je n'ai pas compris.";
                    $botman->reply($text);
                } else {
                    $botman->reply("Erreur API Hugging Face : " . $response->body());
                }
            } catch (\Exception $e) {
                // Gestion des erreurs techniques
                $botman->reply("Erreur technique : " . $e->getMessage());
            }
        });

        // Activation de l’écoute du chatbot
        $botman->listen();
    }
}
