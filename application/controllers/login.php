<?php

/*
 * ログイン画面コントローラ
 */
class Login extends CI_Controller {

	/*
	 * ボタンイベント
	 */
	function index()
	{
		log_message('debug', 'index start');

		// ライブラリをロードしておく
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		// セッションを削除する
		$this->session->sess_destroy();
		// 内部変数の初期化
		$data['message'] = '';
		// Validateルールの設定
		$this->form_validation->set_rules('userid', 'ユーザID', 'required');
		$this->form_validation->set_rules('password', 'パスワード', 'required');

		try {
			if ($this->form_validation->run() == FALSE)
			{
				//$this->load->view('login_view', $data);
			}
			else
			{
				$userid = $_POST['userid'];
				$password = $_POST['password'];
				if($this->_chk_login($userid, $password))
				{
					$nextdsp = '';
					if ($this->session->userdata('kenngenn_kb')<>'')
					{
						$kengen_kb = $this->session->userdata('kenngenn_kb');
						switch ($kengen_kb) {
							case 0:
								// 管理者メイン画面表示
								$nextdsp = 'admmain';
								break;
							case 1:
								// 代理店
								$nextdsp = 'agymain';
								break;
							case 2:
								// 観光協会
								$nextdsp = 'scymain';
								break;
							/*
							default:
								// 翻訳者
								$nextdsp = 'admmain';
								break;
							*/
						}
						redirect($nextdsp);
						return;
					}
				}
				$data['message'] = EL002;

			}
		}catch (Exception $e){
			$data['message'] = $e->getMessage();
		} /* finally */ {
			$this->load->view('login_view', $data);
			log_message('debug', 'index end');
		}
	}
	/*
	 * ログインチェック
	 * 引数
	 * i:userid    ログインID
	 * i:password  パスワード
	 * o:TRUE ログイン成功 FALSE ログイン失敗
	 */
	private function _chk_login($userid, $password)
	{
		log_message('debug', '_chk_login start');

		try {
			$this->load->model('T_user_model');
			$query = $this->T_user_model->get_user_info($userid);
			foreach($query->result() as $row)
			{
				if($row->password == $password)
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
					log_message('debug', '_chk_login end');
					return TRUE;
				}
			}
			log_message('debug', '_chk_login end');
			return FALSE;
		}catch (Exception $e){
			throw new Exception($e->getMessage());
			return FALSE;
		}
	}
}
?>