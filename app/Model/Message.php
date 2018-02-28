<?php
namespace App\Model;
use App\User;
use DB;
use Session;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table='messages';
    protected $fillable = [
        'user_id', 'body', 'created_at','updated_at','title'
    ];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /*public function allMessage(){
        $message = DB::table('messages')->get();
        return $message;
    }*/
}
