<?php
namespace ActiveRecord;

class Apc
{
	const DEFAULT_PREFIX = 'ActiveRecord_';

	private $prefix;

	public function __construct($options)
	{
		$this->prefix = isset($options['path'])? $options['path']: self::DEFAULT_PREFIX;	
	}

	public function flush()
	{
		error_log("Not Support function flush for Apc");
	}

	public function read($key)
	{
		$key = $this->prefix . $key;
		return apc_fetch($key);
	}

	public function write($key, $value, $expire)
	{
		$key = $this->prefix . $key;
		apc_store($key, $value, $expire);
	}
}

