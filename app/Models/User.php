<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function detail_users(): HasOne
    {
        if (auth()->user()->is_student) {
            return $this->hasOne(Student::class, 'user_id', 'id');
        } else {
            return $this->hasOne(Teacher::class, 'user_id', 'id');
        }
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class, 'user_id', 'id');
    }

    public static function profile_update(array $updated_profile): bool
    {
        $user = auth()->user();
        self::where('id', $user->id)->update($updated_profile[0]);
        if ($user->is_teacher) {
            Teacher::where('user_id', $user->id)->update($updated_profile[1]);
        } elseif ($user->is_student) {
            Student::where('user_id', $user->id)->update($updated_profile[1]);
        }

        return true;
    }

    static function getUserByUsername(string $username)
    {
        return self::where('username', $username)->limit(1)->first();
    }
}
