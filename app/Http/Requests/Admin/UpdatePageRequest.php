<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('page_edit');
    }

    public function rules()
    {
        return [
            'home_title' => [
                'string',
                'nullable',
            ],
            'home_button_text' => [
                'string',
                'nullable',
            ],
            'about_us_header' => [
                'string',
                'nullable',
            ],
            'mission_header' => [
                'string',
                'nullable',
            ],
            'vision_header' => [
                'string',
                'nullable',
            ],
            'gallery_or_portfolio_title' => [
                'string',
                'nullable',
            ],
            'gallery_or_portfolio_description' => [
                'string',
                'nullable',
            ],
            'booking_title' => [
                'string',
                'nullable',
            ],
            'booking_title_address' => [
                'string',
                'nullable',
            ],
            'booking_description_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
