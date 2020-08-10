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

    /**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return array|stringenv
     */
    public function routeNotificationForMail($notification)
    {
        return $this->user->email;
    }
}
