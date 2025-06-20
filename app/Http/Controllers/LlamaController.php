<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LlamaController extends Controller
{
    public function ask(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'prompt' => 'required|string|max:1000',
            ]);

            // Log untuk debugging
            Log::info('LlamaController::ask called with prompt: ' . $request->prompt);

            // Panggil API Groq
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type' => 'application/json',
            ])->timeout(30)->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.3-70b-versatile',
                'messages' => [
                    [
                        'role' => 'system', 
                        'content' => 'Anda adalah asisten AI yang membantu pengguna SkillHub. Berikan jawaban yang informatif dan membantu dalam bahasa Indonesia.'
                    ],
                    [
                        'role' => 'user', 
                        'content' => $request->prompt
                    ]
                ],
                'max_tokens' => 1000,
                'temperature' => 0.7,
            ]);

            // Cek apakah request berhasil
            if (!$response->successful()) {
                Log::error('Groq API Error: ' . $response->body());
                return response()->json([
                    'error' => 'Gagal menghubungi layanan AI. Status: ' . $response->status()
                ], 500);
            }

            $responseData = $response->json();
            
            // Cek apakah response memiliki struktur yang benar
            if (!isset($responseData['choices'][0]['message']['content'])) {
                Log::error('Invalid Groq API Response: ' . json_encode($responseData));
                return response()->json([
                    'error' => 'Response dari layanan AI tidak valid'
                ], 500);
            }

            $botResponse = $responseData['choices'][0]['message']['content'];

            // Log untuk debugging
            Log::info('LlamaController::ask response: ' . $botResponse);

            // Return JSON response untuk AJAX
            return response()->json([
                'success' => true,
                'response' => $botResponse
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Input tidak valid: ' . implode(', ', $e->errors()['prompt'] ?? ['Unknown validation error'])
            ], 422);
        } catch (\Illuminate\Http\Client\RequestException $e) {
            Log::error('HTTP Request Error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Gagal menghubungi layanan AI. Silakan coba lagi.'
            ], 500);
        } catch (\Exception $e) {
            Log::error('LlamaController Error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            
            return response()->json([
                'error' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    // Method untuk web form (jika masih diperlukan)
    public function askWeb(Request $request)
    {
        try {
            $request->validate([
                'prompt' => 'required|string',
            ]);

            session()->flash('prompt', $request->prompt);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'llama-3.3-70b-versatile',
                'messages' => [
                    ['role' => 'user', 'content' => $request->prompt]
                ],
            ]);

            return redirect()->back()->with('response', $response->json()['choices'][0]['message']['content'] ?? 'No response');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}