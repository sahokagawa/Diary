<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


// FormRequestを継承したCreateDiaryクラス
class CreateDiary extends FormRequest
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
            'title' => 'required|max:30',
            // ’create.blade.phpのname属性’　＝＞　’required:入力必須,｜:複数入れたいとき’
            'body' => 'required'
        ];
    }

    public function attributes()
    {
        return[
            'title' => 'タイトル',
            'body' => '本文',
        ];
    }
}
