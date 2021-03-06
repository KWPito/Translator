<?php
/*
 * 観光協会一覧画面コントローラ
*/
class Agyscylist extends CI_Controller {

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
		// ページネーション用
		$this->load->library('pagination');

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

		// DBから観光協会情報を取得する
		$data['serchUser'] = $this->input->post('serchUser');
		$this->load->model('T_user_model');

		//ページネーション値セット
		$lm=PAGE;
		$of=$this->uri->segment(3);


		if(strlen($data['serchUser'])> 0)
		{
			// 検索条件あり
			$query = $this->T_user_model->get_agency_list($data['serchUser'], 2, 0, 0, $data['user_id']);
			$page['total_rows'] = $query->num_rows();
			$query = $this->T_user_model->get_agency_list($data['serchUser'], 2, $lm, $of, $data['user_id']);
			$data['query'] = $query;
		}
		else
		{
			// 検索条件無
			$query = $this->T_user_model->get_agency_list('', 2, 0, 0, $data['user_id']);
			$page['total_rows'] = $query->num_rows();
			$query = $this->T_user_model->get_agency_list('', 2, $lm, $of, $data['user_id']);
			$data['query'] = $query;
		}

		$page['base_url']= BASE_URL . 'agyscylist/index';
		$page['per_page'] = PAGE;
		$this->pagination->initialize($page);

		$this->load->view('agyscylist_view',$data);

		log_message('debug', 'index end');
	}

	/*
	 * ユーザ削除
	 */
	function delete($_user_id='')
	{
		log_message('debug', 'delete start');
		log_message('debug', $_user_id);

		$this->load->model('T_user_model');
		$this->T_user_model->delete_user_info($_user_id);
		redirect('agyscylist');

		log_message('debug', 'delete end');
	}
}
?>