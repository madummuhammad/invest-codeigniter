<?php 
function is_logged_in_admin()
{
	$ci=get_instance();
	if ($ci->session->userdata('authentication') !=='admin') {
		redirect(admin_url('login'));
	}
}

function is_logged_in_member()
{
	$ci=get_instance();
	if ($ci->session->userdata('authentication') !== 'member') {
		redirect('');
	}
}

function login_in()
{
	$ci=get_instance();
	if ($ci->session->userdata('email')) {
		redirect(admin_url());
	}
}

// function check_access($role_id,$menu_id)
// {
// 	$ci=get_instance();

// 	$ci->db->where('role_id',$role_id);
// 	$ci->db->where('menu_id',$menu_id);
// 	$result=$ci->db->get('user_access_menu');

// 	if ($result->num_rows()>0) {
// 		return "checked='checked'";
// 	}
// }
?>
