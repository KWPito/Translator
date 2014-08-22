<?php
/*
 * 編集画面遷移用コントローラ
*/
class Directurl extends CI_Controller {

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
	}
	/*
	 * 起動メイン
	 */
	function index()
	{
		log_message('debug', 'index start');

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

		log_message('debug', 'index end');
	}
	/*
	 * 編集画面遷移
	 */
	function redirect($_url = '',$_method = '', $_user_id=0)
	{
		log_message('debug', 'redirect start');
		log_message('debug', $_url);
		log_message('debug', $_method);
		log_message('debug', $_user_id);

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

		$this->session->set_userdata('edit_user_id', $_user_id);

		// 画面表示1
		redirect($_url . '/' . $_method );

		log_message('debug', 'redirect end');
	}

	/*
	 * 代理ユーザ画面遷移
	*/
	function proxy_redirect($_user_id=0)
	{
		log_message('debug', 'proxy_redirect start');
		log_message('debug', $_user_id);

		// セッション情報を取得する
		if (!($this->session->userdata('user_id')))
		{
			// セッション情報がないのでログイン画面を表示する
			redirect('login');
			return;
		}

		$data['user_id'] = $this->session->userdata('user_id');

		// 元ログインユーザIDをセットしておく
		$this->session->set_userdata('proxy_user_id', $data['user_id']);

		$this->load->model('T_user_model');
		$query = $this->T_user_model->get_user_info_userid($_user_id);


		foreach($query->result() as $row)
		{
			// セッションにユーザ情報をセットする
			$sessionData = array(
					'user_id'  => $row->user_id,				// ユーザID
					'login_id'     => $row->login_id,			// ログインID
					'kenngenn_kb' => $row->kenngenn_kb,			// 権限区分
					'user_nm' => $row->user_nm . '(代理)',		// ユーザ名
					'oya_user_id' => $row->oya_user_id			// 親ユーザID
			);
			$this->session->set_userdata($sessionData);
			break;
		}
		// 画面表示1
		redirect(BASE_URL .'scymain');

		log_message('debug', 'proxy_redirect end');
	}

	/*
	 * 代理ユーザ→ログインユーザ画面遷移
	*/
	function return_proxy_redirect()
	{
		log_message('debug', 'proxy_redirect start');

		// セッション情報を取得する
		if (!($this->session->userdata('user_id')))
		{
			// セッション情報がないのでログイン画面を表示する
			redirect('login');
			return;
		}

		$data['user_id'] = $this->session->userdata('proxy_user_id');

		// 代理ユーザID情報を削除する
		$this->session->unset_userdata('proxy_user_id');

		$this->load->model('T_user_model');
		$query = $this->T_user_model->get_user_info_userid($data['user_id']);

		foreach($query->result() as $row)
		{
			// セッションにユーザ情報をセットする
			$sessionData = array(
					'user_id'  => $row->user_id,				// ユーザID
					'login_id'     => $row->login_id,			// ログインID
					'kenngenn_kb' => $row->kenngenn_kb,			// 権限区分
					'user_nm' => $row->user_nm,					// ユーザ名
					'oya_user_id' => $row->oya_user_id			// 親ユーザID
			);
			$this->session->set_userdata($sessionData);
			break;
		}
		// 画面表示1
		redirect(BASE_URL . 'agyscylist');

		log_message('debug', 'proxy_redirect end');
	}
}
?>