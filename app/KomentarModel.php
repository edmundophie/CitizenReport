<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UserModel;

class KomentarModel extends Model {
	protected $table = "ppl_citizenreport_komentar";
	protected $appends = array('is_skpd', 'avatar');
	//

	public function getIsSkpdAttribute() {
		if(UserModel::where('id', $this->attributes['id_komentator'])->first()['role']=="SKPD")
			return true;
		else
			return false;
	}

	public function getAvatarAttribute() {
		return UserModel::where('id', $this->attributes['id_komentator'])->first()['avatar'];
	}
}
