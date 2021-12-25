<?php 

function admin_url($url='')
{
	return base_url('adminsystem/'.$url);
}

function member_url($url='')
{
	return base_url('member/'.$url);
}

function form($name='')
{
	$ci=get_instance();
	return $ci->input->post($name);
}

function timenow()
{
	return date('Y-m-d, H:i:s');
}

function bahasa($bahasa='')
{
	return '<input type="text" name="_bahasa" value="'.$bahasa.'" hidden>';
}

function get_id($id='')
{
	return '<input type="text" name="id" value="'.$id.'" hidden>';
}

function method($method='')
{
	return '<input type="text" name="'.$method.'" hidden>';
}


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