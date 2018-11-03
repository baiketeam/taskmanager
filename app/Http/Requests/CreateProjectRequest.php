<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProjectRequest extends FormRequest
{
    protected $errorBag = 'create';
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
            'name'=>[
                'required',
                Rule::unique('projects')->where(function($query){
                    return $query->where('user_id', request()->user()->id);
                })
            ],
            'thumbnail'=> 'image|dimensions:min_width=260,min_height=90|max:2048'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'项目名称是必填的~',
            'name.unique'=>'项目名称必须是唯一的，不能有重名项目哦~',
            'thumbnail.image'=>'请上传一个图片文件',
            'thumbnail.dimensions'=>'图片的最小尺寸是260X100像素',
            'thumbnail.max' => '不要上传超过2M的图片'
        ];
    }
}
