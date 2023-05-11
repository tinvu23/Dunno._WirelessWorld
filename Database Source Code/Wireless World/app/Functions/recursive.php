<?php 
function recursiveOption ($parent_category,$parent = 0,$str = "") {
    foreach ($parent_category as $value) {
        if ($value -> parent == $parent) {
            echo '<option value="'.$value -> id.'" >'.$str.$value -> name.'</option>';
            recursiveOption ($parent_category,$value -> id ,$str."---| ");
        }
    }
}
function recursiveTable ($data,$parent = 0,$str = "") {
    foreach ($data as $value) {
        if ($value -> parent == $parent) {
            echo '
            <tr>
                <td>'.$str.$value -> name.'</td>
                <td class="text-center"><b><a onClick="return confirmDelete()" href="http://127.0.0.1:8000/admin/category/delete/'.$value -> id.'">Delete </a></b></td>
                <td class="text-center"><b><a href="http://127.0.0.1:8000/admin/category/edit/'.$value -> id.'">Edit</a></b></td>
            </tr>';
            recursiveTable ($data,$value -> id,$str." --| ");
        }
    } 
}

?>

