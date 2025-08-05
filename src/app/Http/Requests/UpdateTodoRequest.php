<?php

namespace App\Http\Requests;

use App\Enums\TodoPriorityEnum;
use App\Enums\TodoStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:100', 'string'],
            'description' => ['nullable', 'max:255', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'status' => ['required', 'string', Rule::enum(TodoStatusEnum::class)],
            'priority' => ['required', 'string', Rule::enum(TodoPriorityEnum::class)],
            'due_date' => ['nullable', 'date'],
            'completed_at' => ['nullable', 'date'],
            'is_starred' => ['boolean']
        ];
    }
}
