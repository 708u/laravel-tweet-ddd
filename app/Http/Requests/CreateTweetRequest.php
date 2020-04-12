<?php

namespace App\Http\Requests;

use Domain\Model\ValueObject\Tweet\TweetContent\TweetContent;
use Illuminate\Foundation\Http\FormRequest;

class CreateTweetRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|max:' . TweetContent::CONTENT_MAX_LENGTH,
        ];
    }

    /**
     * error messages
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'content.required' => 'つぶやきは最低1文字以上必要です',
            'content.max'      => 'つぶやきは140文字以内までです',
        ];
    }
}
