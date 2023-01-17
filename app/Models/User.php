<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Billable;
    use TwoFactorAuthenticatable;

    public function Exam()
    {
        return $this->belongsToMany(Exam::class);
    }

    public function Grade()
    {
        return $this->hasMany(Grade::class);
    }

    public function Application()
    {
        return $this->hasMany(Application::class);
    }

    public function Institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function Review()
    {
        return $this->hasMany(Review::class);
    }

    public function Group()
    {
        return $this->belongsToMany(Group::class);
    }

    public function Timetable()
    {
        return $this->hasMany(Timetable::class);
    }

    public function Assignment()
    {
        return $this->belongsToMany(Assignment::class);
    }

    public function Subject()
    {
        return $this->belongsToMany(Subject::class);
    }

    public function Post()
    {
        return $this->hasMany(Post::class);
    }

    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function Note()
    {
        return $this->hasMany(Note::class);
    }

    public function Like()
    {
        return $this->hasMany(Like::class);
    }

    public function Report()
    {
        return $this->hasMany(Report::class);
    }

    public function Discussion()
    {
        return $this->hasMany(Discussion::class);
    }

    public function Reply()
    {
        return $this->hasMany(Reply::class);
    }

    public function Webhook()
    {
        return $this->hasMany(Webhook::class);
    }

    public function Tag()
    {
        return $this->hasMany(Tag::class);
    }

    public function Task()
    {
        return $this->hasMany(Task::class);
    }

    public function Star()
    {
        return $this->hasMany(Star::class);
    }

    public function Label()
    {
        return $this->hasMany(Label::class);
    }

    public function Resource()
    {
        return $this->hasMany(Resource::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',

        'username',
        'bio',

        'institution_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_tutor' => 'boolean',
        'is_admin' => 'boolean',
        'is_moderator' => 'boolean',
        'is_banned' => 'boolean',
        'private' => 'boolean',
        'contact' => 'boolean'
    ];
}
