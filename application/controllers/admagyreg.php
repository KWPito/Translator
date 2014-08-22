<?php
/*
 * 代理店登録画面コントローラ
 */
class Admagyreg extends CI_Controller {
	/*
	 * コンストラクタ
	*/
	function __construct()
	{
		parent::__construct();
		// ライブラリをロードしておく
		// Viewロード用
		$this->load->helper(array('form', 'url'));
		// セッション
		$this->load->library('session');
		// ファイルリード用
		$this->load->helper('file');
		// 入力チェック
		$this->load->library('form_validation');
		// モデル
		$this->load->model('T_user_model');

		// システム共通ライブラリ
		$this->load->library('cms_common');

	}
	/*
	 * ボタンイベント
	 */
	function index()
	{
		log_message('debug', 'index start');

		$data = $this->_initialize();

		// セッション情報を取得する
		if (!($this->session->userdata('user_id')))
		{
			// セッション情報がないのでログイン画面を表示する
			redirect('login');
			return;
		}
		// セッション情報をセットする
		$data['user_id'] = $this->session->userdata('user_id');
		$data['login_id'] = $this->session->userdata('login_id');
		$data['kenngenn_kb'] = $this->session->userdata('kenngenn_kb');
		$data['user_nm'] = $this->session->userdata('user_nm');
		$data['oya_user_id'] = $this->session->userdata('oya_user_id');

		// 入力情報を取得
		if(isset($_POST['regist'])) {

			// 入力情報を取得
			$db_user_id = $_POST['inp_user_id'];;
			$db_user_nm = $_POST['inp_user_nm'];
			$db_oya_user_id = 0;
			$db_kenngenn_kb = 1;
			$db_kana_user_nm = $_POST['inp_kana_user_nm'];
			$db_login_id = $_POST['inp_login_id'];
			$db_password = $_POST['inp_password'];
			$db_postcode = $_POST['inp_postcode'];
			$db_address = $_POST['inp_address'];
			$db_tel = $_POST['inp_tel'];
			$db_fax = $_POST['inp_fax'];
			$db_email = $_POST['inp_email'];
			$db_post_nm = $_POST['inp_post_nm'];
			$db_tantou_nm = $_POST['inp_tantou_nm'];
			$db_kana_tantou_nm = $_POST['inp_kana_tantou_nm'];
			$db_start_date = $_POST['inp_start_date'];
			$db_end_date = $_POST['inp_end_date'];
			$regist_user_id = $data['user_id'];

			// 入力チェック
			$data['msg_user_nm'] = 	$this->cms_common->cms_validation(1,$db_user_nm, 50, '代理店名');
			$data['msg_kana_user_nm'] = $this->cms_common->cms_validation(1,$db_kana_user_nm, 50,'代理店名(カナ)');
			$data['msg_postcode'] = $this->cms_common->cms_validation(3,$db_postcode, 7, '郵便番号');
			$data['msg_address'] = $this->cms_common->cms_validation(1,$db_address, 100,'住所');
			$data['msg_tel'] = $this->cms_common->cms_validation(3,$db_tel, 10,'TEL');
			$data['msg_fax'] = $this->cms_common->cms_validation(2,$db_fax, 10,'FAX');
			$data['msg_email'] = $this->cms_common->cms_validation(0,$db_email, 50, 'Email');
			$data['msg_post_nm'] = $this->cms_common->cms_validation(0,$db_post_nm, 50, '部署名');
			$data['msg_tantou_nm'] = $this->cms_common->cms_validation(0,$db_tantou_nm, 20,'担当者');
			$data['msg_kana_tantou_nm'] = $this->cms_common->cms_validation(0,$db_kana_tantou_nm, 20,'担当者(カナ)');
			$data['msg_start_date'] = $this->cms_common->DateFromToChk($db_start_date, $db_end_date, '利用開始日');

			// エラー判定
			if($this->_err_judge($data) == true)
			{
				$this->_postdata_reset($data,
						$db_user_id,
						$db_user_nm,
						$db_kana_user_nm,
						$db_login_id,
						$db_password,
						$db_postcode,
						$db_address,
						$db_tel,
						$db_fax,
						$db_email,
						$db_post_nm,
						$db_tantou_nm,
						$db_kana_tantou_nm,
						$db_start_date,
						$db_end_date
						);
				// エラーあり
				$this->load->view('admagyreg_view', $data);
				return;
			}


			if(strlen($db_user_id)>0)
			{
				$query = $this->T_user_model->get_user_info_userid($db_user_id);
				if($query->num_rows() > 0)
				{
					log_message('debug', '***');

					// データを更新する
					if(TRUE != $this->T_user_model->update_user_info($db_user_id,
							$db_oya_user_id,
							$db_login_id,
							$db_password,
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
							$regist_user_id))

					{
						$data['message'] = ED001;
					}
					else
					{
						// DBより登録内容を取得して画面にセットする
						$this->_get_user_info($db_login_id, $data);
						$data['info'] = AD001;
					}
					$this->load->view('admagyreg_view', $data);
					log_message('debug', 'index end');
				}
				else
				{
					log_message('debug', '@@@@@@@');
					// ログインIDを生成する
					$db_login_id = $this->_make_login_id();
					log_message('debug', $db_login_id);
					// パスワードを生成する
					$db_password = $this->_make_password();
					log_message('debug', $db_password);
					// データを追加する
					if(TRUE != $this->T_user_model->insert_user_info($db_oya_user_id,
							$db_login_id,
							$db_password,
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
							$regist_user_id))
					{
						$data['message'] = ED001;
					}
					else
					{
						// DBより登録内容を取得して画面にセットする
						$this->_get_user_info($db_login_id, $data);
						$data['info'] = ED001;
					}
					$this->load->view('admagyreg_view', $data);
					log_message('debug', 'index end');
				}
			}
			else
			{
				log_message('debug', '@@@@@@@');
				// ログインIDを生成する
				$db_login_id = $this->_make_login_id();
				log_message('debug', $db_login_id);
				// パスワードを生成する
				$db_password = $this->_make_password();
				log_message('debug', $db_password);
				// データを追加する
				if(TRUE != $this->T_user_model->insert_user_info($db_oya_user_id,
						$db_login_id,
						$db_password,
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
						$regist_user_id))
				{
					$data['message'] = ED001;
				}
				else
				{
					// DBより登録内容を取得して画面にセットする
					$this->_get_user_info($db_login_id, $data);
					$data['info'] = AD001;
				}
				$this->load->view('admagyreg_view', $data);
				log_message('debug', 'index end');
			}
		}
		else
		{
			$this->load->view('admagyreg_view', $data);
			log_message('debug', 'index end');
		}

	}
	function update()
	{
		log_message('debug', 'update start');

		$data = $this->_initialize();

		// セッション情報を取得する
		if (!($this->session->userdata('user_id')))
		{
			// セッション情報がないのでログイン画面を表示する
			redirect('login');
			return;
		}
		// セッション情報をセットする
		$data['user_id'] = $this->session->userdata('user_id');
		$data['login_id'] = $this->session->userdata('login_id');
		$data['kenngenn_kb'] = $this->session->userdata('kenngenn_kb');
		$data['user_nm'] = $this->session->userdata('user_nm');
		$data['oya_user_id'] = $this->session->userdata('oya_user_id');
		// 内部変数の初期化
		$data['message'] = '';
		$data['info'] = '';

		$_user_id = $this->session->userdata('edit_user_id');

		$this->_get_user_info_userid($_user_id, $data);
		// DBより登録内容を取得して画面にセットする
		$this->load->view('admagyreg_view', $data);

		log_message('debug', 'update end');
	}

