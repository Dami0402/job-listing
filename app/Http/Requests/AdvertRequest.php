<?php

namespace App\Http\Requests;

use App\Models\Advert;
use Illuminate\Foundation\Http\FormRequest;

class AdvertRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'description' => 'required|string|max:30000' ,
            'location' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ];
    }

    public function getData() {
        $data = $this->validated() + [
            
            'user_id' =>$this->user()->id
        ];

        return $data;
    }

}
