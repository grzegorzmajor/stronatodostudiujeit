
<main>
    <ul class="lista-zadan">
<?php

    $toDoList = $dataList['todoList'] ?? null;
    if ($toDoList) {
        $tasks = $toDoList->tasks();
        $taskCount = count($tasks);
        for ($i = 0;$i < $taskCount; $i++) {
            echo '<li>';
            echo $tasks[$i]->title()." | ".$tasks[$i]->description()." | <span>Status: ".$tasks[$i]->status()." ";
            if ($tasks[$i]->isActive()) {
                echo '
                <form method="post" action="/?action=change">
                    <input type="hidden" name="id" value="'.$tasks[$i]->id().'">
                    <button class="zmien-status">ZAKOŃCZ</button>
                </form>';
            }

            echo '<form method="post" action="/?action=remove">
                    <input type="hidden" name="id" value="'.$tasks[$i]->id().'">
                    <button class="delete">USUŃ</button>
                </form>
            ';            
            echo '</span></li>';
        }
    }
?>
    </ul>    
</main>