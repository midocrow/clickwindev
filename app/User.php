<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable /*implements MustVerifyEmail*/
{
    use Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'referrer_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['referral_link'];

    /**
     * Get the user's referral link.
     *
     * @return string
     */
    public function getReferralLinkAttribute()
    {
        return $this->referral_link = route('register', ['ref' => $this->name]);
    }


    /**
     * Get the user's referral link.
     *
     * @return string
     */
    public function getRankAttribute()
    {
        return $this->rank = DB::table('points')
            ->where('links.zone', $this->link->zone)
            ->join('links', 'points.user_id', '=', 'links.user_id')
            ->orderBy('points', 'desc')
            ->pluck('points.user_id')
            ->flip()[$this->id] + 1;
        // return dd(array_search(Auth::user()->id, Point::orderBy('points')->pluck('user_id')->toArray()));
        // return dd(Point::orderBy('points')->pluck('user_id')->flip()[Auth::user()->id]);
    }

    public function getRankAllAttribute()
    {
        return $this->rankall = DB::table('points')
            ->orderBy('points', 'desc')
            ->pluck('user_id')
            ->flip()[$this->id] + 1;
        // return dd(array_search(Auth::user()->id, Point::orderBy('points')->pluck('user_id')->toArray()));
        // return dd(Point::orderBy('points')->pluck('user_id')->flip()[Auth::user()->id]);
    }


    /**
     * A user has a referrer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }


    /**
     * A user has many referrals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id', 'id');
    }

    /**
     * A user has one link.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function link()
    {
        return $this->hasOne(Link::class, 'user_id', 'id');
    }



    /**
     * A user has one link expired time.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getExpiredDateAttribute()
    {
        $expired_date = Carbon::createFromFormat('Y-m-d H:i:s', $this->link->updated_at)->addDay()->toDateTimeString();
        return $expired_date;
    }


    /**
     * A user has one link expired time.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getExpiredAttribute()
    {
        $up_date = $this->link->updated_at;
        $mydate = Carbon::createFromFormat('Y-m-d H:i:s', $up_date);
        $diff = $mydate->diffInHours(Carbon::now());
        return $diff  >= 24;
    }



    /**
     * A user has one score.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function points()
    {
        return $this->hasOne(Point::class, 'user_id', 'id');
    }


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
}