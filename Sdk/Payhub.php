<?php

/**
 * Created by PhpStorm.
 * User: luoxiaoxiang
 * Date: 2017/10/23
 * Time: 下午3:07
 */

namespace Payhub;

use Config\Config;
use Curl\Curl;

class Payhub
{

	private static $app_id;
	private static $app_secret;

	/**
	 * @param $app_id payhub平台APP ID
	 * @param $app_secret payhub平台APP SECRET
	 * @throws \Exception
	 */
	static function registerApp($app_id, $app_secret)
	{
		if (empty($app_id) || empty($app_secret)) {
			throw new \Exception(Config::VALID_BC_PARAM);
		}
		self::$app_id = $app_id;
		self::$app_secret = $app_secret;
	}

	/**
	 * 提交订单
	 * @param array $data
	 * @return mixed
	 */
	static public function pay(array $data)
	{
		if (empty(self::$app_id) || empty(self::$app_secret)) {
			throw new \Exception(Config::VALID_APP_INIT);
		}
		$curl = new Curl();
		$res = $curl->post(Config::API_URL . '/api/pay', $data);
		return json_decode($res->response);
	}

	/**
	 * 查询订单
	 * @param array $data
	 * @return mixed
	 */
	static public function query(array $data)
	{
		if (empty(self::$app_id) || empty(self::$app_secret)) {
			throw new \Exception(Config::VALID_APP_INIT);
		}
		$curl = new Curl();
		$res = $curl->post(Config::API_URL . '/api/query', $data);
		return json_decode($res->response);
	}

}