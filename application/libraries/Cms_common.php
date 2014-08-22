<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_common {

	/*
	 * コンストラクタ
	 */
	public function __construct()
	{

	}
	/* 入力チェック処理
	 * * 引数
	 * i:$_require     :Bitで制御する　　0bit=必須入力  1bit:数値チェック
	 * i: $_chkValue   :チェック文字
	 * i:$_chkValueLen :最大文字数
	 * i:$_colName     :項目名
	 * return: エラー文字
	 */
	public function cms_validation($_require = 0, $_chkValue = '', $_chkValueLen = 0, $_colName = '')
	{
		$retValue = '';

		$format = '';

		if(($_require & 1) == 1)
		{
			// 必須入力チェック
			if(strlen($_chkValue)<= 0 )
			{
				$format = $this->cms_code_to_message('ES001');
				$retValue = sprintf($format, $_colName);
				return $retValue;
			}
		}
		if(($_require & 2) == 2)
		{
			// 数値チェック
			if(strlen($_chkValue) > 0)
			{
				if(!(is_numeric( $_chkValue  )))
				{
					$format = $this->cms_code_to_message('ES003');
					$retValue = sprintf($format, $_colName);
					return $retValue;
				}
			}
		}
		// レングスチェック
		if((strlen(bin2hex($_chkValue)) / 2)>$_chkValueLen)
		{
			$format = $this->cms_code_to_message('ES002');
			$retValue = sprintf($format, $_colName, $_chkValueLen);
			return $retValue;
		}
	}
	/*日付チェック
	 * 引数
	 * i:開始日
	 * i:終了日
	 * return: メッセージ
	 */
	public function DateFromToChk($_startDate='', $_endDate='')
	{
		$retString = '';

		if((strlen($_startDate) > 0) && (strlen($_endDate) > 0))
		{
			if (strtotime($_startDate) >= strtotime($_endDate))
			{
				$retString = $this->cms_code_to_message('ES004');
			}
		}
		return $retString;
	}
	/* メッセージ生成
	* 引数
	* o:パスワード
	*/
	public function cms_code_to_message($_code)
	{
		$retString = '';

		switch($_code)
		{
			case 'EL001';
				$retString = EL001;
				break;
			case 'EL002';
				$retString = EL002;
				break;
			case 'WS001';
				$retString = WS001;
				break;
			case 'WS002';
				$retString = WS002;
				break;
			case 'WD001';
				$retString = WD001;
				break;
			case 'WD002';
				$retString = WD002;
				break;
			case 'WD004';
				$retString = WD004;
				break;
			case 'AD001';
				$retString = AD001;
				break;
			case 'AK001';
				$retString = AK001;
				break;
			case 'ES001';
				$retString = ES001;
				break;
			case 'ES002';
				$retString = ES002;
				break;
			case 'ES003';
				$retString = ES003;
				break;
			case 'ES004';
				$retString = ES004;
				break;
		}
		return $retString;
	}
}
?>