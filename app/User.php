<?php

namespace App;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\UserProfile;
use App\Notifications\UserCreated;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Password;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    const ROLE_ADMIN = 1;
    const ROLE_TEACHER = 2;
    const ROLE_STUDENT = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'enrolment',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  Create new user method
     *
     * @param $request
     * @return array
     */
    public static function createFully($request)
    {
        $password = Str::random(6);

        $user = parent::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'enrolment' => Str::random(6)
        ]);

        self::assignEnrolment($user, self::ROLE_ADMIN);
        self::assignRole($user, $request->type);

        $user->save();

        if (isset($request->send_mail)) {
            $token = Password::broker()->createToken($user);
            $user->notify(new UserCreated($token));
        }
        return compact('user', 'password');
    }

    /**
     * Assign enrolment for users
     *
     * @param User $user
     * @param $type
     * @return int|mixed|string
     */
    public static function assignEnrolment(User $user, $type)
    {
        $types = [
            self::ROLE_ADMIN => 100000,
            self::ROLE_TEACHER => 400000,
            self::ROLE_STUDENT => 700000,
        ];

        $user->enrolment = $types[$type] + $user->id;

        return $user->enrolment;
    }

    /**
     * Assign role for users
     *
     * @param User $user
     * @param $type
     */
    public static function assignRole(User $user, $type)
    {
        $types = [
            self::ROLE_ADMIN => Admin::class,
            self::ROLE_TEACHER => Teacher::class,
            self::ROLE_STUDENT => Student::class,
        ];

        $model = $types[$type];
        $model = $model::create([]);

        $user->userable()->associate($model);
    }

    /**
     * @return MorphTo
     */
    public function userable()
    {
        return $this->morphTo();
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class)->withDefault();
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'user' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
            ],
        ];
    }
}
