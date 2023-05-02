<?php
$command = "grep -ri 'get_message_thread' ./*";
$output = shell_exec($command);
echo "$output";
echo "Grep job over.done";
?>