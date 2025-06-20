<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id)],
            'jurusan' => ['required', 'string', 'max:255'], // Tambahkan ini
            'kampus' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
            'biografi' => ['nullable', 'string', 'max:500'],
            'pendidikan_terakhir' => ['nullable', 'string', 'max:255'],
            'tahun_pendidikan_terakhir' => ['nullable', 'string', 'max:4'],
        ];
    }
}
