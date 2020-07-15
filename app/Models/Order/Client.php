<?php


namespace App\Models\Order;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use Notifiable;
    /**
     * {@inheritdoc}
     */
    protected $fillable = ['user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPhoneAttribute()
    {
        return optional($this->user)->phone;
    }

    public function getNameAttribute()
    {
        return optional($this->user)->name;
    }

    public function getEmailAttribute()
    {
        return optional($this->user)->email;
    }


    /**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|string
     */
    public function routeNotificationForMail($notification)
    {
        return $this->user->email;
    }
}
