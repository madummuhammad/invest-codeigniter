<?php 
function rules_array($field, $rules)
{
	return [
		'field' => $field,
		'rules' => $rules
	];
}

function rules($rules)
{
	return $rules;
}

function upload_gambar($path, $type, $file_name)
{
	$invest=get_instance();
	$config['upload_path']          = $path;
	$config['allowed_types']        = $type;
	$config['file_name']            =$file_name;
	$invest->load->library('upload', $config);
	if ( ! $invest->upload->do_upload('gambar'))
	{
		$error = array('error' => $invest->upload->display_errors());
	}
	else
	{
		return $invest->upload->data("file_name");
	}
}

?>