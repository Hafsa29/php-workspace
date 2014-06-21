<?php
	class Facade{
		function get_problems($u_id){
			$CI = &get_instance(); 
			
			$CI->load->database();

			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $CI->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			$data['u_id'] = $u_id;
			$data['documents'] = 'problems';

			$data['u_id'] = $u_id;
			$adhoc = new AdhocProblems();
			$data['adhoc'] = $adhoc->get_adhoc();
			$mathematics = new MathematicsProblems();
			$data['mathematics'] = $mathematics->get_mathematics();
			$graph_theory = new GraphTheoryProblems();
			$data['graph_theory'] = $graph_theory->get_graph_theory();
			$data_structure = new DataStructureProblems();
			$data['data_structure'] = $data_structure->get_data_structure();
			$dynamic_programming = new DynamicProgrammingProblems();
			$data['dynamic_programming'] = $dynamic_programming->get_dynamic_programming();
			$computational_geometry = new ComputationalGeometryProblems();
			$data['computational_geometry'] = $computational_geometry->get_computational_geometry();

			$data['function'] = 'problem';

			$CI->load->view('documents', $data);
		}
		function get_tutorials($u_id){
			$CI = &get_instance(); 

			$CI->load->database();

			$query = "select u_name from user where u_id = '{$u_id}';";
			$result = $CI->db->query($query);
			$result = $result->row_array();
			$data['u_name'] = $result['u_name'];
			$data['u_id'] = $u_id;
			$data['documents'] = 'tutorials';

			$data['u_id'] = $u_id;
			$adhoc = new AdhocTutorials();
			$data['adhoc'] = $adhoc->get_adhoc();
			$mathematics = new MathematicsTutorials();
			$data['mathematics'] = $mathematics->get_mathematics();
			$graph_theory = new GraphTheoryTutorials();
			$data['graph_theory'] = $graph_theory->get_graph_theory();
			$data_structure = new DataStructureTutorials();
			$data['data_structure'] = $data_structure->get_data_structure();
			$dynamic_programming = new DynamicProgrammingTutorials();
			$data['dynamic_programming'] = $dynamic_programming->get_dynamic_programming();
			$computational_geometry = new ComputationalGeometryTutorials();
			$data['computational_geometry'] = $computational_geometry->get_computational_geometry();

			$data['function'] = 'tutorial';

			$CI->load->view('documents', $data);
		}
	}
	class AdhocProblems{
		function get_adhoc(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select p_id as d_id, p_given_name as d_given_name from problem where p_type = 'adhoc';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
	class MathematicsProblems{
		function get_mathematics(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select p_id as d_id, p_given_name as d_given_name from problem where p_type = 'mathematics';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;	
		}	
	}
	class GraphTheoryProblems{
		function get_graph_theory(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select p_id as d_id, p_given_name as d_given_name from problem where p_type = 'graph_theory';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
	class DataStructureProblems{
		function get_data_structure(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select p_id as d_id, p_given_name as d_given_name from problem where p_type = 'data_structure';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;	
		}
	}
	class DynamicProgrammingProblems{
		function get_dynamic_programming(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select p_id as d_id, p_given_name as d_given_name from problem where p_type = 'dynamic_programming';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
	class ComputationalGeometryProblems{
		function get_computational_geometry(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select p_id as d_id, p_given_name as d_given_name from problem where p_type = 'computational_geometry';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
	class AdhocTutorials{
		function get_adhoc(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select t_id as d_id, t_given_name as d_given_name from tutorial where t_type = 'adhoc';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
	class MathematicsTutorials{
		function get_mathematics(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select t_id as d_id, t_given_name as d_given_name from tutorial where t_type = 'mathematics';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
	class GraphTheoryTutorials{
		function get_graph_theory(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select t_id as d_id, t_given_name as d_given_name from tutorial where t_type = 'graph_theory';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;	
		}
	}
	class DataStructureTutorials{
		function get_data_structure(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select t_id as d_id, t_given_name as d_given_name from tutorial where t_type = 'data_structure';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
	class DynamicProgrammingTutorials{
		function get_dynamic_programming(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select t_id as d_id, t_given_name as d_given_name from tutorial where t_type = 'dynamic_programming';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
	class ComputationalGeometryTutorials{
		function get_computational_geometry(){
			$CI = &get_instance();

			$CI->load->database();

			$query = "select t_id as d_id, t_given_name as d_given_name from tutorial where t_type = 'computational_geometry';";
			$result = $CI->db->query($query);
			$result = $result->result_array();
			return $result;
		}
	}
?>