<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Validator;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
        'password' => 'hashed',
    ];

    public function updateProfile(array $data)
    {
    $validator = Validator::make($data, [
        'name' => 'required',
        'email' => 'required|email',
    ], [
        'name.required' => 'Meno je povinné pole.',
        'email.required' => 'E-mail je povinné pole.',
        'email.email' => 'Zadajte platnú e-mailovú adresu.',
    ]);

    if ($validator->fails()) {
        throw new \Exception($validator->errors()->first());
    }

    $this->update([
        'name' => $data['name'],
        'email' => $data['email'],
    ]);
    }

    public function updatePassword(string $newPassword)
    {
        $this->update([
            'password' => Hash::make($newPassword),
        ]);
    }

    public function shoppingCart(): HasMany
    {
        return $this->hasMany(ShoppingCart::class);
    }
}
