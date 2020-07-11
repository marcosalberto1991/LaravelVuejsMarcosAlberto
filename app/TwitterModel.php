<?php
	namespace App;

	use Illuminate\Database\Eloquent\Model;
    //use OwenIt\Auditing\Contracts\Auditable;

    class TwitterModel extends Model //implements Auditable
    {
        //use \OwenIt\Auditing\Auditable;
		protected $table = 'twitter';
        protected $fillable = [];
    //public $timestamps = false;
    
    public function user_id(){
      return $this->belongsTo('App\User', 'user_id');
    }
    /*
    public function cartera_lista_all(){
      return $this->HasMany('App\Cartera_ListaModel', 'cartera_sam_id');
    }
    */
	}
