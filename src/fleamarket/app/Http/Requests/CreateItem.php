<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateItem extends FormRequest
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
            'item_image' => 'required',
            'title' => 'required|max:20',
            'category' => 'required',
            'content' => 'required|max:300',
            'postage' => 'required',
            'status' => 'required',
            'sender' => 'required',
            'deliverytime' => 'required',
            'prices' => 'required',
        ];
    }

    public function attributes()
{
    return [
        'item_image' => '出品画像',
        'title' => '商品名',
        'category' => 'カテゴリー',
        'content' => '商品の説明',
        'postage' => '配送料の負担',
        'status' => '商品の状態',
        'sender' => '発送元の地域',
        'deliverytime' => '発送までの日数',
        'prices' => '販売価格'
    ];
}
}
