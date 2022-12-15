<?php

//action.php

$connect = new PDO("mysql:host=localhost;dbname=gatepass", "root", "");

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$order_column = array('account_no', 'name', 'time');

		$main_query = "
		SELECT account_no, name, time 
		FROM time_inout
		";

		$search_query = 'WHERE time <= "'.date('Y-m-d').'" OR ';

		if(isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '')
		{
			$search_query .= 'time >= "'.$_POST["start_date"].'" OR time <= "'.$_POST["end_date"].'" OR ';
		}

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= '(account_no LIKE "%'.$_POST["search"]["value"].'%" OR name LIKE "%'.$_POST["search"]["value"].'%" OR time LIKE "%'.$_POST["search"]["value"].'%")';
		}



		$group_by_query = " GROUP BY time ";

		$order_by_query = "";

		if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$order_column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY time DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$statement = $connect->prepare($main_query . $search_query . $group_by_query . $order_by_query);

		$statement->execute();

		$filtered_rows = $statement->rowCount();

		$statement = $connect->prepare($main_query . $group_by_query);

		$statement->execute();

		$total_rows = $statement->rowCount();

		$result = $connect->query($main_query . $search_query . $group_by_query . $order_by_query . $limit_query, PDO::FETCH_ASSOC);

		$data = array();

		foreach($result as $row)
		{
			$sub_array = array();

			$sub_array[] = $row['account_no'];

			$sub_array[] = $row['name'];

			$sub_array[] = $row['time'];

			$data[] = $sub_array;
		}

		$output = array(
			"draw"			=>	intval($_POST["draw"]),
			"recordsTotal"	=>	$total_rows,
			"recordsFiltered" => $filtered_rows,
			"data"			=>	$data
		);

		echo json_encode($output);
	}
}

?>