<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildRequest extends FormRequest
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
            'uid' => 'required'
            //  'character_id' => 'required',
            // 'ascension' => 'required',
            // 'char_lv' => 'required|numeric|between:1,90',
            // 'weapon_id' => 'required',
            // 'refinement' => 'required',
            // 'flower_id' => 'required|gt:0',
            // 'plume_id' => 'required|gt:0',
            // 'sand_id' => 'required|gt:0',
            // 'goblet_id' => 'required|gt:0',
            // 'circlet_id' => 'required|gt:0',
            // 'main_sand' => 'required',
            // 'main_goblet' => 'required',
            // 'main_circlet' => 'required',
            // 'talent1' => 'required',
            // 'talent2' => 'required',
            // 'talent3' => 'required',
            // 'conste' => 'required',
            // 'hp' => 'required|max:5',
            // 'atk' => 'required|max:4',
            // 'defense' => 'required|max:4',
            // 'em' => 'required|max:4',
            // 'c_rate' => 'required|numeric|between:0,9999',
            // 'c_damage' => 'required|numeric|between:0,9999',
            // 'healing_bonus' => 'required|numeric|between:0,9999',
            // 'er' => 'required|numeric|between:0,9999',
            // 'elemental_dmg' => 'required|numeric|between:0,9999',
            // 'physical_dmg' => 'required|numeric|between:0,9999',
        ];
    }
}
