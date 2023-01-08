<?php

/**
 * Amazon S3 Upload PHP class
 *
 * @version 0.1
 */
class S3_upload {

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('s3');

		$this->CI->config->load('s3', TRUE);
		$s3_config = $this->CI->config->item('s3');
		$this->bucket_name = $s3_config['bucket_name'];
		$this->folder_name = $s3_config['folder_name'];
		$this->s3_url = $s3_config['s3_url'];
		$this->s3_access_key = $s3_config['access_key'];
		$this->s3_secret_key = $s3_config['secret_key'];
	}

	function upload_file($file_path, $folder_name=""){
		// generate unique filename
		$file = pathinfo($file_path);
		$s3_file = $file['filename'].'-'.rand(1000,1).'.'.$file['extension'];
		$mime_type = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file_path);

		$saved = $this->CI->s3->putObjectFile(
			$file_path,
			$this->bucket_name,
			$folder_name.$s3_file,
			S3::ACL_PUBLIC_READ,
			array(),
			$mime_type
		);
		if ($saved) {
			return $this->s3_url.$folder_name.$s3_file;
		}
	}

	function delete_file($uri=""){
		return $this->CI->s3->deleteObject($this->bucket_name, $uri);
	}

	function deleteAWS4( $filename,$path ){ 
		$file_name = $filename; 
		$file_delete_path = $path;

		$aws_access_key_id = $this->s3_access_key;
		$aws_secret_access_key = $this->s3_secret_key;
		$bucket_name = 'ptapegroup';
		$aws_region = 'ap-southeast-1'; // Enter your aws region Ex. us-east-1
		$host_name = $bucket_name . '.s3.amazonaws.com';
		$content_acl = 'public-read';
		$content_type = ''; 
		$content='';
		$content_title = $file_delete_path.$file_name;
		$aws_service_name = 's3';

		$timestamp = gmdate('Ymd\THis\Z');
		$date = gmdate('Ymd');

		$request_headers = array();
		$request_headers['Content-Type'] = $content_type;
		$request_headers['Date'] = $timestamp;
		$request_headers['Host'] = $host_name;
		$request_headers['x-amz-acl'] = $content_acl;
		$request_headers['x-amz-content-sha256'] = hash('sha256',"");
		ksort($request_headers);

		$canonical_headers = [];
		foreach($request_headers as $key => $value)
		{
			$canonical_headers[] = strtolower($key) . ":" . $value;
		}
		$canonical_headers = implode("\n", $canonical_headers);


		$signed_headers = [];
		foreach($request_headers as $key => $value)
		{
			$signed_headers[] = strtolower($key);
		}
		$signed_headers = implode(";", $signed_headers);

		$canonical_request = [];
		$canonical_request[] = "DELETE";
		$canonical_request[] = "/" . $content_title;
		$canonical_request[] = "";
		$canonical_request[] = $canonical_headers;
		$canonical_request[] = "";
		$canonical_request[] = $signed_headers;
		$canonical_request[] = hash('sha256', $content);
		$canonical_request = implode("\n", $canonical_request);
		$hashed_canonical_request = hash('sha256', $canonical_request);

		$scope = [];
		$scope[] = $date;
		$scope[] = $aws_region;
		$scope[] = $aws_service_name;
		$scope[] = "aws4_request";

		$string_to_sign = [];
		$string_to_sign[] = "AWS4-HMAC-SHA256"; 
		$string_to_sign[] = $timestamp; 
		$string_to_sign[] = implode('/', $scope);
		$string_to_sign[] = $hashed_canonical_request;
		$string_to_sign = implode("\n", $string_to_sign);

		$kSecret = 'AWS4' . $aws_secret_access_key;
		$kDate = hash_hmac('sha256', $date, $kSecret, true);
		$kRegion = hash_hmac('sha256', $aws_region, $kDate, true);
		$kService = hash_hmac('sha256', $aws_service_name, $kRegion, true);
		$kSigning = hash_hmac('sha256', 'aws4_request', $kService, true);

		$signature = hash_hmac('sha256', $string_to_sign, $kSigning);

		$authorization = [
			'Credential=' . $aws_access_key_id . '/' . implode('/', $scope),
			'SignedHeaders=' . $signed_headers,
			'Signature=' . $signature
		];
		$authorization = 'AWS4-HMAC-SHA256' . ' ' . implode( ',', $authorization);

		$curl_headers = [ 'Authorization: ' . $authorization ];
		foreach($request_headers as $key => $value) 
		{
		$curl_headers[] = $key . ": " . $value;
		}

		$url = 'https://' . $host_name . '/' . $content_title;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
		return curl_exec($ch); // return response data 1
		//$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		//curl_close($ch);
		//return $httpcode;
	}

}