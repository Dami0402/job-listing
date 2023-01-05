<?php

namespace App\Http\Requests;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'resume' => 'required|string|max:30000',
            'advert_id' =>'required'
        ];
    }

public function getData(Request $request)
{
    $data = $this->validated() + [

        'advert_id' => $request->route('id')
    ];
    
    return $data;
}

protected function getSlug($name)
    {
        $slug = str($name)->slug();
        $numSlugsFound = Application::where('slug', 'regexp', "^" . $slug . "(-[0-9])?")->count();
        if ($numSlugsFound > 0) {
            return $slug . "-" .$numSlugsFound + 1;
        }
        return $slug;
    }
}
