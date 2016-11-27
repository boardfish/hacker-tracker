$cursor = $collection->find();
$cursor_count = $cursor->count();
$keys = array();
    foreach ($cursor as $post) {
        echo "<tr>";
        foreach (array_slice($keys,1) as $key => $value) {
           echo "<td>" . $post[$value] . "</td>";
           <!--need conditional based on type of post: replace with glyphicon-->
        }
        echo "</tr>";
    }

<!-- http://stackoverflow.com/questions/13108234/output-each-mongodb-record-to-an-html-table -->