	/*
	 * ログインID生成
	 * 引数
	 * o:ユーザID
	 */
	private function _make_login_id()
	{
		log_message('debug', '_make_login_id start');

		do
		{
			// 乱数でユーザIDを生成
			$_userid = rand();
			$query = $this->T_user_model->get_user_info($_userid);
			if($query->num_rows() <= 0)
			{
				// 見つからないのでループを抜ける
				break;
			}
		}while(1);

		log_message('debug', '_make_login_id end');
		return $_userid;
	}
	/*
	 * パスワード生成
	* 引数
	* o:パスワード
	*/
	private function _make_password()
	{
		log_message('debug', '_make_password start');

		$this->load->helper('string');

		log_message('debug', '_make_password end');
		return random_string('alnum', 16);
	}
	/*
	 * ユーザ情報取得
	* 引数
	* i:userid    ログインID
	* o:ユーザ情報
	*/
	private function _get_user_info($userid, &$data)
	{
		log_message('debug', '_get_user_info start');
		log_message('debug', $userid);

		$this->load->model('T_user_model');
		$query = $this->T_user_model->get_user_info($userid);

		foreach($query->result() as $row)
		{
			log_message('debug', '_get_user_info getdata');

			$data['inp_user_id'] = $row->user_id ;
			$data['inp_login_id'] = $row->login_id;
			$data['inp_password'] = $row->password;
			$data['inp_user_nm'] = $row->user_nm;
			$data['inp_kana_user_nm'] = $row->kana_user_nm;
			$data['inp_post_nm'] = $row->post_nm;
			$data['inp_tantou_nm'] = $row->tantou_nm;
			$data['inp_kana_tantou_nm'] = $row->kana_tantou_nm;
			$data['inp_postcode'] = $row->postcode;
			$data['inp_address'] = $row->address;
			$data['inp_tel'] = $row->tel;
			$data['inp_fax'] = $row->fax;
			$data['inp_email'] = $row->email;
			$data['inp_start_date'] = $row->start_date;
			$data['inp_end_date'] = $row->end_date;
			break;
		}

		log_message('debug', '_get_user_info end');
	}

