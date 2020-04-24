<?php

namespace App\Http\Requests;

use Domain\Model\Entity\Tweet\PostedPicture;
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
            'content'        => 'required|max:' . TweetContent::CONTENT_MAX_LENGTH,
            'posted_picture' => 'max:' . PostedPicture::MAX_UPLOADING_IMAGE_SIZE . '|image',
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
            'content.required'     => 'つぶやきは最低1文字以上必要です',
            'content.max'          => 'つぶやきは140文字以内までです',
            'posted_picture.image' => '投稿できるファイルは画像のみです',
            'posted_picture.max'   => '投稿できる画像サイズは5MBまでです',
        ];
    }
}
