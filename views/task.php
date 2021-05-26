<div class = "tasks">
    <?php
        foreach($tasks as $task)
        {
    ?> 
            
            <div class = "block_task">
                <div class = "left_part">
                    <div class = "task_text"><?php echo htmlspecialchars($task['description'], ENT_QUOTES); ?></div>
                    <div class = "task_buttons">
                        <form method = "POST">
                            <button type = "submit" value = "<?php echo $task['id']; ?>"
                                name = "ready_task_button"><?php if($task['status'] == 1) echo 'Unready'; 
                                    else echo 'Ready'; ?></button>
                        </form>

                        <form method = "POST">
                            <button type = "submit" name = "remove_task_button"
                                value = "<?php echo $task['id']; ?>">Delete</button>
                        </form>
                    </div>
                </div>

                <div class = "right_part">
                    <div class = "task_circle_<?php if($task['status'] == 1) echo 'green'; else echo 'red'; ?>"></div>
                </div>          
            </div>   
            
            <div class="border"></div>
    <?php
        }
    ?>       
    </div>