	/*
	 * ユーザ情報取得
	* 引数
	* i:userid    ログインID
	* o:ユーザ情報
	*/
	private function _get_user_info_userid($userid, &$data)
	{
		log_message('debug', '_get_user_info_userid start');
		log_message('debug', $userid);

		$this->load->model('T_user_model');
		$query = $this->T_user_model->get_user_info_userid($userid);

		foreach($query->result() as $row)
		{
			log_message('debug', '_get_user_info getdata');

			$data['inp_user_id'] = $row->user_id ;
			$data['inp_login_id'] = $row->login_id;
			$data['inp_password'] = $row->password;
			$data['inp_user_nm'] = $row->user_nm;
			$data['inp_kana_user_nm'] = $row->kana_user_nm;
			$data['inp_post_nm'] = $row->post_nm;
			$data['inp_tantou_nm'] = $row->tantou_nm;
			$data['inp_kana_tantou_nm'] = $row->kana_tantou_nm;
			$data['inp_postcode'] = $row->postcode;
			$data['inp_address'] = $row->address;
			$data['inp_tel'] = $row->tel;
			$data['inp_fax'] = $row->fax;
			$data['inp_email'] = $row->email;
			$data['inp_start_date'] = $row->start_date;
			$data['inp_end_date'] = $row->end_date;
			break;
		}

		log_message('debug', '_get_user_info_userid end');
	}

	/*
	 * 変数初期化
	*/
	private function _initialize()
	{
		// 変数の初期化
		$data['inp_user_id'] = "";
		$data['inp_login_id'] = "";
		$data['inp_password'] = "";
		$data['inp_user_nm'] = "";
		$data['inp_kana_user_nm'] = "";
		$data['inp_post_nm'] = "";
		$data['inp_tantou_nm'] = "";
		$data['inp_kana_tantou_nm'] = "";
		$data['inp_postcode'] = "";
		$data['inp_address'] = "";
		$data['inp_tel'] = "";
		$data['inp_fax'] = "";
		$data['inp_email'] = "";
		$data['inp_start_date'] = "";
		$data['inp_end_date'] = "";

		$data['message'] = '';
		$data['info'] = '';
		$data['msg_user_nm'] = '';
		$data['msg_kana_user_nm'] = '';
		$data['msg_postcode'] = '';
		$data['msg_address'] = '';
		$data['msg_tel'] = '';
		$data['msg_fax'] = '';
		$data['msg_email'] = '';
		$data['msg_post_nm'] = '';
		$data['msg_tantou_nm'] = '';
		$data['msg_kana_tantou_nm'] = '';
		$data['msg_start_date'] = '';

		return $data;
	}

	private function _err_judge(&$data)
	{
		log_message('debug', '_err_judge start');

		if( strlen($data['message']) > 0 || strlen($data['msg_user_nm']) > 0 ||
			strlen($data['msg_kana_user_nm']) > 0 || strlen($data['msg_postcode']) > 0 ||
			strlen($data['msg_address'] ) > 0 || strlen($data['msg_tel']) > 0 ||
			strlen($data['msg_fax']) > 0 || strlen($data['msg_email']) > 0 ||
			strlen($data['msg_post_nm']) > 0 || strlen(	$data['msg_tantou_nm']) > 0 ||
			strlen($data['msg_kana_tantou_nm']) > 0 || strlen($data['msg_start_date']) > 0)
		{
			log_message('debug', '_err_judge end');
			return true;
		}
		log_message('debug', '_err_judge end');
		return false;
	}
	private function _postdata_reset(&$data,
		$db_user_id,
		$db_user_nm,
		$db_kana_user_nm,
		$db_login_id,
		$db_password,
		$db_postcode,
		$db_address,
		$db_tel,
		$db_fax,
		$db_email,
		$db_post_nm,
		$db_tantou_nm,
		$db_kana_tantou_nm,
		$db_start_date,
		$db_end_date)
	{
		$data['inp_user_id'] = $db_user_id;
		$data['inp_user_nm'] = $db_user_nm;
		$data['inp_kana_user_nm'] = $db_kana_user_nm;
		$data['inp_login_id'] = $db_login_id;
		$data['inp_password'] = $db_password;
		$data['inp_postcode'] = $db_postcode;
		$data['inp_address'] = $db_address;
		$data['inp_tel'] = $db_tel;
		$data['inp_fax'] = $db_fax;
		$data['inp_email'] = $db_email;
		$data['inp_post_nm'] = $db_post_nm;
		$data['inp_tantou_nm'] = $db_tantou_nm;
		$data['inp_kana_tantou_nm'] = $db_kana_tantou_nm;
		$data['inp_start_date'] = $db_start_date;
		$data['inp_end_date'] = $db_end_date;
	}
}
?>