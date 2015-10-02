<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateMovieRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'title' => 'required',
            // 'genre' => 'required',
            // 'release_date' => 'required',
            // 'rating' => 'required',
            // 'runtime' => 'required',
            // 'director' => 'required',
            // 'writer' => 'required',
            // 'cast' => 'required',
            // 'synopsis' => 'required',
        ];
    }

}