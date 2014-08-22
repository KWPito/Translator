<?php
/*
 * 観光協会メイン画面コントローラ
*/
class Scymain extends CI_Controller {

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

		$data['proxy_user_id'] = '';

		// 代理ログインの場合
		if ($this->session->userdata('proxy_user_id'))
		{
			// 代理ログイン
			$data['proxy_user_id'] = $this->session->userdata('proxy_user_id');
		}

		// 掲示情報をファイルからリード
		$string = read_file('./info/admininfo.txt');
		$data['info'] = $string;

		//echo $string . '<br />';
		$this->load->view('scymain_view',$data);

		log_message('debug', 'index end');
	}
}
?>