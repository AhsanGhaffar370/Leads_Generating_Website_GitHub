<?php
echo "<ul class='pagination'>";

if($page=1) {
    echo "
        <li><a href='{$page_url}' title='Go to first page'>First</a></li>
    ";
}

$num_of_pages = ceil($total_records_db / $records_per_page);

for ($page = 2; $page<$num_of_pages; $page++) {
    echo "<li><a href='{$page_url}page=" . $page . "'>" . $page . "</a></li>";
}

if ($page=$num_of_pages) {
    echo "<li><a href='{$page_url}page=" . $page . "'>Last</a></li>";
}