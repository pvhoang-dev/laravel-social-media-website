<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rules\File;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'body'];

    public static function getRules()
    {
        return [
            'body' => ['nullable', 'string'],
            'user_id' => ['numeric'],
            'attachments' => 'array|max:50',
            'attachments.*' => [
                'file',
                File::types([
                    'jpg', 'jpeg', 'png', 'gif', 'webp',
                    'mp3', 'wav', 'mp4',
                    "doc", "docx", "pdf", "csv", "xls", "xlsx",
                    "zip"
                ])->max(500 * 1024 * 1024)
            ],
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(PostAttachment::class);
    }
}
