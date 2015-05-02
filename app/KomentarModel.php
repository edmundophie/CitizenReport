<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserModel;

class KomentarModel extends Model {
	protected $table = "ppl_citizenreport_komentar";
	protected $appends = array('is_skpd', 'avatar');
	//

	public function getIsSkpdAttribute() {
		$role = UserModel::where('id', $this->attributes['id_komentator'])->first()['role'];
		if(strtoupper($role)=="SKPD")
			return true;
		else
			return false;
	}

	public function getAvatarAttribute() {
		return "default.jpg";
	}
}
