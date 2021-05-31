<div class = "add_task">
    <div class = "add_task_first_line">
        <form method = "POST" action = "?c=tasklist&method=add_task">
            <input type = "text" name = "add_task_text" placeholder = "Enter text..." required>
            <button type = "submit" name = "add_task_button" value = "1">Add task</button>
        </form>
    </div>

    <div class = "add_task_second_line">
        <form method = "POST" action="?c=tasklist&method=remove_all">
            <button type = "submit" name = "remove_all_tasks_button" value = "1">Remove all</button>
        </form>

        <form method = "POST" action="?c=tasklist&method=ready_all">
            <button type = "submit" name = "ready_all_tasks_button" value = "1">Ready all</button>
        </form>
    </div>
</div>

<div class = "border"></div>

<div class = "tasks">
    <?php
        if($content)
            foreach($content as $task)
            {   
    ?>   
                <div class = "block_task">
                    <div class = "left_part">
                        <div class = "task_text"><?php echo htmlspecialchars($task['description'], ENT_QUOTES); 
                            ?></div>
                        <div class = "task_buttons">
                            <form method = "POST" action="?c=tasklist&method=ready_task">
                                <button type = "submit" value = "<?php echo $task['id']; ?>"
                                    name = "ready_task_button"><?php if($task['status'] == 1) echo 'Unready'; 
                                        else echo 'Ready'; ?></button>
                            </form>

                            <form method = "POST" action="?c=tasklist&method=remove_task">
                                <button type = "submit" name = "remove_task_button"
                                    value = "<?php echo $task['id']; ?>">Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class = "right_part">
                        <div class = "task_circle_<?php if($task['status'] == 1) echo 'green';
                            else echo 'red'; ?>"></div>
                    </div>          
                </div>   
                
                <div class="border"></div>
    <?php
            }
    ?>       
</div>