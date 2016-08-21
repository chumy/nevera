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
        //Actualizacion de nevera
        if (\Session::has('nevera') && count(\Session::get('nevera'))>0)
        {
            $nevera = \Session::get('nevera');

            // Recuperamos la nevera de la BD
            $nevera_db = Nevera::where('user_id', '=', $user->id)->get();

            foreach ($nevera_db as $articulos_db) {
                $ingrediente = Ingrediente::find($articulos_db->ingrediente_id);
                $nevera[$ingrediente->slug] = $ingrediente;
                $lista_db[] = $articulos_db->ingrediente_id;
            }

            //dd($nevera_db);
            //Comparamos la nevera de la BD
            foreach ($nevera as $articulos) {
                if (! in_array($articulos->id, $lista_db))
                {
                    $temp_nevera = new Nevera;
                    $temp_nevera->user_id = $user->id;
                    $temp_nevera->ingrediente_id = $articulos->id;
                    $temp_nevera->save();
                }
            }

            \Session::put('nevera', $nevera);
            $total_recetas= count(\App::call('Nevera\Http\Controllers\NeveraController@totalRecetas'));
            \Session::put('total_recetas',$total_recetas);
        }
        else //Sin Session previa
        {
            $nevera_db = Nevera::where('user_id', '=', $user->id)->get();

            
            if (count($nevera_db) > 0)
            {

                foreach ($nevera_db as $articulos_db) {
                    $ingrediente = Ingrediente::find($articulos_db->ingrediente_id);
                    $nevera[$ingrediente->slug] = $ingrediente;

                }
                \Session::put('nevera', $nevera);
                $total_recetas= count(\App::call('Nevera\Http\Controllers\NeveraController@totalRecetas'));
                \Session::put('total_recetas',$total_recetas);
            }

        }
    }

}
