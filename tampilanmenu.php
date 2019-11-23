<?php
function get_menu($data, $parent = 0) {
	static $i = 1;
	$tab = str_repeat("\t\t", $i);
	if (isset($data[$parent])) {

		$html = '<ul class="ml-menu">';
		$i++;
		foreach ($data[$parent] as $v) {
			$child = get_menu($data, $v->id);
			$html .= "<li>";
			
			if($v->url == "javascript:void(0);"){
				$html .= '<a href='.$v->url.' class="menu-toggle"><span>'.$v->title.'</span></a>';
				if ($child) {
					$i--;
					$html .= $child;
					$html .= "\n\t$tab";
				}

				$html .= '</li>';
			}else{
				$html .= '<a href="content.php?url='.$v->url.' " class="menu-toggle"><span>'.$v->title.'</span></a>';
				if ($child) {
					$i--;
					$html .= $child;
					$html .= "\n\t$tab";
				}

			}

			
		}
		$html .= "\n$tab</ul>";
		return $html;
	} else {
		return false;
	}
}

$link = mysqli_connect('localhost', 'root', '') or die("Koneksi gagal"); 
mysqli_select_db($link, 'users') or die("Database tidak bisa dibuka");


$result = mysqli_query($link,"SELECT * FROM menu ORDER BY menu_order ");
while ($row = mysqli_fetch_object($result)) {
	$data[$row->parent_id][] = $row;
}

$menu = get_menu($data);

?>

