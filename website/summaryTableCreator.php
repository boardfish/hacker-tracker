<?php
function iconReplace($input) {
  switch ($input) {
      case "github":
          return "<span class="glyphicon glyphicon-cloud-download"></span>";
          break;
      case "twitter":
          return "<span class="glyphicon glyphicon-user"></span>";
          break;
      case "standard":
          return "<span class="glyphicon glyphicon-dashboard"></span>";
          break;
      case default:
          return $input;
          break;
  endswitch;
  }
}

$cursor = $collection->find();
$cursor_count = $cursor->count();
$keys = array();
    foreach ($cursor as $post) {
        echo "<tr>";
        foreach (array_slice($keys,1) as $key => $value) {
           echo "<td>" . iconReplace($post[$value]) . "</td>";
           <!--need conditional based on type of post: replace with glyphicon-->
        }
        echo "</tr>";
    }

?>
