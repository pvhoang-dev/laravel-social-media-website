<?php

namespace App\Models;

use App\Http\Enums\GroupUserRole;
use App\Http\Enums\GroupUserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Group extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;

    protected $fillable = [
        'name',
        'user_id',
        'auto_approval',
        'about',
        'cover_path',
        'thumbnail_path'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function currentUserGroup(): HasOne
    {
        return $this->hasOne(GroupUser::class)->where('user_id', Auth::id());
    }

    public function isAdmin($userId): bool
    {
        return $this->currentUserGroup?->user_id == $userId;
    }

    public function adminUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_users')
            ->wherePivot('role', GroupUserRole::ADMIN->value);
    }

    public function pendingUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_users')
            ->wherePivot('status', GroupUserStatus::PENDING->value);
    }

    public function approvedUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_users')
            ->wherePivot('status', GroupUserStatus::APPROVED->value);
    }
}
