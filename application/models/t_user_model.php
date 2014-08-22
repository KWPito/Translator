<?php
class T_user_model extends CI_Model {
	/*
	 * コンストラクタ
	 */
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	/*
	 * ユーザ情報取得（全件）
	 */
	function get_users_info()
	{
		log_message('debug', 'get_users_info start');

		// キャッシュをクリアしておく
		$this->db->flush_cache();
		$sql = "SELECT
					*
				FROM t_user
				WHERE delete_flg = '0'" ;
		log_message('debug', $sql);
		$query = $this->db->query($sql);

		log_message('debug', 'get_users_info end');
		return $query;
	}
	/*
	 * ユーザ情報取得（1件）
	 */
	function get_user_info($_id)
	{
		log_message('debug', 'get_user_info start');
		log_message('debug', $_id);

		try {
			// キャッシュをクリアしておく
			$this->db->flush_cache();
			$sql = "SELECT *
					FROM t_user
					WHERE delete_flg = '0'
					 AND login_id = '" . $_id . "'" ;
			log_message('debug', $sql);
			$query = $this->db->query($sql);

			log_message('debug', 'get_user_info end');
			return $query;
		}catch (Exception $e){
			throw new Exception( $e->getMessage());
		}
	}
	/*
	 * ユーザ情報取得（1件）
	*/
	function get_user_info_userid($id)
	{
		log_message('debug', 'get_user_info_userid start');
		log_message('debug', $id);

		// キャッシュをクリアしておく
		$this->db->flush_cache();
		$query = $this->db->get_where('t_user ', array('user_id' => $id));

		log_message('debug', 'get_user_info_userid end');
		return $query;
	}
	/*
	 * 子ユーザ情報を取得する
	 */
	function get_child_userif($id)
	{
		log_message('debug', 'get_child_userif start');
		log_message('debug', $_id);

		// キャッシュをクリアしておく
		$this->db->flush_cache();
		$query = $this->db->get_where('t_user ', array('oya_user_id' => $id));

		log_message('debug', 'get_child_userif end');
		return $query;
	}
	/*
	 * ユーザ情報追加
	 */
	function insert_user_info($db_oya_user_id,
			                  $db_login_id,
		                      $db_password = 0,
		                      $db_kenngenn_kb,
		                      $db_user_nm,
		                      $db_kana_user_nm,
		                      $db_post_nm,
		                      $db_tantou_nm,
			                  $db_kana_tantou_nm,
			                  $db_postcode,
			                  $db_address,
			                  $db_tel,
			                  $db_fax,
			                  $db_email,
			                  $db_start_date,
			                  $db_end_date,
			                  $regist_user_id
							  )
	{
		log_message('debug', 'insert_user_info start');
		log_message('debug', $db_oya_user_id);
		log_message('debug', $db_login_id);
		log_message('debug', $db_password);
		log_message('debug', $db_kenngenn_kb);
		log_message('debug', $db_user_nm);
		log_message('debug', $db_kana_user_nm);
		log_message('debug', $db_post_nm);
		log_message('debug', $db_tantou_nm);
		log_message('debug', $db_kana_tantou_nm);
		log_message('debug', $db_postcode);
		log_message('debug', $db_address);
		log_message('debug', $db_tel);
		log_message('debug', $db_fax);
		log_message('debug', $db_email);
		log_message('debug', $db_start_date);
		log_message('debug', $db_end_date);
		log_message('debug', $regist_user_id);

		// 追加前にデータがすでに存在するかチェックしておく
		$query = $this->get_user_info($db_login_id);
		if($query->num_rows() > 0)
		{
			// データが1件以上あるので
			log_message('debug', 'データ存在有のためinsert中止');
			return FALSE;
		}
		else
		{
			// データ0件のためインサート
			$this->db->set('oya_user_id', $db_oya_user_id);
			$this->db->set('kenngenn_kb', $db_kenngenn_kb);
			$this->db->set('login_id', $db_login_id);
			$this->db->set('password', $db_password);
			$this->db->set('kenngenn_kb', $db_kenngenn_kb);
			$this->db->set('user_nm', $db_user_nm);
			$this->db->set('kana_user_nm', $db_kana_user_nm);
			$this->db->set('post_nm', $db_post_nm);
			$this->db->set('tantou_nm', $db_tantou_nm);
			$this->db->set('kana_tantou_nm', $db_kana_tantou_nm);
			$this->db->set('postcode', $db_postcode);
			$this->db->set('address', $db_address);
			$this->db->set('tel', $db_tel);
			$this->db->set('fax', $db_fax);
			$this->db->set('email', $db_email);
			$this->db->set('start_date', $db_start_date);
			$this->db->set('end_date', $db_end_date);
			$this->db->set('delete_flg', 0);
			$this->db->set('regist_date', date("Y-m-d H:i:s"));
			$this->db->set('regist_usr', $regist_user_id);
			$this->db->insert('t_user');

			log_message('debug', 'insert_user_info end');
			return TRUE;
		}
	}
	/*
	 * ユーザ情報更新
	*/
	function update_user_info($db_user_id,
							  $db_oya_user_id,
			                  $db_login_id,
		                      $db_password = 0,
		                      $db_kenngenn_kb,
		                      $db_user_nm,
		                      $db_kana_user_nm,
		                      $db_post_nm,
		                      $db_tantou_nm,
			                  $db_kana_tantou_nm,
			                  $db_postcode,
			                  $db_address,
			                  $db_tel,
			                  $db_fax,
			                  $db_email,
			                  $db_start_date,
			                  $db_end_date,
			                  $regist_user_id)
	{
		log_message('debug', 'update_user_info start');
		log_message('debug', $db_oya_user_id);
		log_message('debug', $db_login_id);
		log_message('debug', $db_password);
		log_message('debug', $db_kenngenn_kb);
		log_message('debug', $db_user_nm);
		log_message('debug', $db_kana_user_nm);
		log_message('debug', $db_post_nm);
		log_message('debug', $db_tantou_nm);
		log_message('debug', $db_kana_tantou_nm);
		log_message('debug', $db_postcode);
		log_message('debug', $db_address);
		log_message('debug', $db_tel);
		log_message('debug', $db_fax);
		log_message('debug', $db_email);
		log_message('debug', $db_start_date);
		log_message('debug', $db_end_date);
		log_message('debug', $regist_user_id);

		// 更新前にデータが存在するかチェックしておく
		$id = $db_login_id;
		$query = $this->get_user_info($id);
		if($query->num_rows() > 0)
		{
			// データが1件以上あるので

			// セットされている値をセット
			$this->db->set('login_id', $db_login_id);
			$this->db->set('password', $db_password);
			$this->db->set('kenngenn_kb', $db_kenngenn_kb);
			$this->db->set('user_nm', $db_user_nm);
			$this->db->set('kana_user_nm', $db_kana_user_nm);
			$this->db->set('post_nm', $db_post_nm);
			$this->db->set('tantou_nm', $db_tantou_nm);
			$this->db->set('kana_tantou_nm', $db_kana_tantou_nm);
			$this->db->set('postcode', $db_postcode);
			$this->db->set('address', $db_address);
			$this->db->set('tel', $db_tel);
			$this->db->set('fax', $db_fax);
			$this->db->set('email', $db_email);
			$this->db->set('start_date', $db_start_date);
			$this->db->set('end_date', $db_end_date);
			$this->db->set('update_date', date("Y-m-d H:i:s"));
			$this->db->set('update_usr', $regist_user_id);
			$this->db->where('user_id', $db_user_id);
			$this->db->update('t_user');

			log_message('debug', 'update_user_info end');
			return TRUE;
		}
		else
		{
			log_message('debug', 'データ存在無のためupdate中止');
			return FALSE;
		}
	}
	/*
	 * ユーザ情報削除
	*/
	function delete_user_info($db_user_id)
	{
		log_message('debug', 'delete_user_info start');
		log_message('debug', $db_user_id);

		// キャッシュをクリアしておく
		$this->db->flush_cache();
		// 子のユーザ情報を先に消しておく
		$query = $this->get_child_userif($db_user_id);
		foreach($query->result() as $row)
		{
			// 削除フラグだけ更新する
			$this->db->set('delete_flg', '1');
			$this->db->where('user_id', $row->user_id);
			$this->db->update('t_user');
		}

		// 自分自身を削除する
		$this->db->set('delete_flg', '1');
		$this->db->where('user_id', $db_user_id);
		$this->db->update('t_user');

		log_message('debug', 'delete_user_info end');
	}
	/*
	 * 一覧情報取得
	*/
	function get_agency_list($name, $kengen, $limit=0, $of=0, $oya_user=0)
	{
		log_message('debug', 'get_agency_list start');
		log_message('debug', $name);
		log_message('debug', $kengen);
		log_message('debug', $limit);
		log_message('debug', $of);
		log_message('debug', $oya_user);

		// キャッシュをクリアしておく
		$this->db->flush_cache();
		$this->db->where('delete_flg','0');
		//権限をセット
		$this->db->where('kenngenn_kb',$kengen);
		//親ユーザがある場合セット
		if($oya_user>0)
		{
			$this->db->where('oya_user_id',$oya_user);
		}
		//検索条件がある場合セット
		if(strlen($name)>0)
		{
			$this->db->like('user_nm', $name);
		}
		//ページ表示分をセット
		if($limit > 0)
		{
			$query = $this->db->get('t_user', $limit, $of);
		}
		else
		{
			$query = $this->db->get('t_user');
		}

		log_message('debug', 'get_agency_list end');
		return $query;
	}
}
?>