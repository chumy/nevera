<?php

namespace Nevera\Events;

use Nevera\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Nevera\User;
use Nevera\Nevera;
use Nevera\Ingrediente;
use Illuminate\Auth\Events\Login;

class AuthLoginEventHandler extends Event
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     *
    public function broadcastOn()
    {
        return [];
    }*/


    /**
     * Handle the event.
     *
     * @param  User $user
     * @param  $remember
     * @return void
     */
    public function handle(Login $event)
    {

        $user = User::find($event->user->id);
        $this->saveNevera($user);

        //dd("login fired and handled by class with User instance and remember variable");
    }

    /**
     * Salva la actual sesion en la BBDD
     *
     * @param  User user
     * @return void
     */
    protected function saveNevera(User $user)
    {
        if (\Session::has('nevera') && count(\Session::get('nevera'))>0)
        {
            $nevera = \Session::get('nevera');
            foreach ($nevera as $ingrediente) {
                $temp_nevera = new Nevera;
                $temp_nevera->user_id = $user->id;
                $temp_nevera->ingrediente_id = $ingrediente->id;
                //dd($temp_nevera);
                $temp_nevera->save();
            }
        }
    }

}
